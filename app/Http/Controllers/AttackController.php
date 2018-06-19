<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttackController extends Controller
{
	public function getCountryAndCities()
	{
		return City::select('cities.name AS city', 'countries.name AS country')
		->join('countries', 'cities.country_id', '=', 'countries.id')
		->get();
		
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
