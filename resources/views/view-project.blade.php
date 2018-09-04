@extends('layouts.app')

{{--@section('sidebar')--}}
{{--<button>Envoyer une demande de contact </button>--}}
{{--@endsection--}}

@section('content')

    <div class="box">


        <div class="row">
            <h2>{{$project->titre}} </h2>
        </div>


        <div class="row">
            <h3>{{$project->domaine->nom}}</h3>
        </div>

        @if($project->image != null)
            <img src="/images/{{ $project->image }}" style="max-width: 400px; max-height: 200px">
        @endif


        <div class="row" style="margin-top: 2%">
            <div class="off-2 col-3">
                <h3>Description</h3>
            </div>
            <div class="off-3 col-3">
                <h3>Objectif</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <p> {{$project->description}}</p>
            </div>

            <div class="col-6">
                <p> {{$project->objectif}}</p>
            </div>
        </div>

        {{--<div class="align-center">--}}
            {{--<button> Postuler </button>--}}
        {{--</div>--}}
    </div>

    </div>

    <div class="box">
        <div class="row">
            <h2>
                Equipe
            </h2>
            @if($membres != null && $membres->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Domaine</th>
                        <th scope="col">Détail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($membres as $membre)
                        <tr>
                            <td>{{$membre->user->name}}</td>
                            <td>{{$membre->user->domaine->nom}}</td>
                            <td>
                                <ul class="icons">
                                    <li><a href="{{ route('profil.view', $membre->user) }}" class="fa-eye"><span class="label">Utilisateur</span></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="row">
            <h2>
                Place disponible
            </h2>
            @if($libres->count() > 0 && $libres != null)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Domaine</th>
                        <th scope="col">Détail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($libres as $member)
                        <tr>
                            <td>{{$member->nom}}</td>
                            <td>{{$member->domaine->nom}}</td>
                            <td>
                                <ul class="icons">
                                    <li><a href="{{ route('show_poste', $member) }}" class="fa-eye"><span class="label">Poste</span></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
