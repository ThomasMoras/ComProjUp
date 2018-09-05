<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 04/09/2018
 * Time: 22:22
 */

namespace projetPhp;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id', 'type', 'notifiable_id', 'notifiable_data', 'data', 'read_at', 'created_at', 'updated_at'
    ];
}