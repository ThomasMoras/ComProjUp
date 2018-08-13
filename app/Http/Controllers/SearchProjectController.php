<?php

namespace projetPhp\Http\Controllers;

use projetPhp\Contrat;
use projetPhp\Domaine;
use Illuminate\Http\Request;
use projetPhp\User;

class SearchProjectController extends Controller
{
    private $user;
    public function index()
    {
        return view('search-project');
    }

}
