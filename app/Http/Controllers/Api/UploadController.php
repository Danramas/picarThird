<?php

namespace App\Http\Controllers\Api;


use App\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        if( $files = $request->file('file')){
            foreach($request->file('file') as $key => $file){
                $name = time().$key.$file->getClientOriginalName();
                $file->move('files', $name);
            }
        }
        return response()->json([
            'hashedName' => $name,
        ]);
    }

    public function destroy(Upload $upload)
    {
        if(!(empty($upload->file))){
            if(file_exists(public_path().'/files/'.$upload->file)){
                unlink(public_path().'/files/'.$upload->file);
            }
            Upload::where('id', $upload->id)->delete();
        }
        return response()->json(null, 204);
    }
}
