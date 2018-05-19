<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    protected $fillable = [
      'date_time',
      'protocol_id',
      'city_id',
      'lat',
      'lon',
      'port',
      'dst_ip',
      'src_ip',
      'user_id',
    ];
}
