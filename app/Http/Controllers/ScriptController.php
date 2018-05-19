<?php

namespace App\Http\Controllers;

use App\Models\Attack;
use App\Models\City;
use App\Models\Country;
use App\Models\Protocol;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScriptController extends Controller
{
    protected $modelCountry;
    protected $modelCity;
    protected $modelProtocol;

    public function run()
    {
        ini_set('memory_limit', -1);
        set_time_limit(0);
        $source = '/home/henrique/Área de Trabalho/BD2/REFORMATADO.csv';

        $file = file($source);

        $this->seedOfFile($file);

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
}
