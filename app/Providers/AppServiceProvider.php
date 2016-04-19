<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Sentinel;
use App\Umessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.umessages', function($view){
            $uid = Sentinel::getUser()->id;
            $view   -> with('umessages', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                    ->  get())
                    -> with('umessages_count', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('state', '=', 'unread')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->orWhere(function ($query) {
                            $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                                    ->where('expired_at', '=', NULL);
                        })
                    ->  count())
                    -> with('umessages_danger_count', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('state', '=', 'unread')
                        ->where('type', '=', 'danger')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->orWhere(function ($query) {
                            $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                                    ->where('expired_at', '=', NULL);
                        })
                    ->  count())
                    -> with('umessages_warning_count', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('state', '=', 'unread')
                        ->where('type', '=', 'warning')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->orWhere(function ($query) {
                            $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                                    ->where('expired_at', '=', NULL);
                        })
                    ->  count())
                    -> with('umessages_success_count', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('state', '=', 'unread')
                        ->where('type', '=', 'success')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->orWhere(function ($query) {
                            $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                                    ->where('expired_at', '=', NULL);
                        })
                    ->  count())
                    -> with('umessages_info_count', Umessage::where('uid', '=', $uid)
                        ->where('status', '=', 'active')
                        ->where('state', '=', 'unread')
                        ->where('type', '=', 'info')
                        ->where('triggered_at', '<=', date("Y-m-d H:i:s"))
                        ->orWhere(function ($query) {
                            $query  ->where('expired_at', '>=', date("Y-m-d H:i:s"))
                                    ->where('expired_at', '=', NULL);
                        })
                    ->  count())
                ;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
