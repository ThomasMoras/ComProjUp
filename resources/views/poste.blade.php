@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            @if($member->id == null)
                <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! route('create_poste',$project) !!}" accept-charset="UTF-8" style="width: 95%; margin-left: 5%">
                    @else
                        <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('update_poste',$member) !!}" accept-charset="UTF-8" style="width: 95%; margin-left: 5%">
                            @endif
                            {!! csrf_field() !!}
                            <fieldset>

                                <!-- Form Name -->
                                @if($member->id == null)
                                    <legend style="text-align: center; font-size: 165%; font-weight: bold;">Création de poste</legend>
                                @else
                                    <legend style="text-align: center; font-size: 165%; font-weight: bold;">Modification de poste</legend>
                                @endif

                                <div class="row" style="margin-top: 3%;margin-left: 3%">

                                    <div class="col-sm-4">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="textinput">Intitulé</label>
                                            <div class="col-sm-10">
                                                <input name="nom" type="text" class="form-control" id="nom" value="{{$member->nom}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4"  style="margin-left: 3%">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="textinput">Domaine</label>
                                            <div class="col-sm-10">
                                                <select name="domaine_id" id="domaine_id" class="form-control">
                                                    @if($domaines->count() > 0)
                                                        @if($member->domaine != null)
                                                            <option selected value="{{$member->domaine->id}}">{{$member->domaine->nom}}</option>
                                                        @else
                                                            <option selected value="">Vide</option>
                                                        @endif
                                                        @foreach ($domaines as $domaine)
                                                            @if($member->domaine != null)
                                                                @if($domaine->id != $member->domaine->id)
                                                                    <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                                                                @endif
                                                            @endif
                                                            @if($member->domaine == null)
                                                                <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4"  style="margin-left: 3%">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="textinput">Contrat</label>
                                            <div class="col-sm-10">
                                                <select name="contrat_id" id="contrat_id" class="form-control">
                                                    @if($contrats->count() > 0)
                                                        @if($member->contrat != null)
                                                            <option selected value="{{$member->contrat->id}}">{{$member->contrat->nom}}</option>
                                                        @else
                                                            <option selected value="">Vide</option>
                                                        @endif
                                                        @foreach ($contrats as $contrat)
                                                            @if($member->contrat != null)
                                                                @if($contrat->id != $member->contrat->id)
                                                                    <option value ="{{$contrat->id}}">{{$contrat->nom}}</option>
                                                                @endif
                                                            @endif
                                                            @if($member->contrat == null)
                                                                <option value ="{{$contrat->id}}">{{$contrat->nom}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="textinput">Compétences</label>
                                            <div class="col-sm-10">
                                                <input name="competence" type="text" class="form-control" id="competence" value="{{$member->competence}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 2%">
                                    <label class="col-sm-2 align-center" for="textinput">Description</label>
                                    <div class="row col-sm-12" style="margin-left: 1%; margin-right: 1%;">
                                        <textarea rows="5" name="description" type="text" class="form-control" id="description" value="{{$member->description}}">{{$member->description}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group" style="margin-top: 2%">
                                    <div class="col-offset-2 col-10">
                                        <div class="align-center">
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                </form>
        </div>
    </div>

@endsection
