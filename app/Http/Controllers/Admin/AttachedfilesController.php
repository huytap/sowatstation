<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Enum;
use App\Models\Gallery;
class AttachedfilesController extends Controller
{
    public function uploadfile(Request $request)
    {
        $path = base_path() . Enum::UPLOAD_FOLDER_NAME;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('files');
        $ext = $file->extension();
        $file_size = $file->getSize();
        $file_type = $file->getMimeType();
        $name = uniqid() . '.' . $ext;
        $file->move($path, $name);
        $totalRecordByGlobal = Gallery::where('event_id', $request->event_id)
            ->count();
        $item = new Gallery();
        $item->photo = $name;
        $item->event_id = $request->event_id;
        $item->type = $request->type;
        $item->priority = $totalRecordByGlobal;
        $item->file_size = $file_size;
        $item->file_type = $file_type;
        $item->original_name = $file->getClientOriginalName();
        $item->status = 0;
        if ($item->save())
            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
                'type' => $file_type,
                'size' => $file_size,
                'id' => $item->id
            ]);
        else
            return response()->json([
                'status' => 'Fail'
            ]);
    }
    public function deletefile(Request $request)
    {
        $id = $request->id;
        $filename =  $request->name;
        Gallery::where('id', $id)->delete();
        $path = base_path() . Enum::UPLOAD_FOLDER_NAME . '/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['success' => $filename]);
    }
}
