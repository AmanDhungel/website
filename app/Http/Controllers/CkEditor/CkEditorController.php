<?php

namespace App\Http\Controllers\CkEditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkEditorController extends Controller
{
    public function viewCkeditor()
    {
        return view('editor');
    }
    public function uploadCkeditorFile(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('pages'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('pages/' . $fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
}
