<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 29/08/2018
 * Time: 14:01
 */

namespace projetPhp;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'project_id	', 'user_id', 'domaine_id', 'contrat_id	', 'nom', 'description', 'competence'
    ];

    public function domaine() {
        return $this->belongsTo(Domaine::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function projet() {
        return $this->belongsTo(Project::class);
    }
}