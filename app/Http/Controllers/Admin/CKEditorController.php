<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Enum;
use Illuminate\Support\Str;

class CKEditorController extends Controller{
    public function store(Request $request)
    {
        $path_url = base_path() . Enum::UPLOAD_FOLDER_NAME;

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
            $request->file('upload')->move($path_url, $fileName);
            $url = asset('uploads/' . $fileName);
        }

        return response()->json(['url' => $url]);
   }

}