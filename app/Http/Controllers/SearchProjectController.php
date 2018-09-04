<?php

namespace projetPhp\Http\Controllers;

use projetPhp\Domaine;
use projetPhp\Project;
use Illuminate\Http\Request;
use projetPhp\User;

class SearchProjectController extends Controller
{
    public function index() {
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $projects =  array();
        return view('search-project',['domaines' => $domaines, 'projects' => $projects]);
    }

    public function create(Request $request)
    {
        $auth = auth()->user();
        $query_do = ['domaine_id', '=',  $request->input('domaine')];
//        $query_dep = ['departement', '=',  $request->input('departement')];

        $projects = array();
        if($request->input('domaine') !=null) {
            $projects = Project::whereRaw("domaine_id = $request->input('domaine')")->get();
        }
        if($request->input('domaine') == null) {
            $projects = Project::all();
        }
        $domaines = Domaine::all();


        return view('search-project',['domaines' => $domaines,  'projects' => $projects]);
    }
}
