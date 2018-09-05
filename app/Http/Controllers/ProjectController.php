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
use projetPhp\Member;
use projetPhp\Project;
use Illuminate\Http\Request;
use projetPhp\User;

class ProjectController extends Controller
{
    public function init()
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $my_proj = new Project();

        return view('project',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'my_proj' => $my_proj]);
    }

    public function view(Project $project)
    {
        $user = User::where('id','=',$project->user_id);
        $libres = Member::whereRaw("project_id = $project->id AND user_id is null")->distinct('user_id')->get();
        $membres = Member::whereRaw("project_id = $project->id AND user_id is not null")->distinct('user_id')->get();
        return view('view-project',['user' => $user, 'project' => $project, 'libres' => $libres, 'membres' => $membres]);
    }

    public function modify(Project $project)
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();
        $libres = Member::whereRaw("project_id = $project->id AND user_id is null")->get();
        $membres = Member::whereRaw("project_id = $project->id AND user_id is not null")->get();
        return view('project',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats, 'my_proj' => $project, 'libres' => $libres, 'membres' => $membres]);
    }

    public function update(Request $request, Project $project)
    {
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

        if($request->file() != null) {

            $this->validate($request, [
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
            $request->image_file->move(public_path('images'), $imageName);

            $project->image = $imageName;
        }

        $project->save();

        return redirect()->route('profil');
    }

    public function create(Request $request)
    {
        $user = auth()->user();

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

        return redirect()->route('profil');
    }
}

