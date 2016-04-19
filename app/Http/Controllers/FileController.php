<?php

namespace App\Http\Controllers;

use App\File;
use App\Helpers\Thumbnail;
use App\Http\Requests;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Sentinel;
use Response;
use stdClass;

/* TiPosPou Classes*/
use App\Site;
use Illuminate\Support\Facades\Input;
use Redirect;

class FileController extends JoshController {

    /**
     * Store a newly created resource in storage.
     *
     * @param FileUploadRequest $request
     * @return Response
     */
    public function postCreate(FileUploadRequest $request)
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $sid = $content->id;

        $destinationPath = public_path() . '/uploads/files/' . $sid . '/';

        $file_temp = $request->file('file');
        $extension       = $file_temp->getClientOriginalExtension() ?: 'raw';
//        $safeName        = str_random(10).'.'.$extension;
        $safeName = $request->suburl.'-'.camel_case(preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_temp->getClientOriginalName())).'.'.$extension;

        $fileItem = new File();
        $fileItem->filename = $safeName;
        $fileItem->mime = $file_temp->getMimeType();

//        $fileItem->description = file('file')->getClientOriginalName();
        $fileItem->sid = $request->sid;
        $fileItem->description = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_temp->getClientOriginalName());
        $fileItem->status = "Ανενεργό";
        $fileItem->order = "1";

        $fileItem->save();

//        Thumbnail::generate_image_thumbnail($destinationPath . $safeName, $destinationPath . 'thumb_' . $safeName);

        $file_temp->move($destinationPath, $safeName);

        return $fileItem->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FileUploadRequest $request
     * @return Response
     */
    public function postFilesCreate(FileUploadRequest $request)
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $sid = $content->id;

        $destinationPath = public_path() . '/uploads/files/' . $sid . '/';

        $file_temp = $request->file('file');
        $extension  = $file_temp->getClientOriginalExtension() ?: 'raw';
//        $safeName        = str_random(10).'.'.$extension;
        $safeName = $request->suburl.'-'.camel_case(preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_temp->getClientOriginalName())).'.'.$extension;

        $fileItem = new File();
        $fileItem->filename = $safeName;
        $fileItem->mime = $file_temp->getMimeType();

//        $fileItem->description = $safeName;
        $fileItem->sid = $request->sid;
        $fileItem->description = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_temp->getClientOriginalName());
        $fileItem->status = "Ανενεργό";
        $fileItem->order = "1";

        $fileItem->save();

        $file_temp->move($destinationPath, $safeName);


//        Thumbnail::generate_image_thumbnail($destinationPath . $safeName, $destinationPath . 'thumb_' . $safeName);

        $success = new stdClass();
        $success->name = $safeName;
        $success->size = $file_temp->getClientSize();
        $success->url = $safeName;
//        $success->thumbnailUrl =  URL::to('/uploads/files/thumb_'.$safeName);
        $success->deleteUrl = URL::to('admin/file/delete?_token='.csrf_token().'&id='.$fileItem->id);
        $success->deleteType = 'DELETE';
        $success->fileID = $fileItem->id;

        return Response::json(array( 'files'=> array($success)), 200);
    }

    public function delete(Request $request)
    {
        if(isset($request->id)) {
            $upload = File::find($request->id);
            $upload->delete();

            unlink(public_path('uploads/files/'.$upload->filename));
//            unlink(public_path('uploads/files/thumb_'.$upload->filename));

            if(!isset(File::find($request->id)->filename)) {
                $success = new stdClass();
                $success->{$upload->filename} = true;
                return Response::json(array('files' => array($success)), 200);
            }
        }
    }

    public function show()
    {
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();

        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }
        if(isset($_POST['step'])){
            $step = $_POST['step'];
        } else {
            $step = 1;
        }

        return view('pages.file_upload', compact('content', 'step', 'doys', 'objects', 'uid', 'userRoles'))->with('initial',$initial);
    }

    public function manage()
    {

        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();

        $sid = $content->id;

        $files = File::Where('sid', '=', $sid)->orderBy('order', 'asc')->get();

        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return view('pages.file_manage', compact('content', 'step', 'doys', 'objects', 'uid', 'userRoles', 'sid', 'umessages', 'files'))->with('initial',$initial);
    }

    public function save()
    {
        $data = Input::all();

        foreach($data['id'] as $index => $value) {
            File::where('id', '=', $data['id'][$index])->update(array('description' => $data['description'][$index], 'status' => $data['status'][$index], 'order' => $data['order'][$index]));
            $new_name = 
            File::move('/uploads/files/' . $data['sid'][$index] . '/' . $data['filename'][$index], '/uploads/files/' . $data['sid'][$index] . '/' . $data['filename'][$index]);
        }

        return Redirect::to('admin/')->with('initial', '0');
    }
}
