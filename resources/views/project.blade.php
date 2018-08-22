@extends('layouts.app')

@section('content')

    <div class="row">

        @if($my_proj == null)
            <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('project/create') !!}" accept-charset="UTF-8" style="width: 70%; margin-left: 15%">
                @else
                    <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('project/update',$my_proj) !!}" accept-charset="UTF-8" style="width: 70%; margin-left: 15%">
                        @endif
                        {!! csrf_field() !!}
                        <fieldset>

                            <!-- Form Name -->
                            @if($my_proj == null)
                                <legend style="text-align: center; font-size: 165%; font-weight: bold;">Création de projet</legend>
                            @else
                                <legend style="text-align: center; font-size: 165%; font-weight: bold;">Modification du projet</legend>
                            @endif
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
                                        <input type="checkbox" class="form-check-input" name ="professionnel" id="professionnel" value="{{$my_proj->professionnel}}" {{$my_proj->professionnel ? ' checked="checked"' : '' }}>
                                        {{--<input type="checkbox" name="professionnel" value="{{$my_proj->professionne}}" {{$my_proj->professionnel ? ' checked="checked"' : '' }}>--}}

                                        <label class="form-check-label" for="professionnel">Projet professionel</label>
                                    </div>
                                </div>
                                {{$my_proj->professionnel}}
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
