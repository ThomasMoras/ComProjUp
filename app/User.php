<?php

namespace projetPhp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'prenom', 'description', 'departement', 'email', 'password', 'domaine_id', 'contrat_id', 'image', 'competence'
];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function domaine() {
        return $this->belongsTo(Domaine::class);
    }

    public function contrat() {
        return $this->belongsTo(Contrat::class);
    }


}
