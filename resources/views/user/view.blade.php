@extends('layouts.app')

@section('title', 'Listar usuários')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div>Primeiro nome: <strong>{{$user->firstname}}</strong></div>
        <div>Sobrenome: <strong>{{$user->lastname}}</strong></div>
        <div>Email: <strong>{{$user->email}}</strong></div>
        <div>CPF: <strong>{{$user->cpf}}</strong></div>
        <div>Nascimento: <strong>{{join('/',array_reverse(explode('-',$user->born)))}}</strong></div>
        <div>Genero: <strong>{{$user->genre}}</strong></div>
        <a href="/">Listar todos</a> - <a href="/usuarios/editar/{{$user->id}}">editar</a>
    </div>
@endsection

