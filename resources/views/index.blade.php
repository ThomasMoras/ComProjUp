@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                @foreach($users as $user)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="card bg-light text-dark">
                            <div class="card-body"  style="border-style:solid; border-width: 1px;padding: 5%; margin-top: 10%">
                                <h5 class="card-title" style="border-style:solid; border-width: 0px 0px 1px 0px;padding: 2px;">{{ $user->name }}</h5>
                                @if($user->image != null)
                                <img src="/images/{{$user->image }}" style="max-width: 200px; max-height: 200px;border-style:solid"><br>
                                @else
                                    Aucune image pour le moment<br>
                                @endif
                                <a href="{{ route('conversations.show', $user->id) }}" class="card-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
         @endforeach
    </div>
@endsection
