<?php

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class AskMember extends Model
{
    public $table = "askmember";

    protected $fillable = [
        'id', 'ask_user', 'receive_user', 'accept', 'poste_id'
    ];


    public function ask()
    {
        return $this->belongsTo(User::class, 'ask_user');
    }

    public function poste() {
        return $this->belongsTo(Member::class);
    }
}
