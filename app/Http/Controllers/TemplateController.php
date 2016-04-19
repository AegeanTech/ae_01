<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Sentinel;




use App\Site;

use App\Umessage;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class TemplateController extends Controller
{
    public function create()
    {
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        //$content = Site::all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();

        $umessages = Umessage::where('uid', '=', $uid)->get();

//        $content = Site::find(1);

        switch ($content->theme) {
            case "0":
                $theme_folder = "01_cosmo";
                break;
            case "1":
                $theme_folder = "02_journal";
                break;
            case "2":
                $theme_folder = "03_simplex";
                break;
            case "3":
                $theme_folder = "04_yeti";
                break;
            default:
                $theme_folder = "00_default";
        }

        $core_css = "assets/template/css/" . $theme_folder . "/bootstrap.min.css";
        $custom_css = "assets/template/css/" . $theme_folder . "/freelancer.css";

        $status = "offline";

        if((head($userRoles) == 'R-User')){

            if($content->background == 1){
                if(File::exists('backgrounds/' . $content->suburl . '.png')){
                    $background_file = 'backgrounds/' . $content->suburl . '.png';
                }elseif(File::exists('backgrounds/' . $content->suburl . '.jpg')){
                    $background_file = 'backgrounds/' . $content->suburl . '.jpg';
                }
            } else{
                $background_file = '';
            }

            $storeFolder = Config::get('images.icon_size') . $content->id . '/';
            $gallery_file  = array();
            $files = scandir($storeFolder);
            if ( false!==$files ) {
                foreach ( $files as $file ) {
                    if ( '.'!=$file && '..'!=$file && 'Thumbs.db'!=$file) {
                        $obj['name'] = $file;
                        $obj['folder'] = $content->id;
                        $gallery_file[] = $obj;
                    }
                }
            }

        }

        return view('pages.template', compact('content', 'core_css', 'custom_css', 'status', 'userRoles', 'background_file', 'gallery_file', 'umessages'));
        //return $content;
    }

    public function preview()
    {
        $uid = Sentinel::getUser()->id;
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $umessages = Umessage::where('uid', '=', $uid)->get();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return view('pages.preview', compact('content', 'userRoles', 'umessages'))->with('initial',$initial);
    }
}
