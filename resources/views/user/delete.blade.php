@extends('layouts.app')

@section('title', 'Excluir usuario')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" class="form">
            {{ csrf_field() }}
            <div>
                Tem certeza que deseja excluir o usuário <strong>{{$name}}</strong>
            </div>

            @component('components.form.area')
                @slot('class','actions')
                @component('components.form.button')
                    @slot('type','submit')
                    @slot('value','Excluir')
                @endcomponent


            @endcomponent
        </form>
    </div>
@endsection
