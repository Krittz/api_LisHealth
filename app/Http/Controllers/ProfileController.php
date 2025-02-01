<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show()
    {
        $profile = Auth::user()->profile;

        return response()->json([
            'status' => 'success',
            'data' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'height' => 'nullable|numeric|min:0.5|max:3',
            'weight' => 'nullable|numeric|min:10|max:500',
            'blood' => ['nullable', 'string', 'max:3', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
            'birth' => 'nullable|date',
            'rg' => 'nullable|string|max:20|unique:profiles,rg,' . ($user->profile->id ?? 'NULL'),
            'cpf' => 'nullable|string|max:14|unique:profiles,cpf,' . ($user->profile->id ?? 'NULL'),
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );
        return response()->json([
            'status' => 'success',
            'message' => 'Perfil atualizado com sucesso.',
            'data' => $profile
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
