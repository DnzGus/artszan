<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visitor.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visitor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visitor = new Visitor();
        $visitor->name = $request->name;
        $visitor->email = $request->email;
        $visitor->birthday = $request->birthday;
        $visitor->password = Hash::make($request->password);

        $visitor->save();

        return view('visitor.profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visitor = Visitor::find($id);

        return view('visitor.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visitor = Visitor::find($id);
        return view('visitor.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visitor = Visitor::find($id);
        $visitor->name = $request->name;
        $visitor->birthday = $request->birthday;

        $visitor->save();

        return redirect()->route('profile.index')->with('mensagem','Perfil alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();

        return redirect()->route('home');
    }
}
