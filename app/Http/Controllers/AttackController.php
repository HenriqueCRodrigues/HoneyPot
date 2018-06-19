<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AttackController extends Controller
{
	public function getCountryAndCities()
	{
		return response()->json(Country::select('id', 'name')->get()->each(function (Country $country) {
		 return $country->cities;
        }));

	}

    public function storeAttack(Request $request)
    {
		attack::create([
			'lat' 			=> $request->lat,
			'lon' 			=> $request->lon,
			'port'			=> $request->port,
			'dst_ip'		=> $request->ip,
			'city_id'   	=> $request->city,
			'protocol_id'	=> $request->protocol,
			]);

		return response()->json(['lon'=>$request->lon, 
								 'lat'=>$request->lat,
								 'color'=> $request->protocol==1 ? '#ff0000':'#0000ff'
			]);
    }
}
