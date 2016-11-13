@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>CRUD</h1>
    </div>
</div>
<div class="row">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
        <a href="{{route('item.create')}}" class="btn btn-info pull-right">Criar Novo Item</a><br><br>
        <?php $no = 1; ?>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>
                    <form class="" action="{{route('item.destroy',$item->id)}}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{route('item.edit',$item->id)}}" class="btn btn-primary">Editar</a>
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Deseja deletar o item ID: {{ $item->id }}?');" name="name" value="Excluir">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@stop
