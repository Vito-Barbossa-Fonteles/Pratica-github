<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UsuarioController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->client->get('usuarios');
        $usuarios = json_decode($response->getBody()->getContents(), true);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email|unique:usuarios,email',
            'cpf' => 'required|string|unique:usuarios,cpf',
            'fone' => 'required|string',
            'rua' => 'required|string',
            'cep' => 'required|string',
            'bairro' => 'required|string',
            'numero' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ]);

        // Envia os dados para o JSON Server
        $response = $this->client->post('usuarios', [
            'json' => $data,
        ]);

        // Debug: Mostra a resposta do JSON Server (opcional)
        // dd($response->getBody()->getContents());

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->client->get("usuarios/{$id}");
        $usuario = json_decode($response->getBody()->getContents(), true);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = $this->client->get("usuarios/{$id}");
        $usuario = json_decode($response->getBody()->getContents(), true);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'email' => 'required|email',
            'cpf' => 'required|string',
            'fone' => 'required|string',
            'rua' => 'required|string',
            'cep' => 'required|string',
            'bairro' => 'required|string',
            'numero' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
        ]);

        // Envia os dados atualizados para o JSON Server
        $this->client->put("usuarios/{$id}", [
            'json' => $data,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->client->delete("usuarios/{$id}");
        return redirect()->route('usuarios.index')->with('success', 'Usuário deletado com sucesso!');
    }
}