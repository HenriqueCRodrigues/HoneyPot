<?php

namespace App\Http\Controllers;

use App\Models\Attack;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function forPort()
    {
        $ports = \DB::table('attacks')
                 ->limit(10)
                 ->select('port', \DB::raw('count(*) as total'))
                 ->orderByDesc('total')
                 ->groupBy('port')
                 ->get();

        return response()->json($ports);
    }

    public function forPortAndDate()
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
        $ports =  \DB::table('attacks')
            ->select('port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('port', 'protocol_id');

        if($request->download) {
            $myFile = Excel::create('Relatório de ataques de portas e protocolos', function ($excel) use ($ports) {

                $excel->sheet('Relatório', function ($sheet) use ($ports) {
                    $sheet->appendRow([
                        'PORTA',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach($ports->get() as $port) {
                        $sheet->appendRow([
                            $port->port,
                            $port->type,
                            $port->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response =  array(
                'name' => "Relatório de ataques de portas e protocolos", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
            );
            return response()->json($response);
        }



        return $ports->limit(10)->get();
    }

    public function forCity()
    {

       $city =  \DB::table('attacks')
                 ->limit(10)
                 ->select('cities.name', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->orderByDesc('total')
                 ->groupBy('city_id')
                 ->get();

        return $city;
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

    public function forCityAndPort()
    {
        $city = \DB::table('attacks')
                 ->limit(10)
                 ->select('cities.name', 'attacks.port', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->orderByDesc('total')
                 ->groupBy('city_id', 'port')
                 ->get();
        return $city;
    }

    public function forCityAndProtocol(Request $request)
    {
        $city = \DB::table('attacks')
                 ->limit(10)
                 ->select('cities.name', 'protocols.type', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->join('protocols','attacks.protocol_id', '=', 'protocols.id')
                 ->orderByDesc('total')
                 ->groupBy('city_id', 'protocol_id')
                 ->get();
        return $city;
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

    public function forCityPortAndProtocol()
    {
        $city = \DB::table('attacks')
            ->limit(10)
            ->select('cities.name', 'attacks.port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities','attacks.city_id', '=', 'cities.id')
            ->join('protocols','attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('city_id', 'port', 'protocol_id')
            ->get();
        return $city;
    }

    public function forCountry()
    {
           $country = \DB::table('attacks')
                 ->limit(10)
                 ->select('countries.name', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->join('countries','cities.country_id', '=', 'countries.id')
                 ->orderByDesc('total')
                 ->groupBy('countries.id')
                 ->get();
                 return $country;
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

    public function forCountryAndPort()
    {
         $country = \DB::table('attacks')
                 ->limit(10)
                 ->select('countries.name', 'attacks.port', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->join('countries','cities.country_id', '=', 'countries.id')
                 ->orderByDesc('total')
                 ->groupBy('countries.id', 'attacks.port')
                 ->get();
                 return $country;
    }

    public function forCountryAndProtocol()
    {
          $country = \DB::table('attacks')
                 ->limit(10)
                 ->select('countries.name', 'protocols.type', \DB::raw('count(*) as total'))
                 ->join('cities','attacks.city_id', '=', 'cities.id')
                 ->join('countries','cities.country_id', '=', 'countries.id')
                 ->join('protocols','attacks.protocol_id', '=', 'protocols.id')
                 ->orderByDesc('total')
                 ->groupBy('countries.id', 'attacks.protocol_id')
                 ->get();
                 return $country;
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

    public function forCountryPortAndProtocol()
    {
        $country = \DB::table('attacks')
            ->limit(10)
            ->select('countries.name', 'attacks.port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities','attacks.city_id', '=', 'cities.id')
            ->join('countries','cities.country_id', '=', 'countries.id')
            ->join('protocols','attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('countries.id', 'attacks.protocol_id', 'attacks.port')
            ->get();

        return $country;
    }

    public function forIp()
    {
        $ip = \DB::table('attacks')
                 ->limit(10)
                 ->select('dst_ip', \DB::raw('count(*) as total'))
                 ->orderByDesc('total')
                 ->groupBy('dst_ip')
                 ->get();
                 return $ip;
    }

    public function forIpAndPort()
    {
         $ip = \DB::table('attacks')
                 ->limit(10)
                 ->select('dst_ip', 'port', \DB::raw('count(*) as total'))
                 ->orderByDesc('total')
                 ->groupBy('dst_ip', 'port')
                 ->get();
                 return $ip;
    }

    public function forIpAndProtocol()
    {
        $ip = \DB::table('attacks')
                 ->limit(10)
                 ->select('dst_ip', 'protocols.type', \DB::raw('count(*) as total'))
                 ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
                 ->orderByDesc('total')
                 ->groupBy('dst_ip', 'protocol_id')
                 ->get();
                 return $ip;
    }

    public function forProtocol()
    {
        $ip = \DB::table('attacks')
                 ->select('protocols.type', \DB::raw('count(*) as total'))
                 ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
                 ->orderByDesc('total')
                 ->groupBy('protocol_id')
                 ->get();
                 return $ip;
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
