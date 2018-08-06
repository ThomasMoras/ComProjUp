@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-3">
                <div class="list-group">
                    @foreach($users as $user)
                        <a class="list-group-item d-flex justify-content-between align-items-center" href="{{ route('conversations.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    @endforeach
                </div>
            </div>



            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ $user_destination->name }}</div>
                    <div class="card-body conversations">
                        @foreach($messages as $message)
                            <div class="row">
                                <div class="col-md-10 {{ $message->from->id !== Auth::user()->id  ? 'offset-md-2 text-right' : '' }}">
                                    <p>
                                        <strong>{{ $message->from->id === Auth::user()->id  ? 'Moi' : $message->from->name }}</strong><br>
                                        {!! nl2br(e($message->content)) !!}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="content" placeholder="Ecrivez votre message" class="form-control" required></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
