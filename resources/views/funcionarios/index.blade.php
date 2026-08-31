@extends('layouts.app') 

@section('content')
<h2>Funcionários</h2>

<a href="{{ route('funcionarios.create') }}" class="btn btn-primary mb-3">Novo Funcionário</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Cargo</th>
        <th>Ações</th>
    </tr>

    @foreach($funcionarios as $f)
    <tr>
        <td>{{ $f->id }}</td>
        <td>{{ $f->nome }}</td>
        <td>{{ $f->email }}</td>
        <td>{{ $f->cargo }}</td>
        <td>
            <a href="{{ route('funcionarios.edit', $f) }}" class="btn btn-warning btn-sm">Editar</a>

            <form action="{{ route('funcionarios.destroy', $f) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection