<?php

namespace projetPhp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notification;
use projetPhp\Notification;
use projetPhp\Contact;

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

    public function member() {
        return $this->hasOne('Member','user_id');
    }

    public function askmember() {
        return $this->hasOne('AskMember','ask_user');
    }

    public function isContact(User $user) {
        $current_user = auth()->user();

        $contact1 = Contact::whereRaw("ask_user = $current_user->id AND receive_user = $user->id")->first();
        $contact2 = Contact::whereRaw("receive_user = $current_user->id AND ask_user = $user->id")->first();

        if(!$contact1 && !$contact2){
            return false;
        }
        return true;
    }

    public function unreadNotificationsType($type)
    {
//        dd($type);
        $current_user = auth()->user();

        $query_t = ['type', '=',  $type];
        $query_r = ['read_at', '=',  null];
        $query_u = ['notifiable_id', '=',  $current_user->id];

        $n = Notification::where([$query_t,$query_r,$query_u])->get();


//        $notifications = Notification::whereRaw("type = $type AND read_at is NULL")->first();
//        dd($n);
        return $n;
    }

    public function unreadNotificationsTypeCount($type)
    {
        $current_user = auth()->user();

        $query_t = ['type', '=',  $type];
        $query_r = ['read_at', '=',  null];
        $query_u = ['notifiable_id', '=',  $current_user->id];

        $n = Notification::where([$query_t,$query_r,$query_u])->get();

        if($n != null) {
            return $n->count();
        }
        else {
            return 0;
        }
    }
}
