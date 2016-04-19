<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Tipospou
use Illuminate\Support\Facades\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
//

use Illuminate\Support\Facades\Input;
use Sentinel;
use View;
use Datatables;

use DB;

use App\Site;
use App\Suburl;
use App\Subscription;

use App\Config;

use App\Umessage;

use App\User;

class SubscriptionController extends Controller
{
    public function getInitialData()
    {

        $uid = Sentinel::getUser()->id;
        $content = Site::where('uid', '=', $uid)->firstOrFail();
        $contentcount = Site::where('uid', '=', $uid)->count();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        $umessages = Umessage::where('uid', '=', $uid)->get();
        if ($contentcount == 0){
            $initial = 1;
        } else {
            $initial = 0;
        }
        return compact('uid', 'content', 'initial', 'userRoles', 'umessages');
    }

    public function index()
    {
        return view('pages.admin.subscriptions.datatables', $this->getInitialData());
    }

    public function view($id = '')
    {
        if ($id){

            $subscription = Site::With('users', 'objects', 'subscriptions', 'suburls')->where('id', '=', $id)->first();
//            return $subscription->toJson();
//            return Datatables::of($subscription)->make(true);

            switch ($subscription->group) {
                case "R":
                    $subscription->group = "<p class=\"form-control-static\" style=\"color:#dd4033\"> Κόκκινο</div>";
                    break;
                case "G":
                    $subscription->group = "<p class=\"form-control-static\" style=\"color:#009178\"> Πράσινο</div>";
                    break;
                case "B":
                    $subscription->group = "<p class=\"form-control-static\" style=\"color:#3f779f\"> Μπλε</div>";
                    break;
                default:
                    $subscription->group = "<p class=\"form-control-static\"> -</p>";
            }

            switch ($subscription->subscriptions->group) {
                case "R":
                    $subscription->subscriptions->group = "<p class=\"form-control-static\" style=\"color:#dd4033\"> Κόκκινο</div>";
                    break;
                case "G":
                    $subscription->subscriptions->group = "<p class=\"form-control-static\" style=\"color:#009178\"> Πράσινο</div>";
                    break;
                case "B":
                    $subscription->subscriptions->group = "<p class=\"form-control-static\" style=\"color:#3f779f\"> Μπλε</div>";
                    break;
                default:
                    $subscription->subscriptions->group = "<p class=\"form-control-static\"> -</p>";
            }

            return view('pages.admin.subscriptions.view', compact('id', 'subscription'), $this->getInitialData());
        }
    }

    public function edit($id = '')
    {
        if ($id){

            $subscription_site = Site::where('id', '=', $id)->firstOrFail();
            $subscription_info = Subscription::where('sid', '=', $id)->firstOrFail();

            if($subscription_info->upgraded_at == "0000-00-00"){
                $subscription_info->upgraded_at = date('Y-m-d');
            }
            if($subscription_info->started_at == "0000-00-00"){
                $subscription_info->started_at = date('Y-m-d');
            }
            if($subscription_info->ended_at == "0000-00-00"){
                $subscription_info->ended_at = date("Y-m-d", strtotime(date("Y-m-d") . " + 365 day"));
            }

            $subscription_info->upgraded_at = date("d/m/Y", strtotime($subscription_info->upgraded_at));
            $subscription_info->started_at = date("d/m/Y", strtotime($subscription_info->started_at));
            $subscription_info->ended_at = date("d/m/Y", strtotime($subscription_info->ended_at));

            return view('pages.admin.subscriptions.edit', compact('id', 'subscription_site', 'subscription_info'), $this->getInitialData());
        }
    }

    public function store()
    {
        $input = Request::all();

        if ($input) {
            $id = $input['sid'];
            $user = $input['uid'];
            $subscription = Subscription::where('sid', '=', $id)->firstOrFail();

            $subscription->group = $input['group'];
            $subscription->upgraded_at = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $input['upgraded_at']);
            $subscription->started_at = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $input['started_at']);
            $subscription->ended_at = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $input['ended_at']);
//            $subscription->upgraded_at = date('Y-m-d', strtotime(str_replace('-', '/', $input['upgraded_at'])));
//            $subscription->started_at = date('Y-m-d', strtotime(str_replace('-', '/', $input['started_at'])));
//            $subscription->ended_at = date('Y-m-d', strtotime(str_replace('-', '/', $input['ended_at'])));

            switch ($input['group']) {
                case "R":
                    $role_id = 5;
                    break;
                case "G":
                    $role_id = 4;
                    break;
                case "B":
                    $role_id = 3;
                    break;
                default:
                    $role_id = 2;
            }

            DB::table('role_users')
                ->where('user_id', $user)
                ->update(['role_id' => $role_id]);

            $subscription->update();

            $config = Config::where('sid', '=', $id)->where('uid', '=', $user)->firstOrFail();
            $config->susid = $subscription->id;
            $config->update();

            return Redirect::to('admin/subscriptions')->with('initial', '0');
        }
    }

    public function data()
    {
//        $subscriptions = Site::All();
        $subscriptions = Site::With('objects', 'subscriptions', 'suburls')->get();
//        $subscriptions = Site::With('subscriptions')->get();
//        $subscriptions = Site::findOrFail(1);


//        $subscriptions = Subscription::select(['uid', 'sid', 'upgraded_at', 'started_at', 'ended_at']);

        return Datatables::of($subscriptions)
            ->add_column('actions','<a href="{{ route(\'admin.subscription.view\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Επεξεργασία Suburl"></i></a>
                                    <a href="{{ route(\'admin.subscription.edit\', $id) }}"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Επεξεργασία Suburl"></i></a>
                                    ')
            ->make(true);
    }

}
