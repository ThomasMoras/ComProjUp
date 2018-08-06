@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-3"> </div>
        <form class="form-horizontal col-6 box" role="form" method="POST" action="{!! url('search') !!}" accept-charset="UTF-8">
            {!! csrf_field() !!}
            <fieldset>

                <legend style="text-align: center; font-size: 25px">Recherche</legend>

                <div class="row">
                    <div class="col-6" style="margin-top: 2%">
                        <div class="row">
                            <label class="col-4 control-label" for="textinput">Département</label>
                            <div class="col-8">
                                <input name="departement" type="text" class="form-control" id="departement" placeholder="69">
                            </div>
                        </div>
                    </div>

                    <div class="col-6" style="margin-top: 2%">
                        <div class="row">
                            <label class="col-4 control-label" for="textinput">Domaine</label>
                            <div class="col-8">
                                <select name="domaine" id="domaine" class="form-control">
                                    <option value ="">Aucun critère</option>
                                    @if($domaines->count() > 0)
                                        @foreach ($domaines as $domaine)
                                            <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top: 2%">
                    <label class="col-2 control-label" for="textinput">Contrat</label>
                    <div class="col-10">
                        <select name="contrat" id="contrat" class="form-control">
                            <option value ="">Aucun critère</option>
                            @if($contrats->count() > 0)
                                @foreach ($contrats as $contrat)
                                    <option value ="{{$contrat->id}}">{{$contrat->nom}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 2%">
                    <div class="col-offset-2 col-10">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Envoie</button>
                        </div>
                    </div>
                </div>

            </fieldset>

        </form>
    </div><!-- /.col-lg-12 -->
    @if($users != null)
        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Compétences</th>
                    <th scope="col">Contrat</th>
                    <th scope="col">Département</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->prenom}}</td>
                            @if($user->domaine != null)
                                <td>{{$user->domaine->nom}}</td>
                            @else
                                <td>Abscence de valeur</td>
                            @endif
                            <td>{{$user->competence}}</td>
                            @if($user->contrat != null)
                                <td>{{$user->contrat->nom}}</td>
                            @else
                                <td>Abscence de valeur</td>
                            @endif
                            <td>{{$user->departement}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        @endif
        </div><!-- /.row -->



@endsection
