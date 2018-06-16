<?php

namespace App\Http\Controllers;

use App\Models\Attack;
use App\Models\City;
use App\Models\Country;
use App\Models\Protocol;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use Weidner\Goutte\GoutteFacade;

class ScriptController extends Controller
{
    protected $modelCountry;
    protected $modelCity;
    protected $modelProtocol;

    public function testSelect()
    {
        return view('welcome', ['attacks' => Attack::where('city_id', '=', 1)->get()]);
    }

    public function run()
    {
        ini_set('memory_limit', -1);
        set_time_limit(0);
        $source = '/home/henrique/Área de Trabalho/BD2/REFORMATADO.csv';
        $sourceIP = '/home/henrique/Área de Trabalho/BD2/all_ip.csv';

        $file = file($source);
        $this->seedOfFile($file);

        //$fileIP = file($sourceIP);
        //$this->getAllIPSource($file);
        //$this->sizeIPs($fileIP);
        //$this->setAllPossibilityIPs($fileIP);
        //$this->seedOfFile($file);

        return "Banco preenchido com sucesso";
    }

    public function seedOfFile($file)
    {
        foreach ($file as $index => $line) {
            if ($index > 0) {
                try {
                    DB::beginTransaction();

                    $this->seedOrSearchCountry($line);
                    $this->seedOrSearchCity($line);
                    $this->seedOrSearchProtocol($line);
                    $this->seedAttack($line);
                } catch (\Exception $e) {
                    DB::rollBack();
                }

                DB::commit();
            }
        }
    }

    public function seedOrSearchCountry($line)
    {
        $arrayCountry = [];
        $arrayCountry['acronym'] = trim(explode("\t", $line)[8]) !== '' ? trim(explode("\t", $line)[8]) : null;
        $arrayCountry['name'] = trim(explode("\t", $line)[9]) !== '' ? trim(explode("\t", $line)[9]) : null;


        $this->modelCountry = Country::where($arrayCountry)->first();

        if (!$this->modelCountry) {
            $auxAcronym = $arrayCountry;
            unset($auxAcronym['name']);
            $this->modelCountry = Country::where($auxAcronym)->first();

            if (!$this->modelCountry) {
                $this->modelCountry = Country::create($arrayCountry);
            }
        }
    }

    public function seedOrSearchCity($line)
    {
        $arrayCity = [];
        $arrayCity['name'] = trim(explode("\t", $line)[10]) !== '' ? trim(explode("\t", $line)[10]) : 'Não Fornecido';
        $arrayCity['country_id'] = $this->modelCountry->id;

        $this->modelCity = City::where($arrayCity)->first();

        if (!$this->modelCity) {
            $this->modelCity = City::create($arrayCity);
        }
    }

    public function seedOrSearchProtocol($line)
    {
        $arrayProtocol = [];
        $arrayProtocol['type'] = trim(explode("\t", $line)[3]);

        $this->modelProtocol = Protocol::where($arrayProtocol)->first();

        if (!$this->modelProtocol) {
            $this->modelProtocol = Protocol::create($arrayProtocol);
        }
    }

    public function seedAttack($line)
    {
        $arrayAttack['protocol_id'] = $this->modelProtocol->id;
        $arrayAttack['city_id'] = $this->modelCity->id;

        $arrayAttack['date_time'] = trim(explode("\t", $line)[0]) !== '' ?
            Carbon::parse(trim(explode("\t", $line)[0])) : null;
        $arrayAttack['lat'] = trim(explode("\t", $line)[13]) !== '' ?
            trim(explode("\t", $line)[13]) : null;
        $arrayAttack['lon'] = trim(explode("\t", $line)[14]) !== '' ?
            trim(explode("\t", $line)[14]) : null;
        $arrayAttack['port'] = trim(explode("\t", $line)[6]) !== '' ?
            trim(explode("\t", $line)[6]) : null;
        $arrayAttack['dst_ip'] = trim(str_replace('.', '', explode("\t", $line)[7])) !== '' ?
            trim(str_replace('.', '', explode("\t", $line)[7])) : null;
        $arrayAttack['src_ip'] = trim(str_replace('.', '', explode("\t", $line)[2])) !== '' ?
            trim(str_replace('.', '', explode("\t", $line)[2])) : null;

        $this->modelProtocol = Attack::create($arrayAttack);
    }

    public function getAllIPSource($file)
    {
        $ipInArray = [];
        $newFile = fopen('/home/henrique/Área de Trabalho/BD2/all_ip.csv', 'w+');

        foreach ($file as $line) {
            $ip = trim(str_replace('.', '', explode("\t", $line)[2])) !== '' ?
                trim(str_replace('.', '', explode("\t", $line)[2])) : null;

            if ($ip && !in_array(str_replace('.', '', $ip), $ipInArray)) {
                $ipInArray[] = $ip;
                fputcsv($newFile, [$ip]);
            }
        }
    }

    public function sizeIPs($file)
    {
        $ipInArray = [];
        foreach ($file as $index => $line) {
            if ($line > 0) {
                $line = strlen(str_replace("\n", '', $line));

                if (!in_array($line, $ipInArray)) {
                    $ipInArray[] = $line;
                }
            }
        }

        dd($ipInArray);
    }

    public function setAllPossibilityIPs($file)
    {
        $newFile = fopen('/home/henrique/Área de Trabalho/BD2/formated_ip.csv', 'w+');

        foreach ($file as $line) {
            if ($line > 0) {
                $line = str_replace("\n", '', $line);
                $response = $this->shitfIP($line, strlen($line));
                fputcsv($newFile, $response);

            }
        }

    }

    public function shitfIP($ip, $size)
    {
        $possibilityArray = [];
        $oldIP = $ip;
        $ip = str_split($ip);

        if ($size == 10) {
            $possibilityArray[]  = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8] . '.' . $ip[9];//1
            $possibilityArray[]  = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//2
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//3
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7] . '.' . $ip[8] . $ip[9];//4
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//5
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . '.' . $ip[8] . $ip[9];//6

            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//7
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//8
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7] . '.' . $ip[8] . $ip[9];//9

            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8] . $ip[9];//10

            $response = $this->crawlerLocation($possibilityArray);


        } elseif ($size == 9) {
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8];//1
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7] . '.' . $ip[8];//2
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//3
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//4
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8];//5
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . '.' . $ip[7] . $ip[8];//6
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . '.' . $ip[8];//7

            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//8
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8];//9
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8];//10
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//11
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//12
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7] . '.' . $ip[8];//13

            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7] . $ip[8];//14
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//15
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7] . $ip[8];//16

            $response = $this->crawlerLocation($possibilityArray);

        } elseif ($size == 8) {

            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7];//1
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . '.' . $ip[6] . $ip[7];//2
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7];//3
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//15
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7];//16
            $possibilityArray[] = $ip[0] . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . '.' . $ip[7];//16

            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . '.' . $ip[7];//4
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . '.' . $ip[6] . $ip[7];//18
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7];//5
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . $ip[3] . '.' . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//6
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//7
            $possibilityArray[] = $ip[0] . $ip[1] . '.' . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7];//8

            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//9
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . '.' . $ip[3] . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7];//10
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . '.' . $ip[6] . $ip[7];//11
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//13
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . $ip[2] . $ip[3] . '.' . $ip[4] . $ip[5] . $ip[6] . '.' . $ip[7];//14
            $possibilityArray[] = $ip[0] . '.' . $ip[1] . '.' . $ip[2] . $ip[3] . $ip[4] . '.' . $ip[5] . $ip[6] . $ip[7];//17

            $response = $this->crawlerLocation($possibilityArray);

        } else {
            dd('dei pau', $oldIP, $size);
        }

        if (sizeof($response) != 3) {
            //dd('erro pós conversão', $oldIP, $size);
            $response = [$oldIP, 'vazio', 'vazio'];
        }

        return $response;
    }

    public function crawlerLocation($arrayIPs)
    {
        $client = new Client();
        $line = [];

        foreach ($arrayIPs as $ip) {
            $beginSearch = $client->request('GET', 'https://www.iplocation.net');
            $formIP = $beginSearch->selectButton('IP Lookup')->form();
            $formIP['query']->setValue($ip);

            $resultSearch = $client->submit($formIP);
            $hasError = $resultSearch->filter('.error')->count();

            if (!$hasError) {
                $td = $resultSearch->filter('#wrapper > section > div > div > div.col.col_8_of_12 > div:nth-child(11) > div > table > tbody:nth-child(4) > tr > td');
                foreach ($td as $index => $t) {
                    if ($index == 2) {
                        $lat = $t->nodeValue;
                    } elseif ($index == 3) {
                        $lon = $t->nodeValue;
                    }
                }

                $line = [$ip, $lat, $lon];
                break;
            }
        }

        return $line;
    }
}
