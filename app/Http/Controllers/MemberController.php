<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 08/08/2018
 * Time: 15:04
 */

namespace projetPhp\Http\Controllers;

use projetPhp\User;
use projetPhp\Member;
use projetPhp\Contrat;
use projetPhp\Domaine;
use Illuminate\Http\Request;
use projetPhp\Project;
use projetPhp\Notifications\AskPoste;

class MemberController extends Controller
{
    public $proj;
    public $member;

    public function show_poste(Member $member)
    {
        $user = auth()->user();
        $this->member = $member;
        return view('poste_show',['user' => $user, 'member' => $member]);
    }

    public function init(Project $project) {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $member = new Member();
        $this->proj = $project;
        return view('poste',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'member' => $member, 'project'=> $project]);
    }

    public function modify_poste(Member $member)
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $project = new Project();
        return view('poste',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'member' => $member, 'project'=> $project]);
    }


    public function create_poste(Project $project, Request $request) {

        $user = auth()->user();
        $nom = $request->input('nom');
        if($request->input('nom') == null) {
            $nom = "Vide";
        }

//        Member::create([
//            'project_id' => $request->input('project_id'),
//            'nom' =>  $nom,
//            'domaine_id' => $request->input('domaine_id'),
//            'contrat_id' => $request->input('contrat_id'),
//            'competence' => $request->input('competence'),
//            'description' => $request->input('description'),
//        ]);

        $member = new Member();
        $member->nom = $nom;
        $member->project_id = $project['id'];
        $member->domaine_id = $request->input('domaine_id');
        $member->contrat_id = $request->input('contrat_id');
        $member->competence = $request->input('competence');
        $member->description =$request->input('description');
        $member->created_by = $user->id;

        $member->save();

        return redirect()->route('project.modify', $project);
    }

    public function update_poste(Request $request ,Member $member) {
        $project = Project::where('id', '=', $member->project_id)->first();

        $nom = $request->input('nom');
        if($request->input('nom') == null) {
            $nom = "Vide";
        }
        $member->nom = $nom;
        $member->project_id = $project['id'];
        $member->domaine_id = $request->input('domaine_id');
        $member->contrat_id = $request->input('contrat_id');
        $member->competence = $request->input('competence');
        $member->description =$request->input('description');

        $member->save();

        return redirect()->route('project.modify', $project);
    }
}

