<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SIM302;
use App\Models\Bal;
use App\Models\Siops;
use App\Models\Codigos;
use App\Models\Layouts;

use Response;
use Storage;

class ExportacoesController extends Controller
{
    public function exportReceita(Request $request){
        try {
            $receitas = Bal::where('data_referencia_documentacao', $request->exercicio);

            $layout = Layouts::find($request->layout);

            $arrFile = $this->getFileReceitas($layout->pathfile);

            Storage::delete('receitas.IMPT');

            $file = fopen(Storage::path('receitas.IMPT'), 'w');

            foreach($arrFile as $line){

                $arrLine = explode(';', $line);

                if(sizeof($arrLine) === 1){continue;}

                $correlation = Codigos::where('tipo', 'RECEITA')->where('destino', $arrLine[1])->first();

                if(!$correlation){
                    fwrite($file, $line);
                    continue;
                }

                $receita = $receitas->where('codigo_receita_orcamentaria', $correlation->origem)->first();

                $pos = 0;

                $v0 = strpos($line, "$", $pos) + 1;
                $line = substr_replace($line, $receita->valor_previsto_orcamento, $v0, 0);
                $pos = $v0 + 1;

                $v1 = strpos($line, "$", $pos) + 1;
                $line = substr_replace($line, $receita->valor_previsto_orcamento, $v1, 0);
                $pos = $v1 + 1;

                $v2 = strpos($line, "$", $pos) + 1;
                $pos = $v2 + 1;
                
                $v3 = strpos($line, "$", $pos) + 1;
                $pos = $v3 + 1;

                $v4 = strpos($line, "$", $pos) + 1;
                $pos = $v4 + 1;

                $v5 = strpos($line, "$", $pos) + 1;
                $pos = $v5 + 1;

                if($receita->valor_arrecadacao_mes_passados >= 0){
                    $line = substr_replace($line, $receita->valor_arrecadacao_mes_passados, $v2, 0);
                } else {
                    $line = substr_replace($line, $receita->valor_arrecadacao_mes_passados, $v5, 0);
                }

                $v6 = strpos($line, "$", $pos) + 1;

                fwrite($file, $line);
            }

            fclose($file);

            return Response::json([
                'message' => 'success',
                'file' => Storage::get('receitas.IMPT'),
                'filename' => $layout->name
            ], 200);
            
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function exportDespesa(Request $request){
        try {
            return Response::json([
                'message' => 'success',
                'data' => $request->all()
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getLayouts(Request $request){
        try {
            return Response::json([
                'message' => 'success',
                'data' => Layouts::where('tipo', $request->tipo)->get()
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getExerciciosDisponiveisReceita(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_values(array_unique(Bal::pluck('data_referencia_documentacao')->toArray()))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getExerciciosDisponiveisDespesa(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_values(array_unique(SIM302::pluck('dtrefedocu')->toArray()))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    private function getFileReceitas($pathfile){
        $file = fopen(Storage::path($pathfile), 'r');
        $arrFile = [];
        while (!feof($file)) {$arrFile[] = fgets($file);}
        fclose($file);
        return $arrFile;
    }
}
