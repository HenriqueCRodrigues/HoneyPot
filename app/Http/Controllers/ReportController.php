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
        $ports = \DB::table('attacks')
            ->select('port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('port', 'protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques de portas e protocolos', function ($excel) use ($ports) {

                $excel->sheet('Relatório', function ($sheet) use ($ports) {
                    $sheet->appendRow([
                        'PORTA',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($ports->get() as $port) {
                        $sheet->appendRow([
                            $port->port,
                            $port->type,
                            $port->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques de portas e protocolos", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $ports->limit(10)->get();
    }

    public function forCity(Request $request)
    {

        $city = \DB::table('attacks')
            ->select('cities.name', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->orderByDesc('total')
            ->groupBy('city_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por cidades', function ($excel) use ($city) {

                $excel->sheet('Relatório', function ($sheet) use ($city) {
                    $sheet->appendRow([
                        'CIDADE',
                        'TOTAL',
                    ]);

                    foreach ($city->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por cidades", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }


        return $city->limit(10)->get();
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
        $city = \DB::table('attacks')
            ->select('cities.name', 'attacks.port', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->orderByDesc('total')
            ->groupBy('city_id', 'port');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por cidades e portas', function ($excel) use ($city) {

                $excel->sheet('Relatório', function ($sheet) use ($city) {
                    $sheet->appendRow([
                        'CIDADE',
                        'PORTA',
                        'TOTAL',
                    ]);

                    foreach ($city->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->port,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por cidades e portas", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }


        return $city->limit(10)->get();
    }

    public function forCityAndProtocol(Request $request)
    {
        $city = \DB::table('attacks')
            ->select('cities.name', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('city_id', 'protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por cidades e protocolos', function ($excel) use ($city) {

                $excel->sheet('Relatório', function ($sheet) use ($city) {
                    $sheet->appendRow([
                        'CIDADE',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($city->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->type,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por cidades e protocolos", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $city->limit(10)->get();
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

    public function forCityPortAndProtocol(Request $request)
    {
        $city = \DB::table('attacks')
            ->select('cities.name', 'attacks.port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('city_id', 'port', 'protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por cidades, portas e protocolos', function ($excel) use ($city) {

                $excel->sheet('Relatório', function ($sheet) use ($city) {
                    $sheet->appendRow([
                        'CIDADE',
                        'PORTA',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($city->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->port,
                            $c->type,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por cidades, portas e protocolos", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $city->limit(10)->get();
    }

    public function forCountry(Request $request)
    {
        $country = \DB::table('attacks')
            ->select('countries.name', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->orderByDesc('total')
            ->groupBy('countries.id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por país', function ($excel) use ($country) {

                $excel->sheet('Relatório', function ($sheet) use ($country) {
                    $sheet->appendRow([
                        'PAÍS',
                        'TOTAL',
                    ]);

                    foreach ($country->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por país", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $country->limit(10)->get();
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
        $country = \DB::table('attacks')
            ->select('countries.name', 'attacks.port', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->orderByDesc('total')
            ->groupBy('countries.id', 'attacks.port');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por país e portas', function ($excel) use ($country) {

                $excel->sheet('Relatório', function ($sheet) use ($country) {
                    $sheet->appendRow([
                        'PAÍS',
                        'PORTA',
                        'TOTAL',
                    ]);

                    foreach ($country->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->port,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por país e portas", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $country->limit(10)->get();
    }

    public function forCountryAndProtocol(Request $request)
    {
        $country = \DB::table('attacks')
            ->select('countries.name', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('countries.id', 'attacks.protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por país e protocolo', function ($excel) use ($country) {

                $excel->sheet('Relatório', function ($sheet) use ($country) {
                    $sheet->appendRow([
                        'PAÍS',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($country->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->type,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por país e protocolo", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $country->limit(10)->get();
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

    public function forCountryPortAndProtocol(Request $request)
    {
        $country = \DB::table('attacks')
            ->select('countries.name', 'attacks.port', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('cities', 'attacks.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('countries.id', 'attacks.protocol_id', 'attacks.port');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por país, porta e protocolo', function ($excel) use ($country) {

                $excel->sheet('Relatório', function ($sheet) use ($country) {
                    $sheet->appendRow([
                        'PAÍS',
                        'PORTA',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($country->get() as $c) {
                        $sheet->appendRow([
                            $c->name,
                            $c->port,
                            $c->type,
                            $c->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por país, porta e protocolo", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $country->limit(10)->get();
    }

    public function forIp(Request $request)
    {
        $ip = \DB::table('attacks')
            ->select('dst_ip', \DB::raw('count(*) as total'))
            ->orderByDesc('total')
            ->groupBy('dst_ip');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por IP', function ($excel) use ($ip) {

                $excel->sheet('Relatório', function ($sheet) use ($ip) {
                    $sheet->appendRow([
                        'IP',
                        'TOTAL',
                    ]);

                    foreach ($ip->get() as $i) {
                        $sheet->appendRow([
                            $i->dst_ip,
                            $i->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por IP", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $ip->limit(10)->get();
    }

    public function forIpAndPort(Request $request)
    {
        $ip = \DB::table('attacks')
            ->select('dst_ip', 'port', \DB::raw('count(*) as total'))
            ->orderByDesc('total')
            ->groupBy('dst_ip', 'port');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por IP e porta', function ($excel) use ($ip) {

                $excel->sheet('Relatório', function ($sheet) use ($ip) {
                    $sheet->appendRow([
                        'IP',
                        'PORTA',
                        'TOTAL',
                    ]);

                    foreach ($ip->get() as $i) {
                        $sheet->appendRow([
                            $i->dst_ip,
                            $i->port,
                            $i->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por IP e porta", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $ip->limit(10)->get();
    }

    public function forIpAndProtocol(Request $request)
    {
        $ip = \DB::table('attacks')
            ->select('dst_ip', 'protocols.type', \DB::raw('count(*) as total'))
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('dst_ip', 'protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por IP e protocolo', function ($excel) use ($ip) {

                $excel->sheet('Relatório', function ($sheet) use ($ip) {
                    $sheet->appendRow([
                        'IP',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($ip->get() as $i) {
                        $sheet->appendRow([
                            $i->dst_ip,
                            $i->type,
                            $i->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por IP e protocolo", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $ip->limit(10)->get();
    }

    public function forProtocol(Request $request)
    {
        $protocol = \DB::table('attacks')
            ->select('protocols.type', \DB::raw('count(*) as total'))
            ->join('protocols', 'attacks.protocol_id', '=', 'protocols.id')
            ->orderByDesc('total')
            ->groupBy('protocol_id');

        if ($request->download) {
            $myFile = Excel::create('Relatório de ataques por IP e protocolo', function ($excel) use ($protocol) {

                $excel->sheet('Relatório', function ($sheet) use ($protocol) {
                    $sheet->appendRow([
                        'IP',
                        'PROTOCOLO',
                        'TOTAL',
                    ]);

                    foreach ($protocol->get() as $p) {
                        $sheet->appendRow([
                            $p->type,
                            $p->total,
                        ]);
                    }
                });
            });


            $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
            $response = [
                'name' => "Relatório de ataques por protocolo", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($myFile) //mime type of used format
            ];
            return response()->json($response);
        }

        return $protocol->get();
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
