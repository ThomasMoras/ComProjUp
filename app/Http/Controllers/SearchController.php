<?php

namespace projetPhp\Http\Controllers;

use projetPhp\Contrat;
use projetPhp\Domaine;
use Illuminate\Http\Request;
use projetPhp\User;

class SearchController extends Controller
{
    private $user;
    public function index()
    {
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $users =  array();
        return view('search',['domaines' => $domaines, 'contrats' => $contrats, 'users' => $users ]);
    }

    public function create(Request $request)
    {
        $query_do = ['domaine_id', '=',  $request->input('domaine')];
        $query_c = ['contrat_id', '=',  $request->input('contrat')];
        $query_dep = ['departement', '=',  $request->input('departement')];


        if($request->input('departement') == null) {
            $this->user = User::where([$query_do,$query_c])
                ->get();
            if($request->input('domaine') == null && $request->input('contrat') != null) {
                $this->user = User::where([$query_c])
                    ->get();
            }
            if($request->input('domaine') != null && $request->input('contrat') == null) {
                $this->user = User::where([$query_do])
                    ->get();
            }
        }
        else {
            $this->user = User::where([$query_do,$query_c, $query_dep])
                ->get();
            if($request->input('domaine') != null && $request->input('contrat') == null) {
                $this->user = User::where([$query_do,$query_dep])
                    ->get();
            }
            if($request->input('domaine') == null && $request->input('contrat') != null) {
                $this->user = User::where([$query_c,$query_dep])
                    ->get();
            }
            if($request->input('domaine') == null && $request->input('contrat') == null) {
                $this->user = User::where([$query_dep])
                    ->get();
            }
        }
        if($request->input('departement') == null && $request->input('domaine') == null && $request->input('contrat') == null) {
            $this->user = User::all();
        }
        $domaines = Domaine::all();
        $contrats = Contrat::all();
        return view('search',['domaines' => $domaines, 'contrats' => $contrats, 'users' => $this->user ]);
    }
}
