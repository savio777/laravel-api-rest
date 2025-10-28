<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditValidationRequest;
use App\Http\Requests\UserValidationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $currentPage = $request->query('current_page', 1);
        $itemsPerPage = $request->query('items_per_page', 10);

        $skip = ($currentPage - 1) * $itemsPerPage;
        $users = User::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->skip($skip)
            ->take($itemsPerPage)
            ->orderByDesc('id')
            ->get();

        return response()->json($users->toResourceCollection());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserValidationRequest $request)
    {
        try {
            $payload = $request->validated();

            $user = new User;
            $user->fill($payload);
            $user->password = Hash::make($payload['password']);
            $user->save();

            // outra maneira
            // $user = User::create($payload);

            return response()->json([
                'data' => $user,
                'message' => 'Usuário criado com sucesso.',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocorreu um erro ao criar Usuário',

            ], 400);
        }
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
    public function update(UserEditValidationRequest $request, string $id)
    {
        try {
            $user = User::find($id);
            $payload = $request->validated();

            if (! $user) {
                return response()->json([
                    'message' => 'Usuário não encontrado.',
                ], 400);
            }

            if (isset($payload['password'])) {
                $user->password = Hash::make($payload['password']);
            }
            if (isset($payload['email']) && $payload['email'] !== $user->email) {
                $user->email = $payload['email'];
            }
            $user->name = $payload['name'];
            $user->birthdate = $payload['birthdate'];

            $user->save();

            return response()->json([
                'data' => $user,
                'message' => 'Usuário atualizado com sucesso.',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocorreu um erro ao atualizar Usuário',
                'error' => $th->getMessage(),
            ], 400);
        }
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

            // outra maneira em somente uma linha
            // User::destroy($id);

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
