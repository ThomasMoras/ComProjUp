<?php

namespace projetPhp\Http\Controllers;

use Carbon\Carbon;
use projetPhp\Contrat;
use projetPhp\Domaine;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $domaines = Domaine::orderBy('nom', 'ASC')->get();
        $contrats = Contrat::orderBy('nom', 'ASC')->get();

        return view('profil',['utilisateur' => $user, 'domaines' => $domaines, 'contrats' => $contrats]);
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
