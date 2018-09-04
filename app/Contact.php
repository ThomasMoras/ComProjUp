<?php

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'id', 'ask_user', 'receive_user', 'accept'
    ];

}
