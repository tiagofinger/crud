@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Criar Item</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['route' => ['item.store']]) }}
        {{ Form::hidden('_method', 'POST') }}
        <div class="form-group">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome']) }}
        </div>
        <div class="form-group">
            {{ Form::textArea('description', null, ['class' => 'form-control', 'placeholder' => 'Digite a descrição']) }}
        </div>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <a href="{{ Url('/') }}" class="btn btn-primary">Voltar</a>
            {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop