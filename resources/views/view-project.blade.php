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

    </div>

    {{--<div class="row pull-right">--}}
        {{--<button class="btn-primary">Toto </button>--}}
    {{--</div>--}}

    {{--<br>--}}

    </div>

    <div class="box">
        <div class="row">
            <h2>
                Equipe
            </h2>
        </div>

        <div class="row">
            <h2>
                Place disponible
            </h2>
        </div>
    </div>

@endsection
