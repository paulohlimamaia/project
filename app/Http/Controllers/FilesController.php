<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Files;
use App\Models\Bal;
use App\Models\Impt;
use App\Models\SIM302;
use App\Models\Layouts;
use App\Models\Siops;

use XBase\Table;
use Carbon\Carbon;
use Exception;
use Response;
use Storage;

class FilesController extends Controller
{
    public function index(Request $request){
        try {
            return Response::json([
                'message' => 'success',
                'data' => Files::where('type', $request->type)->whereNull('valido')->paginate()
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($idFile){
        try {
            $file = Files::where('id_file', $idFile)->first();

            if($file->type === "BAL"){
                foreach($file->balancos as $balanco){$balanco->delete();}
                Storage::delete($file->pathfile);
            } else if($file->type === "DBF"){
                foreach($file->sim302 as $sim302){$sim302->delete();}
                Storage::disk('dbf')->delete($file->pathfile);
            }

            $file->delete();

            return Response::json([
                'message' => 'success',
                'data' => $file
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function upload(Request $request){
        try {
            $fileType = explode('.', $request->file->getClientOriginalName())[1];


            if($fileType === "BAL"){

                $filePath = Storage::putFile('public/arquivos', $request->file);

                $file = Files::create([
                    'pathfile' => $filePath,
                    'filename' => $request->file->getClientOriginalName(),
                    'type' => $fileType
                ]);

            } else if($fileType === "DBF"){

                $originalName = $request->file->getClientOriginalName();

                Storage::disk('dbf')->delete($originalName);

                $filePath = Storage::disk('dbf')->put($originalName, file_get_contents($request->file));

                $file = Files::where('filename', $originalName)->first();
                $file->touch();

            } else {
                throw new Exception("Tipo de Arquivo Inválido!");
            }

            return Response::json([
                'message' => 'success',
                'data' => $file
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function uploadLayoutsReceitas(Request $request){
        try {

            $fileType = explode('.', $request->file->getClientOriginalName())[1];

            if($fileType != "IMPT"){throw new Exception("Tipo de Arquivo Inválido!");}

            $layout = Layouts::create([
                'cod' => explode(";", file_get_contents($request->file))[0],
                'name' => $request->file->getClientOriginalName(),
                'pathfile' => Storage::putFile('public/layouts', $request->file),
                'tipo' => 'RECEITA'
            ]);

            $file = fopen(Storage::path($layout->pathfile), 'r');
            $arrFile = [];
            while (!feof($file)) {$arrFile[] = fgets($file);}
            fclose($file);

            foreach($arrFile as $line){
                $arrLine = explode(';', $line);

                if(!(sizeof($arrLine) > 1)){continue;}
                if($arrLine[1] === " "){continue;}

                $siops = Siops::where('tipo', 'RECEITA')->where('codigo', $arrLine[1])->first();

                if(!$siops){
                    $siops = Siops::create([
                        'codigo' => $arrLine[1],
                        'tipo' => 'RECEITA'
                    ]);
                }
            }

            return Response::json([
                'message' => 'success',
                'data' => $layout
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function uploadLayoutsDespesas(Request $request){
        try {

            $fileType = explode('.', $request->file->getClientOriginalName())[1];

            if($fileType != "IMPT"){throw new Exception("Tipo de Arquivo Inválido!");}

            $layout = Layouts::create([
                'cod' => explode(";", file_get_contents($request->file))[0],
                'name' => $request->file->getClientOriginalName(),
                'pathfile' => Storage::putFile('public/layouts', $request->file),
                'tipo' => 'DESPESA'
            ]);

            $file = fopen(Storage::path($layout->pathfile), 'r');
            $arrFile = [];
            while (!feof($file)) {$arrFile[] = fgets($file);}
            fclose($file);

            foreach($arrFile as $line){
                $arrLine = explode(';', $line);

                if(!(sizeof($arrLine) > 1)){continue;}
                if($arrLine[1] === " "){continue;}

                $siops = Siops::where('tipo', 'DESPESA')->where('codigo', $arrLine[1])->first();

                if(!$siops){
                    $siops = Siops::create([
                        'codigo' => $arrLine[1],
                        'tipo' => 'DESPESA'
                    ]);
                }
            }

            return Response::json([
                'message' => 'success',
                'data' => $layout
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function balancos($idFile){
        try {
            return Response::json([
                'message' => 'success',
                'data' => Files::where('id_file', $idFile)->first()->balancos
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function sim302($idFile, $ref){
        try {
            return Response::json([
                'message' => 'success',
                'data' => SIM302::where('id_file', $idFile)->where('dtrefedocu', $ref)->get()
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function processar($idFile, Request $request){
        try {
            $file = Files::where('id_file', $idFile)->first();

            if($file->type === "BAL"){
                $fileData = Storage::get($file->pathfile);
                foreach (explode("\n", $fileData) as $line){
                    $arrLine = explode(',', str_replace('"', '',$line));

                    if(sizeof($arrLine) > 1){
                        Bal::create([
                            'tipo_documento' => $arrLine[0],
                            'codigo_municipio' => $arrLine[1],
                            'exercicio_orcamento' => $arrLine[2],
                            'codigo_orgao' => $arrLine[3],
                            'codigo_unidade_orcamentaria' => $arrLine[4],
                            'codigo_receita_orcamentaria' => $arrLine[5],
                            'codigo_grupo_fonte' => $arrLine[6],
                            'codigo_especificacao_fonte' => $arrLine[7],
                            'data_referencia_documentacao' => $arrLine[8],
                            'tipo_balancete' => $arrLine[9],
                            'valor_previsto_orcamento' => $arrLine[10],
                            'valor_anulacoes_mes_atual' => $arrLine[11],
                            'valor_anulacoes_mes_passados' => $arrLine[12],
                            'valor_arrecadacao_mes_atual' => $arrLine[13],
                            'valor_arrecadacao_mes_passados' => $arrLine[14],
                            
                            'id_file' => $file->id_file
                        ]);
                    }
                }

                $file->processado = true;
                $file->save();

            } else if($file->type === "DBF"){

                $simTable = new Table($file->pathfile);

                while ($record = $simTable->nextRecord()) {

                    if(!($record->getChar('dtrefedocu') === $request->ref)){continue;}
                    if(!($record->getChar('cdfuncao') === "10")){continue;}

                    $data = [];
        
                    foreach($simTable->getColumns() as $colum){
                        $data[$colum->name] = $record->getChar($colum->name);
                    }

                    $data['id_file'] = $file->id_file;
        
                    SIM302::create($data);
                }

            } else {
                throw new Exception('Tipo de arquivo inválido');
            }

            return Response::json([
                'message' => 'success',
                'data' => $file->id_file
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
