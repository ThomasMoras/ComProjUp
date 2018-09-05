<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 04/09/2018
 * Time: 21:13
 */

namespace projetPhp\Http\Controllers;
use projetPhp\Member;
use projetPhp\User;
use projetPhp\AskMember;
use projetPhp\Notifications\AskPoste;

class NotificationMemberController extends Controller
{
    public function notification_member() {
        $current_user = auth()->user();

        $query_receive = ['receive_user', '=',  $current_user->id];

        $notifications = $current_user->unreadNotifications;
//        dd($notifications);

        foreach($notifications as $notification) {
            if($notification['type'] == 'projetPhp\Notifications\askPoste') {
                $notification->markAsRead();

                $id = $notification->data['user']['id'];
                $poste_id = $notification->data['member']['id'];
                $poste = AskMember::whereRaw("receive_user = $current_user->id AND ask_user = $id AND poste_id = $poste_id")->first();
//                dd($poste);

//                dd($current_user->id,$id);
                if($poste == null && ($current_user->id != $id)) {
//                    dd($notification->data);
                    AskMember::create([
                        'ask_user' => $notification->data['user']['id'],
                        'receive_user' =>  $current_user->id,
                        'accept' => null,
                        'poste_id' => $notification->data['member']['id'],
                    ]);
                }
            }
        }
        $users = array();
        $query_receive = ['accept', '=',  null];

        $postes = AskMember::where([$query_receive],[])->get();
//        dd($postes);
        foreach($postes as $poste) {
            if($poste->accept == null)  {
//                $user = User::where('id','=',$poste['ask_user'])->first();
                array_push($users, $poste);
            }
        }
//        dd($users[0]);
        return  view('notification_member', ['notifications' => $notifications, 'users'=> $users]);
    }

    public function askPoste(Member $member) {
        $current_user = auth()->user();
//        dd($member);
        $user = User::where('id','=', $member->created_by)->first();
//        dd($user);
        $user->notify(new AskPoste($member,$current_user));
        return view('poste_show',['member' => $member]);
    }

    public function responseT(AskMember $res) {
        $poste = $res->poste()->first();
        $ask_user = $res->ask()->first();

        $poste->user_id = $ask_user->id;
        $poste->save();

        $res->accept = true;
        $res->save();

        return $this->notification_member();
    }

    public function responseF(AskMember $res)
    {
        $res->accept = false;
        $res->save();

        return $this->notification_member();
    }

}