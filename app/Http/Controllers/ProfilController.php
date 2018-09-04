<?php

namespace projetPhp\Http\Controllers;

use Illuminate\Notifications\Notification;
use projetPhp\Contrat;
use projetPhp\Domaine;
use projetPhp\Contact;
use Illuminate\Http\Request;
use projetPhp\Member;
use projetPhp\User;
use projetPhp\Project;
use projetPhp\Notifications\AskContact;
use DB;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function askContact(User $user) {
        $current_user = auth()->user();
        $projects = Project::where('user_id', '=',$user->id)->orderBy('created_at')->get();

        $user->notify(new AskContact($current_user));

        $member_projects = array();
        $members = Member::where('user_id','=',$user->id)->get();
        foreach ($members as $m) {
            $proj = Project::where('id','=',$m->project_id)->first();
            array_push($member_projects, $proj);
        }

        return view('view-profil',['user' => $user, 'create_projects' => $projects, 'member_projects' => $member_projects]);
    }

    public function responseT(User $user) {
        $current_user = auth()->user();

        $contact = Contact::whereRaw("receive_user = $current_user->id AND ask_user = $user->id")->first();
        if($contact != null) {
            $contact->accept = true;
            $contact->save();
        }

        $conversations = array();
        $query_receive = ['receive_user', '=',  $current_user->id];
        $query_ask = ['ask_user', '=',  $current_user->id];

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
    public function responseF(User $user) {
        $current_user = auth()->user();

        $contact = Contact::whereRaw("receive_user = $current_user->id AND ask_user = $user->id")->first();
        if($contact != null ) {
            $contact->accept = false;
            $contact->save();
        }

        $conversations = array();
        $query_receive = ['receive_user', '=',  $current_user->id];
        $query_ask = ['ask_user', '=',  $current_user->id];

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

    public function notification() {
        $current_user = auth()->user();

        $query_receive = ['receive_user', '=',  $current_user->id];

        $users = array();
        $notifications = auth()->user()->unreadNotifications;
        foreach($notifications as $notification) {
            $notification->markAsRead();

            $id = $notification->data['user']['id'];
            $contact = Contact::whereRaw("receive_user = $current_user->id AND ask_user = $id")
                ->first();
            if($contact == null) {
                Contact::create([
                    'ask_user' => $notification->data['user']['id'],
                    'receive_user' =>  $current_user->id,
                    'accept' => null,
                ]);
            }

        }
        $contacts = Contact::where([$query_receive])->get();
        foreach($contacts as $contact) {
            if($contact->accept == null)  {
                $user = User::where('id','=',$contact['ask_user'])->first();
                array_push($users, $user);
            }
        }

        return  view('notification', ['notifications' => $notifications, 'users'=> $users]);
    }

    public function index()
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $projects = Project::where('user_id', '=',$user->id)->orderBy('created_at')->get();

        return view('profil',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'projects' => $projects]);
    }


    public function view(User $user)
    {
        $create_projects = Project::where('user_id', '=',$user->id)->orderBy('created_at')->get();

//        $member_projects = DB::table('projects')
//            ->join('members', 'projects.id', '=', 'members.project_id')
//            ->select('projects.*')
//            ->get();
//        dd($member_projects);
        $member_projects = array();
        $members = Member::where('user_id','=',$user->id)->get();
        foreach ($members as $m) {
            $proj = Project::where('id','=',$m->project_id)->first();
            array_push($member_projects, $proj);
        }
        return view('view-profil',['user' => $user, 'create_projects' => $create_projects, 'member_projects' => $member_projects]);
    }

    public function create(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->description = $request->input('description');
        $user->departement = $request->input('departement');
        $user->competence = $request->input('competence');
        $user->email = $request->input('email');

        if($request->input('domaine') != "") {
            $domaine = Domaine::find($request->input('domaine'));
            $user->domaine_id = $domaine->id;
        }

        if($request->input('contrat') != "") {
            $contrat = Contrat::find($request->input('contrat'));
            $user->contrat_id = $contrat->id;
        }

        if($request->file() != null) {

            $this->validate($request, [
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
            $request->image_file->move(public_path('images'), $imageName);

            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('profil');
    }

}
