@extends('layouts.app')

@section('title', 'Listar usuários')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        @if(Session::has('alert-text'))
            <div class="alert">
                {!! Session::get('alert-text') !!}
            </div>
        @endif


        @if(count($users))
            @foreach($users as $user)
                <br />
                <div class="user">
                    {{$user->name}}<br />
                    {{$user->email}}
                    <a href="/usuario/{{$user->id}}">Ver</a>
                    <a href="/usuarios/editar/{{$user->id}}">Editar</a>
                    <a href="/usuarios/excluir/{{$user->id}}">Excluir</a>
                </div>


            @endforeach
        @else
            <div class="empty">
                Nenhum usuário cadastrado
            </div>
        @endif
    </div>
@endsection
