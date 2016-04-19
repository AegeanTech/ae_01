<?php

namespace App\Http\Controllers;

//
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Site;

use Input;
use Validator;

use Redirect;
use Session;

use Sentinel;

use App\Object;



use View;
use App\Doy;

use App\Umessage;
use App\Urequest;

//use Request;
use File;

class EditController extends Controller
{

    public function showEdit()
    {
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();

        $umessages = Umessage::where('uid', '=', $uid)->get();

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

        $objects = Object::lists('object', 'id');
        $doys = Doy::lists('descriptiondoy', 'doy');

        return view('pages.edit', compact('content', 'step', 'doys', 'objects', 'uid', 'userRoles', 'umessages'))->with('initial',$initial);
    }

    public function storeEdit(Request $request)
    {
        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $url = $content->suburl;
        $logo_status = $content->logo;
        $background_status = $content->background;
        $plain_status = $content->file;

        $urequest = new Urequest();
        $urequest->uid = $uid;
        $urequest->sid = $content->id;
        $urequest->type = 'Προσθήκη επαγγελματικής κατηγορίας';
        $urequest->description = $request->request_desctription;
        $urequest->status = 'Εκκρεμεί';
        $urequest->save();


        if(Input::hasFile('logo-file')) {
            $file = array('logo-file' => Input::file('logo-file'));
            $destinationPath = 'images'; // upload path
            File::delete($destinationPath.'/'.$url.'.jpg', $destinationPath.'/'.$url.'.png');
            $extension = Input::file('logo-file')->getClientOriginalExtension(); // getting image extension
            $fileName = $url . '.' . $extension; // renameing image
            Input::file('logo-file')->move($destinationPath, $fileName); // uploading file to given path
            $logo_status = '1';
        } elseif((isset($_POST['logo-removed'])) && ($_POST['logo-removed'] == 1)) {
            $destinationPath = 'images'; // upload path
            File::delete($destinationPath.'/'.$url.'.jpg', $destinationPath.'/'.$url.'.png');
            $logo_status = '0';
        }

        $content->logo = $logo_status;

        if(Input::hasFile('background-file')) {
            $file = array('background-file' => Input::file('background-file'));
            $destinationPath = 'backgrounds'; // upload path
            File::delete($destinationPath.'/'.$url.'.jpg', $destinationPath.'/'.$url.'.png');
            $extension = Input::file('background-file')->getClientOriginalExtension(); // getting image extension
            $fileName = $url . '.' . $extension; // renameing image
            Input::file('background-file')->move($destinationPath, $fileName); // uploading file to given path
            $background_status = '1';
        } elseif($_POST['background-removed'] == 1) {
            $destinationPath = 'backgrounds'; // upload path
            File::delete($destinationPath.'/'.$url.'.jpg', $destinationPath.'/'.$url.'.png');
            $background_status = '0';
        }

        $content->background = $background_status;

        if(Input::hasFile('plain-file')) {
            $file = array('plain-file' => Input::file('plain-file'));
            $destinationPath = 'files'; // upload path
            File::delete($destinationPath.'/'.$url.'.pdf');
            $extension = Input::file('plain-file')->getClientOriginalExtension(); // getting image extension
            $fileName = $url . '.' . $extension; // renameing image
            Input::file('plain-file')->move($destinationPath, $fileName); // uploading file to given path
            $plain_status = '1';
        } elseif($_POST['plain-removed'] == 1) {
            $destinationPath = 'files'; // upload path
            File::delete($destinationPath.'/'.$url.'.pdf');
            $plain_status = '0';
        }

        $content->file = $plain_status;

        $content->update($request->all());
        $content->objects()->detach();
        $content->objects()->attach($request->objects);

        \Session::flash('alert-success_msg', 'Η επεξεργασία ήταν επιτυχής!');

        return Redirect::to('admin/')->with('initial', '0');
    }

}
