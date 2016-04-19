<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;

use Sentinel;
use App\Site;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

use Redirect;

use App\Umessage;

use App\Image;


class ImageController extends Controller
{
    protected $image;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }

    public function getUpload()
    {

        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::With('configs')->where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $umessages = Umessage::where('uid', '=', $uid)->get();
        $sid = $content->id;
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return view('pages.upload', compact('content', 'step', 'doys', 'objects', 'uid', 'userRoles', 'sid', 'umessages'))->with('initial',$initial);
    }

    public function postUpload()
    {

        $photo = Input::all();

//        if(!File::exists(Config::get('images.full_size') . $photo['sid'] . '/')) {
//            $FullFolder = File::makeDirectory(Config::get('images.full_size') . '/' . $photo['sid'], 0775);
//        }
//        if(!File::exists(Config::get('images.icon_size') . $photo['sid'] . '/')) {
//            $IconFolder = File::makeDirectory(Config::get('images.icon_size') . '/' . $photo['sid'], 0775);
//        }

//        $photo = Input::all();
        $response = $this->image->upload($photo);
        return $response;

    }

    public function deleteUpload()
    {

        $filename = Input::get('id');
        $sid = Input::get('sid');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename, $sid );

        return $response;
    }

    public function showExisting() {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();

        if(!File::exists(Config::get('images.icon_size') . $content->id . '/')) {
            $newstoreFolder = File::makeDirectory(Config::get('images.icon_size') . '/' . $content->id, 0775);
        }

        $storeFolder = Config::get('images.icon_size') . $content->id . '/';

        $result  = array();

        $files = scandir($storeFolder);                 //1
        if ( false!==$files ) {
            foreach ( $files as $file ) {
                if ( '.'!=$file && '..'!=$file && 'Thumbs.db'!=$file) {       //2
                    $obj['name'] = $file;
                    $obj['size'] = filesize($storeFolder. '/' .$file);
                    $obj['folder'] = $content->id;
                    $result[] = $obj;
                }
            }
        }

        header('Content-type: text/json');
        header('Content-type: application/json');
        return json_encode($result);
    }

    public function manageExisting()
    {

        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();

        $sid = $content->id;

        $images = Image::Where('sid', '=', $sid)->get();

        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return view('pages.manage', compact('content', 'step', 'doys', 'objects', 'uid', 'userRoles', 'sid', 'umessages', 'images'))->with('initial',$initial);
    }

    public function saveExisting()
    {
        $data = Input::all();

        foreach($data['id'] as $index => $value) {
            Image::where('id', '=', $data['id'][$index])->update(array('description' => $data['description'][$index], 'gallery' => $data['gallery'][$index], 'order' => $data['order'][$index]));
        }

        return Redirect::to('admin/')->with('initial', '0');
    }
}
