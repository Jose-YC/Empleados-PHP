<?php

namespace App\Http\Controllers;

use App\Models\Financiero;
use Illuminate\Http\Request;

/**
 * Class FinancieroController
 * @package App\Http\Controllers
 */
class FinancieroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //Finanzas
       
        $financieros = Financiero::all();

        return view('financiero.index', compact('financieros'))
             ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $financiero = new Financiero();
        return view('financiero.create', compact('financiero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Financiero::$rules);

        $financiero = Financiero::create($request->all());

        return redirect()->route('financieros.index')
            ->with('success', 'Financiero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Financiero $financiero)
    {
        return view('financiero.show', compact('financiero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Financiero $financiero)
    {
        return view('financiero.edit', compact('financiero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Financiero $financiero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financiero $financiero)
    {
        request()->validate(Financiero::$rules);

        $financiero->update($request->all());

        return redirect()->route('financieros.index')
            ->with('success', 'Financiero updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Financiero $financiero)
    {
        $financiero->delete();

        return redirect()->route('financieros.index')
            ->with('success', 'Financiero deleted successfully');
    }
}
