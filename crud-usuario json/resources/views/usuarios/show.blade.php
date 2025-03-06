@extends('layouts.app')

@section('content')
    <h1>Detalhes do Usuário</h1>
    <p><strong>ID:</strong> {{ $usuario['id'] }}</p>
    <p><strong>Nome:</strong> {{ $usuario['nome'] }}</p>
    <p><strong>Email:</strong> {{ $usuario['email'] }}</p>
    <p><strong>CPF:</strong> {{ $usuario['cpf'] }}</p>
    <p><strong>Telefone:</strong> {{ $usuario['fone'] }}</p>
    <p><strong>Rua:</strong> {{ $usuario['rua'] }}</p>
    <p><strong>CEP:</strong> {{ $usuario['cep'] }}</p>
    <p><strong>Bairro:</strong> {{ $usuario['bairro'] }}</p>
    <p><strong>Número:</strong> {{ $usuario['numero'] }}</p>
    <p><strong>Cidade:</strong> {{ $usuario['cidade'] }}</p>
    <p><strong>Estado:</strong> {{ $usuario['estado'] }}</p>
    <a href="{{ route('usuarios.edit', $usuario['id']) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('usuarios.destroy', $usuario['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
    </form>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
@endsection