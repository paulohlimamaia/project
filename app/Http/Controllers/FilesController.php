<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Files;
use App\Models\Bal;
use App\Models\Impt;
use App\Models\SIM302;

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

            foreach($file->balancos as $balanco){$balanco->delete();}

            Storage::delete($file->pathfile);
            $file->delete();

            return Response::json([
                'message' => 'success',
                'data' => $file
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function upload(Request $request){
        try {
            $fileType = explode('.', $request->file->getClientOriginalName())[1];

            if(in_array($fileType, ["BAL"])){throw new Exception("File type not supported!");}

            $filePath = Storage::putFile('public/arquivos', $request->file);

            $file = Files::create([
                'pathfile' => $filePath,
                'filename' => $request->file->getClientOriginalName(),
                'type' => $fileType
            ]);

            return Response::json([
                'message' => 'success',
                'data' => $file
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
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

    public function impts($idFile){
        try {
            return Response::json([
                'message' => 'success',
                'data' => Files::where('id_file', $idFile)->first()->impts
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function processar($idFile){
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
        
                            'data_referencia_documentacao' => Carbon::create(substr($arrLine[8], 0, 4), substr($arrLine[8], 4, 2), 1),
        
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
            } else if($file->type === "IMPT"){
                $fileData = Storage::get($file->pathfile);
                // throw new Exception('Arquivo IMPT ainda não suportado');
                foreach (explode("\n", $fileData) as $line){
                    $arrLine = explode(';', str_replace('"', '',$line));

                    if(sizeof($arrLine) > 1){
                        Impt::create([
                            'campo1' => $arrLine[0],
                            'campo2' => $arrLine[1],
                            'campo3' => $arrLine[2],
                            'v0' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[3])[1])[0])) ? explode("<", explode(">", $arrLine[3])[1])[0]."0.00" : explode("<", explode(">", $arrLine[3])[1])[0],
                            'v1' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[4])[1])[0])) ? explode("<", explode(">", $arrLine[4])[1])[0]."0.00" : explode("<", explode(">", $arrLine[4])[1])[0],
                            'v2' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[5])[1])[0])) ? explode("<", explode(">", $arrLine[5])[1])[0]."0.00" : explode("<", explode(">", $arrLine[5])[1])[0],
                            'v3' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[6])[1])[0])) ? explode("<", explode(">", $arrLine[6])[1])[0]."0.00" : explode("<", explode(">", $arrLine[6])[1])[0],
                            'v4' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[7])[1])[0])) ? explode("<", explode(">", $arrLine[7])[1])[0]."0.00" : explode("<", explode(">", $arrLine[7])[1])[0],
                            'v5' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[8])[1])[0])) ? explode("<", explode(">", $arrLine[8])[1])[0]."0.00" : explode("<", explode(">", $arrLine[8])[1])[0],
                            'v6' => (!str_replace("R$", "",explode("<", explode(">", $arrLine[9])[1])[0])) ? explode("<", explode(">", $arrLine[9])[1])[0]."0.00" : explode("<", explode(">", $arrLine[9])[1])[0],
                            'campo11' => $arrLine[10],
                            'campo12' => $arrLine[11],
                            'campo13' => $arrLine[12],
                            'id_file' => $file->id_file
                        ]);
                    }

                }
            } else {
                throw new Exception('Tipo de arquivo inválido');
            }

            $file->processado = true;
            $file->save();

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
