<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Files;

use Response;
use Storage;

class FilesController extends Controller
{
    public function index(){
        try {
            return Response::json([
                'message' => 'success',
                'data' => Files::paginate()
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
            $filePath = Storage::putFile('public/balanco', $request->file);
            $fileName = basename($filePath);
            $fileType = explode('.', $request->file->getClientOriginalName())[1];

            $file = Files::create([
                'pathfile' => $filePath,
                'filename' => $fileName,
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
}
