<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'data' => $users,
            'message' => 'Lista de usuários recuperada com sucesso.',
            'length' => count($users),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                'data' => $user,
                'message' => 'Usuário recuperado com sucesso.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Usuário não encontrado.',
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);

            if (! $user) {
                return response()->json([
                    'message' => 'Usuário não encontrado.',
                ], 400);
            }

            $user->delete();

            return response()->json([
                'data' => $user,
                'message' => 'Usuário deletado com sucesso.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocorreu um erro ao deletar Usuário',
            ], 400);
        }
    }
}
