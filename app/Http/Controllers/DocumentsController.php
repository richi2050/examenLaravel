<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;
use Validator;
class DocumentsController extends Controller
{


    public function documents(Request $request) {
        $doc = Documents::all();
        return response()->json(['res' => true, 'data' => $doc], 200);
    }


    public function document($id){
        $doc = Documents::find($id);
        return response()->json(['res' => true, 'data' => $doc], 200);
    }

    public function  documentDelete($id){
        $doc = Documents::find($id);
        $doc->delete();
        return response()->json(['res' => true, 'data' => $doc], 200);
    }

    private function updlaoadFile($file)
    {
        $nombreArchivo = time(). '.'. $file->getClientOriginalExtension();
        $file->move(public_path('img'), $nombreArchivo);
        return $nombreArchivo;
    }

    public function createDocument(Request $request){

        /*
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpg'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }*/



        $input = $request->all();
        if($request->has('file')){
            $input['img'] = $this->updlaoadFile($request->file);
        }

        $doc=Documents::create([
            'user_id' =>$request->user_id,
            'name' => $input['img'],
            'ext'  => $request->file->getClientOriginalExtension(),
            'type' => $request->type
        ]);

        return response()->json(['res' => true, 'data' => $doc], 200);
    }

    public function updateDocument(Request $request){
        $doc = Documents::find($request->id);
        if($request->has('user_id')){
            $doc->user_id = $request->user_id;
        }
        if($request->has('file')){
            $doc->name = $this->updlaoadFile($request->file);;
            $doc->ext  = $request->file->getClientOriginalExtension();
        }
        $doc->save();
        return response()->json(['res' => true, 'data' => $doc], 200);
    }
}
