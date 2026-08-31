<?php

namespace App\Http\Controllers;

use App\Models\Cnh;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class CnhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cnhs = Cnh::with('funcionario')->get();
        return view('cnhs.index', compact('cnhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $funcionarios = Funcionario::all();
        return view('cnhs.create', compact('funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'categoria' => 'required',
            'validade' => 'required|date',
            'funcionario_id' => 'required|exists:funcionarios,id|unique:cnhs,funcionario_id',
        ]);

        Cnh::create($request->all());

        return redirect()->route('cnhs.index')
            ->with('success', 'Cnh criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cnh $cnh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cnh $cnh)
    {
        
        $funcionarios = Funcionario::all();
        return view('cnhs.edit', compact('cnh', 'funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cnh $cnh)
    {
        $request->validate([
            'numero' => 'required',
            'categoria' => 'required',
            'validade' => 'required|date',
            'funcionario_id' => 'required|exists:funcionarios,id|unique:cnhs,funcionario_id,' . $cnh->id,
        ]);

        $cnh->update($request->all());

        return redirect()->route('cnhs.index')
            ->with('success', 'Cnh atualizada com sucesso.');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cnh $cnh)
    {
        $cnh->delete();
        return redirect()->route('cnhs.index')
            ->with('success', 'Cnh deletada com sucesso.');
    }
}
