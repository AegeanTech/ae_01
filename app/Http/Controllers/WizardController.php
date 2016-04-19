<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;

use App\Site;
use App\Object;
use App\Doy;

use App\Suburl;
use App\Subscription;
use App\Umessage;
use App\Urequest;
use App\Config;

use Input;
use Validator;
use Session;
use Request;


class WizardController extends Controller
{

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
	
    public function showWizard()
    {
        if(Sentinel::check())
        {
//        $content = Site::all();
            $uid = Sentinel::getUser()->id;
            $content = Site::where('uid', '=', $uid)->count();
			
			$userRoles = Sentinel::getRoles()->lists('name', 'id')->all();

            $umessages = Umessage::where('uid', '=', $uid)->get();
			
            if ($content == 0){
                $initial = 1;
            } else {
                $initial = 0;
            }
        $objects = Object::lists('object', 'id');
            $doys = Doy::lists('descriptiondoy', 'doy');
        return view('pages.start', compact('doys', 'objects', 'uid', 'userRoles', 'umessages'))->with('initial',$initial);
        }
        else
            return Redirect::to('admin/signin')->with('error', 'Θα πρέπει πρώτα να συ!');

    }

    public function storeWizard()
    {
        $input = Request::all();

        if(Input::hasFile('logo')) {
            $logo_status = '1';
        } else {
            $logo_status = '0';
        }

        $id='';
        while (Site::where('suburl', '=', $url = strtolower(str_replace(' ', '-', \Knlv\transelot($input['name']))).$id)->exists()) {
            $id=$id+1;
        }

        $site = new Site;

        $site->title = $input['title'];
        $site->name = $input['name'];
        $site->vatn = $input['vatn'];
        $site->doy = $input['doy'];
        $site->address = $input['address'];
        $site->phone = $input['phone'];
        $site->site = $input['site'];
        $site->email = $input['email'];
        $site->socialf = $input['socialf'];
        $site->socialt = $input['socialt'];
        $site->sociall = $input['sociall'];
        $site->sociali = $input['sociali'];
        $site->socialy = $input['socialy'];
        $site->logo = $logo_status;
        $site->descriptionobj = $input['descriptionobj'];
        $site->description = $input['description'];
        $site->slogan = $input['slogan'];
        $site->uid = Sentinel::getUser()->id;
//        $site->uid = $input['uid'];
        $site->status = $input['status'];
//        $site->suburl = $input['suburl'];
        $site->suburl = $url;
        $site->lat = $input['lat'];
        $site->lng = $input['lng'];
        $site->theme = $input['theme'];
        $site->city = $input['city'];
        $site->state = $input['state'];
        $site->postalcode = $input['postalcode'];





        if($site->save()){
            $site->objects()->attach(Request::input('objects'));

            $urequest = new Urequest();
            $urequest->uid = Sentinel::getUser()->id;
            $urequest->sid = $site->id;
            $urequest->type = 'Προσθήκη επαγγελματικής κατηγορίας';
            $urequest->description = $input['request_desctription'];
            $urequest->status = 'Εκκρεμεί';
            $urequest->save();

            $created_suburl = new Suburl;
            $created_suburl->sid = $site->id;
            $created_suburl->suburl = $site->suburl;
            $created_suburl->save();

            $created_subscription = new Subscription;
            $created_subscription->sid = $site->id;
            $created_subscription->uid = $site->uid;
            $created_subscription->upgraded_at = '0000-00-00';
            $created_subscription->started_at = '0000-00-00';
            $created_subscription->ended_at = '0000-00-00';
            $created_subscription->save();

            $config = new Config();
            $config->uid = $site->id;
            $config->sid = $site->id;
            $config->images = '9';
            $config->save();

            if(Input::hasFile('logo')) {
                $file = array('logo' => Input::file('logo'));
                $destinationPath = 'images'; // upload path
                $extension = Input::file('logo')->getClientOriginalExtension(); // getting image extension
//            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = $site->id . '.' . $extension; // renameing image
                Input::file('logo')->move($destinationPath, $fileName); // uploading file to given path
            }
        }



//        $id='';
//
//
//
//        while (Site::where('suburl', '=', $url = strtolower(str_replace(' ', '-', \Knlv\transelot($input['name']))).$id)->exists()) {
//            $id=$id+1;
//        }

//        $url = strtolower(str_replace(' ', '-', \Knlv\transelot($input['name']))).$id;
//        return $url;

//        return $site;

        return Redirect::to('admin/signin')->with('initial', '0');

    }
}
