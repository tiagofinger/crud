@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Editar Item</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['route' => ['item.update', $item->id]]) }}
        {{ Form::hidden('_method', 'PATCH') }}
        <div class="form-group">
            {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Digite o nome']) }}
        </div>
        <div class="form-group">
            {{ Form::textArea('description', $item->description, ['class' => 'form-control', 'placeholder' => 'Digite a descrição']) }}
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