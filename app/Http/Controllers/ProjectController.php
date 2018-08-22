<?php
/**
 * Created by PhpStorm.
 * User: moras
 * Date: 08/08/2018
 * Time: 15:04
 */

namespace projetPhp\Http\Controllers;

use projetPhp\Contrat;
use projetPhp\Domaine;
use projetPhp\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $user;
    public function init()
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $my_proj = new Project();

        return view('project',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'my_proj' => $my_proj]);
    }

    public function modify(Project $project)
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        return view('project',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'my_proj' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        dd($request);

        $project->titre =$request->input('titre');
        $project->description =$request->input('description');
        $project->objectif =$request->input('objectif');
        $project->domaine_id =$request->input('domaine_id');

        if($request->input('professionnel') === 'on' || $request->input('professionnel') === 1)
            $bool = true;
        else {
            $bool = false;
        }
        $project->professionnel = $bool;

//        dd($project);
        $project->save();

        return redirect()->route('profil');

//        $user->name = $request->input('name');
//        $user->prenom = $request->input('prenom');
//        $user->description = $request->input('description');
//        $user->departement = $request->input('departement');
//        $user->competence = $request->input('competence');
//        $user->email = $request->input('email');
//
//        if($request->input('domaine') != "") {
//            $domaine = Domaine::find($request->input('domaine'));
//            $user->domaine_id = $domaine->id;
//        }
//
//        if($request->input('contrat') != "") {
//            $contrat = Contrat::find($request->input('contrat'));
//            $user->contrat_id = $contrat->id;
//        }
//
//        if($request->file() != null) {
//
//            $this->validate($request, [
//                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif',
//            ]);
//
//            $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
//            $request->image_file->move(public_path('images'), $imageName);
//
//            $user->image = $imageName;
//        }
//
//        $user->save();
//
//        return redirect()->route('profil');
    }

    public function create(Request $request)
    {
        $user = auth()->user();
//        $domaines = Domaine::orderBy('nom', 'ASC')->get();
//        $contrats = Contrat::orderBy('nom', 'ASC')->get();

//        $proj = Project::where('nom', 'ASC')->get();
//        dd($request);

        if($request->input('professionnel') === 'on')
            $bool = true;
        else {
            $bool = false;
        }

        Project::create([
            'titre' => $request->input('titre'),
            'objectif' =>  $request->input('objectif'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'domaine_id' => $request->input('domaine_id'),
            'professionnel' => $bool,
            'dure' => 0,
            'nb_personne' => 0,
            'user_id' => $user->id
        ]);

//        dd($request);

//        $user = auth()->user();
//
//        $user->name = $request->input('name');
//        $user->prenom = $request->input('prenom');
//        $user->description = $request->input('description');
//        $user->departement = $request->input('departement');
//        $user->competence = $request->input('competence');
//        $user->email = $request->input('email');
//
//        if($request->input('domaine') != "") {
//            $domaine = Domaine::find($request->input('domaine'));
//            $user->domaine_id = $domaine->id;
//        }
//
//        if($request->input('contrat') != "") {
//            $contrat = Contrat::find($request->input('contrat'));
//            $user->contrat_id = $contrat->id;
//        }
//
//        if($request->file() != null) {
//
//            $this->validate($request, [
//                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif',
//            ]);
//
//            $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
//            $request->image_file->move(public_path('images'), $imageName);
//
//            $user->image = $imageName;
//        }
//
//        $user->save();

        return redirect()->route('profil');
    }
}

