<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
      'acronym',
      'name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class)->select(['id', 'name AS text']);
    }
}
