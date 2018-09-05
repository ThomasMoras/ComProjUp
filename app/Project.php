<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 07/08/2018
 * Time: 17:49
 */

namespace projetPhp;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'titre', 'objectif', 'description', 'image', 'domaine_id', 'professionnel', 'dure', 'nb_personne', 'user_id'
    ];

    public function domaine() {
        return $this->belongsTo(Domaine::class);
    }

    public function member() {
        return $this->hasOne('Member','project_id');
    }
}