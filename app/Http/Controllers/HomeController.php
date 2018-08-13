<?php

namespace projetPhp\Http\Controllers;

use Illuminate\Http\Request;
use projetPhp\User;
use projetPhp\Domaine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();

        return view('home',['utilisateurs' => $users, 'current_user' => $user, 'domaines' => $domaines]);
    }

    public function filter(Request $request) {
        $user = auth()->user();
//        echo($request->input('domaine'));

        if($request->input('domaine') != null) {
            $query_do = ['domaine_id', '=',  $request->input('domaine')];
            $users = User::where([$query_do])
                ->get();

//            $users = DB::table('users')
//                ->where('domaine_id', '=', $request->input('domaine'))
//                ->get();
//            echo($users);
        }
        else {
            $users = User::orderBy('created_at', 'DESC')->get();
        }

        $domaine = Domaine::where([['id', '=',  $request->input('domaine')]])->get();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
//        $domaines->prepend($domaine.id,$domaine.nom);
        return view('home',['utilisateurs' => $users, 'current_user' => $user, 'domaines' => $domaines, 'domaine' => $domaine]);
    }
}
