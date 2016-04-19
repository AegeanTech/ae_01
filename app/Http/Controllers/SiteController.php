<?php namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;

use App\Site;
use App\Object;
use App\Umessage;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class SiteController extends Controller {

    /**
     * Crop Demo
     */
    public function crop_demo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $targ_w = $targ_h = 150;
            $jpeg_quality = 99;

            $src = base_path().'/public/assets/img/cropping-image.jpg';
            //dd($src);
            $img_r = imagecreatefromjpeg($src);

            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

            imagecopyresampled($dst_r,$img_r,0,0,intval($_POST['x']),intval($_POST['y']), $targ_w,$targ_h, intval($_POST['w']),intval($_POST['h']));

            header('Content-type: image/jpeg');
            imagejpeg($dst_r,null,$jpeg_quality);

            exit;
        }
    }

    /**
     * Message bag.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));

        //
        $this->messageBag = new MessageBag;
    }

    public function getInitialData()
    {
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
//        $umessages = Umessage::where('uid', '=', $uid)->get();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }

        return compact('uid', 'content', 'initial', 'userRoles', 'umessages');
    }

    public function showHome()
    {
        if(Sentinel::check())
        {

            $uid = Sentinel::getUser()->id;
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $contents = Site::where('uid', '=', $uid)->count();
            $content = Site::where('uid', '=', $uid)->first();

//            $umessages = Umessage::where('uid', '=', $uid)->get();
//
//            $danger_msg = "";
//            $warning_msg = "";
//            $success_msg = "";
//            $info_msg = "";
//
//            foreach($umessages as $umessage){
//                switch ($umessage->type) {
//                    case "danger":
//                        $danger_msg .= $umessage->description;
//                        break;
//                    case "warning":
//                        $warning_msg .= $umessage->description;
//                        break;
//                    case "success":
//                        $success_msg .= $umessage->description;
//                        break;
//                    case "info":
//                        $info_msg .= $umessage->description;
//                        break;
//                }
//            }
//
//            foreach(['danger', 'warning', 'success', 'info'] as $msg){
//                $umessage = ${$msg . '_msg'};
//                if($umessage != ""){
//                    Session::flash('alert-' . $msg, $umessage);
//                }
//            }

            if((head($userRoles) == 'R-User')){
                if(!File::exists(Config::get('images.full_size') . $content['sid'] . '/')) {
                    $FullFolder = File::makeDirectory(Config::get('images.full_size') . '/' . $content['sid'], 0775);
                }
                if(!File::exists(Config::get('images.icon_size') . $content['sid'] . '/')) {
                    $IconFolder = File::makeDirectory(Config::get('images.icon_size') . '/' . $content['sid'], 0775);
                }
                if(!File::exists(Config::get('files.file') . $content['sid'] . '/')) {
                    $FileFolder = File::makeDirectory(Config::get('files.file') . '/' . $content['sid'], 0775);
                }
            }

            if ($contents == 0){
                $initial = 1;
                return view('pages.welcome', compact('userRoles', 'umessages'))->with('initial',$initial);
            } else {
                $initial = 0;
                return view('pages.welcome', compact('content', 'userRoles', 'umessages'))->with('initial',$initial);
            }


        }
        else
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
    }

    public function showHelp()
    {
        if(Sentinel::check())
        {
            return view('pages.context');
        }
        else
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
    }

    public function showView($name=null)
    {

        if(View::exists('admin/'.$name))
        {
            if(Sentinel::check())
                return View('admin/'.$name);
            else
                return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
        }
        else
        {
            return View('admin/404');
        }
    }

    public function showFrontEndView($name=null)
    {

        if(View::exists($name))
        {
            return View($name);
        }
        else
        {
            return View('admin/404');
        }
    }


}