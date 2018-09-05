@extends('layouts.app')

@section('content')
    <div class="container">

        <div>

            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{!! url('home') !!}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                {{--<label class="col-4 control-label" for="textinput">Domaine</label>--}}

                <div class="row">
                    <div class="col-sm-4" style="margin-left: 16.5%">
                        <legend style="font-size: 25px">Filtre utilisateur</legend>
                    </div>
                    <div class="col-sm-4">
                        <select name="domaine" id="domaine" class="form-control">
                            <option value ="">Aucun critère</option>
                            @foreach ($domaines as $domaine)
                                <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Envoie</button>
                    </div>
                </div>


            </form>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($utilisateurs as $user)
                    @if($user->id != $current_user->id)
                        <article class="post">
                            <header>
                                <div class="title">
                                    <h2>{{$user->name}} {{$user->prenom}}</h2>
                                    @if($user->domaine != null)
                                        <h3>{{$user->domaine->nom}}</h3>
                                    @endif
                                    @if($user->competence != null)
                                        <p>{{$user->competence}}</p>
                                    @endif
                                </div>
                                <div class="meta">
                                    @if($current_user->image != null)
                                        <img src="images/{{$user->image}}" alt="" style="height: 100%;width: 100%"/>
                                    @endif
                                </div>
                            </header>
                            @if($current_user->description != null)
                                <p>{{$user->description}} </p>
                            @endif
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('sidebar')
    <section id="sidebar">
        <!-- Intro -->
        <section id="intro">
            <header>
                <h2>{{$current_user->name }}   {{$current_user->prenom}}</h2>
                @if($current_user->domaine != null)
                    <h3>{{$current_user->domaine->nom}}</h3>
                @endif
                @if($current_user->competence != null)
                    <p>{{$current_user->competence}}</p>
                @endif
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">
                <!-- Mini Post -->
                <article class="mini-post">
                    @if($current_user->image != null)
                        <img src="images/{{$current_user->image}}" alt="" style="max-height: 300px;max-width: 350px"/>
                    @endif
                </article>
            </div>


            <!-- About -->
            <section class="blurb">
                <h2>Description</h2>
                @if($current_user->description != null)
                    <p>{{$current_user->description}}</p>
                @endif
                <h2>Contrat</h2>
                @if($current_user->contrat != null)
                    <p>{{$current_user->contrat->nom}}</p>
                @endif
                <h2>Inscrit le</h2>
                <p>{{$current_user->created_at}}</p>
                <ul class="actions">
                    @if($current_user->contrat != null)
                        <li><a href="#" class="button">Learn More</a></li>
                    @endif
                </ul>
            </section>

            <!-- Footer -->
            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                    <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
            </section>
        </section>
    </section>
@endsection

@section('sideform')
    <section id="sideform">

        <div class="row" style="padding-left: 15%">
            <legend style="text-align: center; font-size: 25px">Filtre utilisateur</legend>
            <form class="form-horizontal col-12" role="form" enctype="multipart/form-data" method="POST" action="{!! url('filter') !!}" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <fieldset>
                    {{--<label class="col-4 control-label" for="textinput">Domaine</label>--}}
                    <div class="col-8">
                        <select name="domaine" id="domaine" class="form-control">
                            @foreach ($domaines as $domaine)
                                <option value ="{{$domaine->id}}">{{$domaine->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
                <div class="form-group" style="margin-top: 2%">
                    <div class="col-offset-2 col-10">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Envoie</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

