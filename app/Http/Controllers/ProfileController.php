<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;

use App\Site;
use App\Object;
use DB;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class ProfileController extends Controller
{
    /**
     * @param string $suburl
     * @return \Illuminate\View\template
     */
    public function showProfile($suburl = '')
    {
        if ($suburl){

//            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();

            $content = Site::where('suburl', '=', $suburl)->firstOrFail();

            $sid = $content->id;

            $status = "online";
//            $objectlist = DB::table('objects')
//                ->join('object_site', 'objects.oid', '=', 'object_site.object_id')
//                ->where('object_site.site_id', '=', $sid)
//                ->get(array('objects.object'));

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

//            return view('pages.template', compact('content', 'objectlist', 'core_css', 'custom_css'));

            if ($content->status == 1){

                if($content->group=='R'){

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

                return view('pages.template', compact('userRoles', 'content', 'objectlist', 'core_css', 'custom_css', 'status', 'background_file', 'gallery_file'));
            } else {
                return view('pages.maintenance', compact('content', 'objectlist', 'core_css', 'custom_css'));
            }

        }
        else
            return View('404');
    }
}
