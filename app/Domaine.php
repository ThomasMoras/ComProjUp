<?php

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function user() {
        return $this->hasOne('User','domaine_id');
    }
}