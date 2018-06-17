<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attack;

class MapController extends Controller
{
    public function getAttacks(){
    	ini_set('memory_limit', -1);

    	return response()->json(Attack::select([
    		'attacks.lat', 
    		'attacks.lon',
    		'protocols.type', 
    		])
    	->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
    	->get()
        ->chunk(500));

    }
}
