<?php

namespace projetPhp\Http\Controllers;

use DB;

use App\Http\Requests\StoreMessageRequest;
use Carbon\Carbon;
use projetPhp\Message;
//use projetPhp\Repository\ConversationRepository;
use projetPhp\User;
use projetPhp\Contact;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{

    /**
     * @var AuthManager
     */
    private $auth;


    public function __construct(AuthManager $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    public function index () {

        $userId = $this->auth->user()->id;
//
//        $conversations = User::select('name', 'id', 'image')
//            ->where('id', '!=', $userId)
//            ->get();
        $conversations = array();
        $query_receive = ['receive_user', '=',  $userId];
        $query_ask = ['ask_user', '=',  $userId];

        $contacts = Contact::where([$query_ask])->get();
        foreach($contacts as $contact) {
            if($contact->accept == true) {
                $user = User::where('id', '=', $contact['receive_user'])->first();
                array_push($conversations, $user);
            }
        }
        $contacts = Contact::where([$query_receive])->get();
        foreach($contacts as $contact) {
            if($contact->accept == true) {
                $user = User::where('id','=',$contact['ask_user'])->first();
                array_push($conversations, $user);
            }
        }

        return view('index', [
            'users' => $conversations
        ]);
    }

    public function show (User $user) {

        $me = $this->auth->user();

//        $users = User::select('name', 'id')
////            ->where('id', '!=', $me->id)
//            ->join('contacts', 'users.id', '=', 'contacts.ask_user')
////            ->join('contacts', 'users.id', '=', 'contacts.receive_user')
//            ->get();

        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.ask_user')
//            ->join('contacts', 'users.id', '=', 'contacts.receive_user')
            ->select('users.*')
            ->where('users.id', '!=', $me->id)
            ->where('contacts.ask_user', '=', $me->id)
            ->distinct()
            ->get();
        $users = array();
        $messages = Message::whereRaw("((from_id = $me->id AND to_id = $user->id) OR (from_id = $user->id AND to_id = $me->id))")
            ->orderBy('created_at', 'ASC')->get();

        return view('show', [
            'users' => $users,
            'user_destination' => $user,
            'messages' => $messages
        ]);
    }

    public function store (User $user, Request $request) {


        $message = new Message();
        $message->content = $request->input('content');
        $message->from_id = $this->auth->user()->id;
        $message->to_id = $user->id;
        $message->created_at =  Carbon::now();

        $message->save();

        return redirect(route('conversations.show', ['id' => $user->id]));
    }

}
