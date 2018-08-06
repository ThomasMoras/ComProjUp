<?php

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function user() {
        return $this->hasOne('User','contrat_id');
    }
}
