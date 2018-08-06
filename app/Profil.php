<?php

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nom', 'email', 'departement', 'prenom'
    ];
}
