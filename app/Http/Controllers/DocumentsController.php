<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;

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


}
