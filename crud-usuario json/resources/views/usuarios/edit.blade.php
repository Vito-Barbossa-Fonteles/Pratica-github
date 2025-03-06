@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('usuarios.update', $usuario['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $usuario['nome'] }}" required>
        </div>
        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{ $usuario['dataNascimento'] }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name ="email" id="email" class="form-control" value="{{ $usuario['email'] }}" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $usuario['cpf'] }}" required>
        </div>
        <div class="form-group">
            <label for="fone">Telefone</label>
            <input type="text" name="fone" id="fone" class="form-control" value="{{ $usuario['fone'] }}" required>
        </div>
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" value="{{ $usuario['rua'] }}" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="{{ $usuario['cep'] }}" required>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $usuario['bairro'] }}" required>
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" value="{{ $usuario['numero'] }}" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $usuario['cidade'] }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ $usuario['estado'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
    </form>
@endsection
``` ### 3. **Controller `UsuarioController.php`**

Agora, vamos garantir que o `UsuarioController` esteja configurado para lidar com esses campos. Aqui está um exemplo de como o método `store` e `update` podem ser implementados:

```php
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'dataNascimento' => 'required|date',
        'email' => 'required|email|unique:usuarios,email',
        'cpf' => 'required|string|max:14',
        'fone' => 'required|string|max:15',
        'rua' => 'required|string|max:255',
        'cep' => 'required|string|max:10',
        'bairro' => 'required|string|max:255',
        'numero' => 'required|string|max:10',
        'cidade' => 'required|string|max:255',
        'estado' => 'required|string|max:2',
    ]);

    Usuario::create($request->all());

    return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'dataNascimento' => 'required|date',
        'email' => 'required|email|unique:usuarios,email,' . $id,
        'cpf' => 'required|string|max:14',
        'fone' => 'required|string|max:15',
        'rua' => 'required|string|max:255',
        'cep' => 'required|string|max:10',
        'bairro' => 'required|string|max:255',
        'numero' => 'required|string|max:10',
        'cidade' => 'required|string|max:255',
        'estado' => 'required|string|max:2',
    ]);

    $usuario = Usuario::findOrFail($id);
    $usuario->update($request->all());

    return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
}