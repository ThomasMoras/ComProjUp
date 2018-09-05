@extends('layouts.app')

@section('content')

    <div class="row">
        <form class="form-horizontal col-sm-8 box" role="form" method="POST" action="{!! url('search-project') !!}" accept-charset="UTF-8" style="margin-left: 27%; width: 50%">
            {!! csrf_field() !!}
            <fieldset>

                <legend style="text-align: center; font-size: 25px; font-weight: bold;">Recherche de projets</legend>

                <div class="row" style="margin-top: 5%">
                    {{--<div class="col-6" style="margin-top: 2%">--}}
                        {{--<div class="row">--}}
                            {{--<label class="col-4 control-label" for="textinput">Département</label>--}}
                            {{--<div class="col-8">--}}
                                {{--<input name="departement" type="text" class="form-control" id="departement" placeholder="69">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

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

                    {{--<div class="col-sm-4" style="margin-left: 3%">--}}
                        {{--<div class="row">--}}
                            {{--<div class="form-check">--}}
                                {{--<input type="checkbox" class="form-check-input" name ="professionnel" id="professionnel"--}}
                                        {{--{{ $my_proj->professionnel == 1  ? 'checked' : '' }}>--}}
                                {{--<label class="form-check-label" for="professionnel">Projet professionel</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
    @if($projects != null)
        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Professionnel</th>
                    <th scope="col">Détail</th>
                </tr>
                </thead>
                <tbody>
                @if($projects->count() > 0)
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->titre}}</td>
                            @if($project->domaine != null)
                                <td>{{$project->domaine->nom}}</td>
                            @endif
                            {{--<td>{{$user->$professionnel}}</td>--}}
                            @if($project->professionnel)
                                <td>
                                    <ul class="icons">
                                        <li><a href="#" class="fa-check"><span class="label">Valider</span></a></li>
                                    </ul>
                                </td>
                            @else
                                <td>
                                    <ul class="icons">
                                        <li><a href="#" class="fa-times"><span class="label">Refuser</span></a></li>
                                    </ul>
                                </td>
                            @endif
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
        </div>
        @endif
        </div><!-- /.row -->



@endsection
