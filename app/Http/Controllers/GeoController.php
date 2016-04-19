<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

use App\City;
use App\Postal;

class GeoController extends Controller
{
    public function findStateCity() {
        // Getting all post data
//        if(Request::ajax()) {
            $data = Input::all();
            $postalcode = $data['postalcode'];
//            $city = City::where('postal_from', '=', $postalcode)->firstOrFail();
            $city = City::where('postal_from', '<', $postalcode)
                        ->where('postal_to', '>', $postalcode)
                        ->with('states')->firstOrFail();
//            $city = City::where('postal_from', '=', $postalcode)->with('postals')->get();
//            $game = Game::where('id',1)->with('platforms')->get();
            return json_encode($city);
//            return Response::json(array(
//                'success' => true,
//                'data'   => $data
//            ));
//        }
    }
}
