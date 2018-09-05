@extends('layouts.app')

@section('content')
    <h1 class="align-center"> Mes demandes de membre </h1>
        {{--{{$notification['notifiable_id']}}--}}
        {{--{{$notification['data']['asking_user'] }}--}}
        {{--{{$notification->data['asking_user']['name']}}--}}
        <table class="table table-striped" style="margin-top: 5%">
            <thead>
            <tr>
                <th class="align-center" scope="col">Nom</th>
                <th class="align-center" scope="col">Prénom</th>
                <th class="align-center" scope="col">Domaine</th>
                <th class="align-center" scope="col">Profil</th>
                <th class="align-center" scope="col">Projet</th>
                <th class="align-center" scope="col">Poste</th>
                <th class="align-center" scope="col">Accepter</th>
                <th class="align-center" scope="col">Supprimer</th>
            </tr>
            </thead>
            <tbody>

            @if(count($users) > 0)
                @foreach ($users as $user)
                    @if($user != null)
                    <tr class="align-center">
                        <td>{{$user->ask->name}}</td>
                        <td>{{$user->ask->prenom}}</td>
                        <td>{{$user->ask->domaine->nom}}</td>
                        <td>
                            <ul class="icons">
                                <li><a href="{{ route('profil.view', $user->ask) }}" class="fa-eye"><span class="label">Profil</span></a></li>
                            </ul>
                        </td>
                        <td>
                            <ul class="icons">
                                <li><a href="{{ route('project.view', $user->poste->project) }}" class="fa-eye"><span class="label">Projet</span></a></li>
                            </ul>
                        </td>
                        <td>
                            <ul class="icons">
                                <li><a href="{{ route('show_poste', $user->poste) }}" class="fa-eye"><span class="label">Poste</span></a></li>
                            </ul>
                        </td>
                        <td>
                            <ul class="icons">
                                <li><a href="{{ route('poste/response/1',$user) }}" class="fa-check"><span class="label">Valider</span></a></li>
                            </ul>
                        </td>
                        <td>
                            <ul class="icons">
                                <li><a href="{{ route('poste/response/0',$user) }}" class="fa-times"><span class="label">Refuser</span></a></li>
                            </ul>
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>

@endsection
