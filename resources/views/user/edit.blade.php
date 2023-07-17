@extends('layouts.app')

@section('title', 'Editar usuario')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" class="form">
            {{ csrf_field() }}
            @component('components.form-errors')
            @endcomponent
            @component('components.message')
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','CPF')
                @slot('name','cpf')
                @slot('required',true)
                @slot('placeholder','Insira o CPF')
                @slot('value',$user->cpf)
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','E-mail')
                @slot('name','email')
                @slot('required',true)
                @slot('placeholder','Insira seu email')
                @slot('value',$user->email)
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','Nome')
                @slot('name','firstname')
                @slot('required',true)
                @slot('placeholder','Nome do contato')
                @slot('value',$user->firstname)
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','Sobrenome')
                @slot('name','lastname')
                @slot('required',true)
                @slot('placeholder','Nome do contato')
                @slot('value',$user->lastname)
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','Data de Nascimento (dd/mm/YYYY)')
                @slot('name','born')
                @slot('required',true)
                @slot('placeholder','Insira a data de nascimento')
                @slot('value',join('/',array_reverse(explode('-',$user->born))))
            @endcomponent
            @component('components.form.input')
                @slot('type','text')
                @slot('label','Gênero')
                @slot('name','genre')
                @slot('required',true)
                @slot('placeholder','Insira o gênero')
                @slot('value',$user->genre)
            @endcomponent
            @component('components.form.area')
                @slot('class','actions')
                @component('components.form.button')
                    @slot('type','submit')
                    @slot('value','Inserir')
                @endcomponent
                @component('components.form.button')
                    @slot('type','reset')
                    @slot('value','Reiniciar')
                @endcomponent

            @endcomponent
        </form>
    </div>
@endsection
