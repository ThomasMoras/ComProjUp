@extends('layouts.app')

{{--@section('sidebar')--}}
{{--<button>Envoyer une demande de contact </button>--}}
{{--@endsection--}}

@section('content')

    <div class="box">
        @if($user->image != null)
            <img src="/images/{{ $user->image }}" style="max-width: 400px; max-height: 200px">
        @endif

        <div class="row">
            <h2>{{$user->name}} {{$user->prenom}}</h2>
        </div>

        <div class="row">
            <h3>Domaine : {{$user->domaine->nom}}</h3>
        </div>

        <div class="row">
            <h3>Compétences : {{$user->competence}}</h3>
        </div>

        <div class="row">
            <h3>Département {{$user->departement}}</h3>
        </div>

        <div class="row">
            <p> {{$user->description}}</p>
        </div>

        <div class="row pull-right">
            <button class="btn-primary">Demande de contact </button>
        </div>

        <br>

    </div>

    <div class="box">

        <div class="row">
            <h2> Projets </h2>
        </div>

        <div class="row">
            <h3> Crée </h3>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Détail</th>

                </tr>
                </thead>
                <tbody>
                @if($create_projects->count() > 0)
                    @foreach($create_projects as $project)
                        <tr>
                            <td>{{$project->titre}}</td>
                            <td>{{$project->domaine->nom}}</td>
                            <td> </td>

                            <td>
                                <ul class="icons">
                                    <li><a href="{{ route('project.view', $project) }}" class="fa-eye"><span class="label">Projet</span></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{--@foreach($create_projects as $project)--}}
            {{--<div class="row">--}}
            {{--{{$project->titre}}--}}
            {{--</div>--}}
            {{--@endforeach--}}
        </div>

        <div class="row">
            <h3> Membre </h3>
        </div>
    </div>
@endsection
