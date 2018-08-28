@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row">

            @if($my_proj == null)
                <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('project/create') !!}" accept-charset="UTF-8" style="width: 95%; margin-left: 5%">
                    @else
                        <form class="form-horizontal col-sm-12 box" role="form" enctype="multipart/form-data" method="POST" action="{!! url('project/update',$my_proj) !!}" accept-charset="UTF-8" style="width: 95%; margin-left: 5%">
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
                                <div class="align-center" style="margin-top: 2%">
                                    @if($my_proj->image != null)
                                        <img src="/images/{{ $my_proj->image }}" style="max-width: 400px; max-height: 200px">
                                    @endif
                                </div>


                                <div class="row" style="margin-top: 3%;margin-left: 3%">

                                    <div class="col-sm-4">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="textinput">Intitulé</label>
                                            <div class="col-sm-10">
                                                <input name="titre" type="text" class="form-control" id="name" value="{{$my_proj->titre}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4"  style="margin-left: 3%">
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
                                    <div class="col-sm-4" style="margin-left: 3%">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name ="professionnel" id="professionnel"
                                                    {{ $my_proj->professionnel == 1  ? 'checked' : '' }}>
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

                                {{--<div>--}}
                                    {{--<h2>Gestion des membres</h2>--}}
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
                </form>
        </div><!-- /.col-lg-12 -->

    </div><!-- /.row -->

@endsection

@section('team')
    <section id="team">
        <div class="box">
            <header>
                <h2 class="align-center">Gestion membres</h2>
            </header>
            <div class="align-center ">

                <!-- Button HTML (to Trigger Modal) -->
                {{--<a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Launch Demo Modal</a>--}}
            <!-- Button trigger modal -->
                {{--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">--}}
                    {{--Launch demo modal--}}
                {{--</button>--}}
                <button
                        type="button"
                        class="btn btn-primary btn-lg"
                        data-toggle="modal"
                        data-target="#favoritesModal">
                    Add to Favorites
                </button>
            </div>
        </div>

    </section>

    <div class="modal fade" id="favoritesModal"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">The Sun Also Rises</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Please confirm you would like to add
                        <b><span id="fav-title">The Sun Also Rises</span></b>
                        to your favorites list.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span>
                </div>
            </div>
        </div>
    </div>

    {{--<!-- Modal -->--}}
    {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--...--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection


