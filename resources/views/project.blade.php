@extends('layouts.app')

@section('content')

    <div class="row">

        <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('project_create') !!}" accept-charset="UTF-8" style="width: 70%; margin-left: 15%">
            {!! csrf_field() !!}
            <fieldset>

                <!-- Form Name -->
                <legend style="text-align: center; font-size: 165%; font-weight: bold;">Création de projet</legend>
                @if($my_proj != null)
                    <!-- Text input-->
                        @if($my_proj->image != null)
                            <img src="/images/{{ $my_proj->image }}" style="max-width: 400px; max-height: 200px">
                        @endif

                        <div class="row" style="margin-top: 3%;margin-left: 3%">

                            <div class="col-sm-4">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="textinput">Intitulé</label>
                                    <div class="col-sm-10">
                                        <input name="titre" type="text" class="form-control" id="name" value="{{$my_proj->titre}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4"  style="margin-left: 5%">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="textinput">Domaine</label>
                                    <div class="col-sm-10">
                                        <select name="domaine_id" id="domaine_id" class="form-control">
                                            @if($domaines->count() > 0)
                                                @if($my_proj->domaine != null)
                                                    <option selected value="{{$my_proj->domaine->id}}">{{$my_proj->domaine->nom}}</option>
                                                @else
                                                    <option selected value="">Vide</option>
                                                @endif
                                                @foreach ($domaines as $domaine)
                                                    @if($my_proj->domaine != null)
                                                        @if($domaine->id != $my_proj->domaine->id)
                                                            <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                                                        @endif
                                                    @endif
                                                    @if($my_proj->domaine == null)
                                                        <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4" style="margin-left: 5%">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name ="professionnel" id="professionnel">
                                    <label class="form-check-label" for="professionnel">Projet professionel</label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group" style="margin-top: 2%">
                            <label class="col-sm-2 align-center" for="textinput">Description</label>
                            <div class="row col-sm-12" style="margin-left: 1%; margin-right: 1%;">
                                <textarea rows="5" name="description" type="text" class="form-control" id="description" value="{{$my_proj->description}}">{{$my_proj->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 2%">
                            <label class="col-sm-2 align-center" for="textinput">Objectif</label>
                            <div class="row col-sm-12" style="margin-left: 1%; margin-right: 1%">
                                <textarea rows="5" name="objectif" type="text" class="form-control" id="objectif" value="{{$my_proj->objectif}}">{{$my_proj->objectif}}</textarea>
                            </div>
                        </div>


                        <div class="form-group" style="margin-top: 2%">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="image_file">Image</label>
                                <input class="col-sm-10" type="file" name="image_file" id="image_file">
                            </div>
                        </div>

                    @endif



                {{--<div class="col-6" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-4 control-label" for="textinput">Prénom</label>--}}
                {{--<div class="col-8">--}}
                {{--<input name="prenom" type="text" class="form-control" id="prenom" value="{{$utilisateur->prenom}}">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row">--}}
                {{--<div class="col-6" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-4 control-label" for="textinput">Département</label>--}}
                {{--<div class="col-8">--}}
                {{--<input name="departement" type="text" class="form-control" id="departement" value="{{$utilisateur->departement}}">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-6" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-4 control-label" for="textinput">Domaine</label>--}}
                {{--<div class="col-8">--}}
                {{--<select name="domaine" id="domaine" class="form-control">--}}
                {{--@if($domaines->count() > 0)--}}
                {{--@if($utilisateur->domaine != null)--}}
                {{--<option selected value="{{$utilisateur->domaine->id}}">{{$utilisateur->domaine->nom}}</option>--}}
                {{--@else--}}
                {{--<option selected value="">Vide</option>--}}
                {{--@endif--}}
                {{--@foreach ($domaines as $domaine)--}}
                {{--@if($utilisateur->domaine != null)--}}
                {{--@if($domaine->id != $utilisateur->domaine->id)--}}
                {{--<option value ="{{$domaine->id}}">{{$domaine->nom}}</option>--}}
                {{--@endif--}}
                {{--@endif--}}
                {{--@if($utilisateur->domaine == null)--}}
                {{--<option value ="{{$domaine->id}}">{{$domaine->nom}}</option>--}}
                {{--@endif--}}
                {{--@endforeach--}}
                {{--@endif--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row">--}}
                {{--<div class="col-5" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-5 control-label" for="textinput">Contrat</label>--}}
                {{--<div class="col-7">--}}
                {{--<select name="contrat" id="contrat" class="form-control">--}}
                {{--@if($contrats->count() > 0)--}}
                {{--@if($utilisateur->contrat != null)--}}
                {{--<option selected value="{{$utilisateur->contrat->id}}">{{$utilisateur->contrat->nom}}</option>--}}
                {{--@else--}}
                {{--<option selected value="">Vide</option>--}}
                {{--@endif--}}
                {{--@foreach ($contrats as $contrat)--}}
                {{--@if($utilisateur->contrat != null)--}}
                {{--@if($contrat->id != $utilisateur->contrat->id)--}}
                {{--<option value ="{{$contrat->id}}">{{$contrat->nom}}</option>--}}
                {{--@endif--}}
                {{--@endif--}}
                {{--@if($utilisateur->contrat == null)--}}
                {{--<option value ="{{$contrat->id}}">{{$contrat->nom}}</option>--}}
                {{--@endif--}}
                {{--@endforeach--}}
                {{--@endif--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-7" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-2 control-label" for="textinput">Email</label>--}}
                {{--<div class="col-10">--}}
                {{--<input name="email" type="email" class="form-control" id="email" value="{{$utilisateur->email}}">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                {{--<div class="form-group" style="margin-top: 2%">--}}
                {{--<div class="row">--}}
                {{--<label class="col-2 control-label" for="textinput">Compétence</label>--}}
                {{--<div class="col-10">--}}
                {{--<input type="text" name="competence" placeholder="Java, C++, Php" class="form-control" id="competence" value="{{$utilisateur->competence}}">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}




                <div class="form-group" style="margin-top: 2%">
                    <div class="col-offset-2 col-10">
                        <div class="align-center">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>

            </fieldset>

        </form>

    </div><!-- /.col-lg-12 -->

    </div><!-- /.row -->
@endsection
