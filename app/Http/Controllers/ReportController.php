<?php

namespace App\Http\Controllers;

use App\Models\Attack;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /*
        Por Porta
        Por Porta e Tempo
        Por Porta e Protocolo

        Por cidade
        Por cidade e Tempo
        Por cidade e Porta
        Por cidade e Protocolo
        Por cidade, Tempo e Porta
        Por cidade, Tempo, Porta e Protocolo


        Por País
        Por País e Tempo
        Por País e Porta
        Por País e Protocolo
        Por País, Tempo e Porta
        Por País, Tempo, Porta e Protocolo

        Por IP
        Por IP e Porta
        Por IP e protocolo


        Por Protocolo
        Por Protocolo e Tempo
     */

    public function forPort(Request $request)
    {
        $port = $request->get('port');

        return Attack::where('port', '=', $port)->get();
    }

    public function forPortAndDate(Request $request)
    {
        $port = $request->get('port');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');

        return Attack::where([
            ['port', '=', $port],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }

    public function forPortAndProtocol(Request $request)
    {
        $port = $request->get('port');
        $protocol = $request->get('protocol');

        return Attack::where([
            ['port', '=', $port],
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forCity(Request $request)
    {
        $city = $request->get('city');

        return Attack::where([
            ['city_id', '=', $city],
        ])->get();
    }

    public function forCityAndDate(Request $request)
    {
        $city = $request->get('city');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');

        return Attack::where([
            ['city_id', '=', $city],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }

    public function forCityAndPort(Request $request)
    {
        $city = $request->get('city');
        $port = $request->get('port');

        return Attack::where([
            ['city_id', '=', $city],
            ['port', '=', $port],
        ])->get();
    }

    public function forCityAndProtocol(Request $request)
    {
        $city = $request->get('city');
        $protocol = $request->get('protocol');

        return Attack::where([
            ['city_id', '=', $city],
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forCityDateAndPort(Request $request)
    {
        $city = $request->get('city');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');
        $port = $request->get('port');

        return Attack::where([
            ['city_id', '=', $city],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
            ['port', '=', $port],
        ])->get();
    }

    public function forCityDatePortAndProtocol(Request $request)
    {
        $city = $request->get('city');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');
        $port = $request->get('port');
        $protocol = $request->get('protocol');

        return Attack::where([
            ['city_id', '=', $city],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
            ['port', '=', $port],
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forCountry(Request $request)
    {
        $country = $request->get('country');

        return Attack::where([
            ['country_id', '=', $country],
        ])->get();
    }

    public function forCountryAndDate(Request $request)
    {
        $country = $request->get('country');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');


        return Attack::where([
            ['country_id', '=', $country],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }

    public function forCountryAndPort(Request $request)
    {
        $country = $request->get('country');
        $port = $request->get('port');

        return Attack::where([
            ['country_id', '=', $country],
            ['port', '=', $port],
        ])->get();
    }

    public function forCountryAndProtocol(Request $request)
    {
        $country = $request->get('country');
        $protocol = $request->get('protocol');

        return Attack::where([
            ['country_id', '=', $country],
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forCountryPortAndDate(Request $request)
    {
        $country = $request->get('country');
        $port = $request->get('port');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');

        return Attack::where([
            ['country_id', '=', $country],
            ['port', '=', $port],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }

    public function forCountryPortDateAndProtocol(Request $request)
    {
        $country = $request->get('country');
        $port = $request->get('port');
        $protocol = $request->get('protocol');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');

        return Attack::where([
            ['country_id', '=', $country],
            ['port', '=', $port],
            ['protocol', '=', $protocol],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }

    public function forIp(Request $request)
    {
        $ip = $request->get('ip');

        return Attack::where('dst_ip', '=', $ip)->get();
    }

    public function forIpAndPort(Request $request)
    {
        $ip = $request->get('ip');
        $port = $request->get('port');

        return Attack::where([
            ['dst_ip', '=', $ip],
            ['port', '=', $port],
        ])->get();
    }

    public function forIpAndProtocol(Request $request)
    {
        $ip = $request->get('ip');
        $protocol = $request->get('protocol');

        return Attack::where([
            ['dst_ip', '=', $ip],
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forProtocol(Request $request)
    {
        $protocol = $request->get('protocol');

        return Attack::where([
            ['protocol', '=', $protocol],
        ])->get();
    }

    public function forProtocolAndTime(Request $request)
    {
        $protocol = $request->get('protocol');
        $dateMin = $request->get('dateMin');
        $dateMax = $request->get('dateMax');

        return Attack::where([
            ['protocol', '=', $protocol],
            ['dateMin', '>', $dateMin],
            ['dateMax', '<', $dateMax],
        ])->get();
    }
}
