<?php

namespace App\Http\Controllers;

use App\Models\SIM302;
use App\Models\Bal;
use App\Models\Siops;
use App\Models\Codigos;
use Response;

use Illuminate\Http\Request;

class CorrelacoesController extends Controller
{
    public function index(Request $request){
        try {
            $codigos = Codigos::where('tipo', $request->type);

            if($request->origem){
                $codigos->where('origem', 'ilike', "%$request->origem%");
            }

            if($request->destino){
                $codigos->where('destino', 'ilike', "%$request->destino%");
            }

            return Response::json([
                'message' => 'success',
                'data' => $codigos->paginate()
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request){
        try {

            if(Codigos::where('tipo', $request->type)->where('destino', $request->destino)->first()){
                throw new \Exception("Destino já cadastrado!");
            }

            if(Codigos::where('origem', $request->origem)->first()){
                throw new \Exception("Origem já cadastrada!");
            }
            
            $codigo = Codigos::create([
                'origem' => $request->origem,
                'destino' => $request->destino,
                'tipo' => $request->type
            ]);

            return Response::json([
                'message' => 'success',
                'data' => $codigo
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request){
        try {
            $codigo = Codigos::where('id', $request->id)->update([
                'origem' => $request->origem,
                'destino' => $request->destino
            ]);

            return Response::json([
                'message' => 'success',
                'data' => $codigo
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function delete(Request $request){
        try {
            $codigo = Codigos::where('id', $request->id)->delete();

            return Response::json([
                'message' => 'success',
                'data' => $codigo
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getOrigensReceita(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_values(array_unique(Bal::pluck('codigo_receita_orcamentaria')->toArray()))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getOrigensDespesa(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_values(array_unique(SIM302::pluck('cdcedporca')->toArray()))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getDestinos(Request $request){
        try {
            return Response::json([
                'message' => 'success',
                'data' => array_values(array_unique(Siops::where('tipo', $request->type)->pluck('codigo')->toArray()))
            ], 200);
        } catch (Exception $e) {
            return Response::json([
                'message' => 'fail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
