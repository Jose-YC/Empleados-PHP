<?php

namespace App\Http\Controllers;

use App\Models\DocumentosContable;
use Illuminate\Http\Request;

/**
 * Class DocumentosContableController
 * @package App\Http\Controllers
 */
class DocumentosContableController extends Controller
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
        $documentosContables = DocumentosContable::all();

        return view('documentos-contable.index', compact('documentosContables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentosContable = new DocumentosContable();
        return view('documentos-contable.create', compact('documentosContable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DocumentosContable::$rules);

        $documentosContable = DocumentosContable::create($request->all());

        return redirect()->route('documentos-contables.index')
            ->with('success', 'DocumentosContable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentosContable $documentosContable)
    {

        //return $documentosContable->docontable->ventotalneto;
        // return $documentosContable;
        return view('documentos-contable.show', compact('documentosContable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentosContable $documentosContable)
    {
        return view('documentos-contable.edit', compact('documentosContable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DocumentosContable $documentosContable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentosContable $documentosContable)
    {
        request()->validate(DocumentosContable::$rules);

        $documentosContable->update($request->all());

        return redirect()->route('documentos-contables.index')
            ->with('success', 'DocumentosContable updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(DocumentosContable $documentosContable)
    {
        $documentosContable->delete();

        return redirect()->route('documentos-contables.index')
            ->with('success', 'DocumentosContable deleted successfully');
    }
}
