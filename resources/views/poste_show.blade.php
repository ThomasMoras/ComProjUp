@extends('layouts.app')

@section('content')

    <div class="container box">

        <div class="row">
            <h2>{{$member->nom}}</h2>
        </div>
        <div class="row">
            <h3>{{$member->domaine->nom}}</h3>
        </div>

        <div class="row" style="margin-top: 2%">
            <div class="off-2 col-3">
                <h3>Description</h3>
            </div>
            <div class="off-3 col-3">
                <h3>Compétences</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <p> {{$member->description}}</p>
            </div>

            <div class="col-6">
                <p> {{$member->competence}}</p>
            </div>
        </div>
        @if(Auth::user()->id != $member->created_by)
        <div class="align-center" style="margin-top: 2%">
            <button onclick="location.href='{{ url('poste/askPoste', $member) }}'" >
                Postuler</button>
        </div>
        @endif
    </div>

@endsection
