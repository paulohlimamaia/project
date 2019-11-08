<?php

namespace App\Http\Controllers;

use App\Models\SIM302;

use Exception;
use Response;

use Illuminate\Http\Request;

class SimController extends Controller
{
    public function get302(Request $request){
        try {

            $data = SIM302::where('dtrefedocu', $request->exercicio)
            ->where('cdfuncao', $request->funcao)
            ->where('cdsubfunc', $request->subfuncao)->get();

            return Response::json([
                'message' => 'success',
                'data' => $data
            ], 200);
            
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function funcoes302($subfuncao = null){
        try {
            if(!$subfuncao){
                return Response::json([
                    'message' => 'success',
                    'data' => array_values(array_unique(SIM302::pluck('cdfuncao')->toArray()))
                ], 200);
            } else {
                return Response::json([
                    'message' => 'success',
                    'data' => array_values(array_unique(SIM302::where('cdsubfunc', $subfuncao)->pluck('cdfuncao')->toArray()))
                ], 200);
            } 
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function subfuncoes302($funcao = null){
        try {
            if(!$funcao){
                return Response::json([
                    'message' => 'success',
                    'data' => array_values(array_unique(SIM302::pluck('cdsubfunc')->toArray()))
                ], 200);
            } else {
                return Response::json([
                    'message' => 'success',
                    'data' => array_values(array_unique(SIM302::where('cdfuncao', $funcao)->pluck('cdsubfunc')->toArray()))
                ], 200);
            } 
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function exercicios302(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_reverse(array_values(array_unique(SIM302::pluck('dtrefedocu')->toArray())))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}