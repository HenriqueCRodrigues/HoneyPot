<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttackController extends Controller
{
    public function storeAttack(Request $request)
    {
		attack::create([
			'lat' 			=> $request->lat,
			'lon' 			=> $request->lon,
			'port'			=> $request->port,
			'dst_ip'		=> $request->dst_ip,
			'city_id'   	=> $request->city_id,
			'protocol_id'	=> $request->protocol_id,
			]);

		return redirect()->route('index');
    }
}
