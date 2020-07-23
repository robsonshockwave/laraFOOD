<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Requests\StoreUpdateCliente;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $repository;

    public function __construct(Cliente $cliente)
    {
        $this->repository = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->repository->paginate();

        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \use App\Http\Requests\StoreUpdateCliente  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCliente $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$cliente = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.clients.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$cliente = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.clients.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \use App\Http\Requests\StoreUpdateCliente  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCliente $request, $id)
    {
        if(!$cliente = $this->repository->find($id)) {
            return redirect()->back();
        }

        $cliente->update($request->all());

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$cliente = $this->repository->find($id)) {
            return redirect()->back();
        }

        $cliente->delete();

        return redirect()->route('clients.index');
    }

    /**
     * Search results.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $clients = $this->repository
                        ->where(function($query) use ($request) {
                            if($request->filter) {
                            $query->where('name', $request->filter);
                            }
                        })
                        ->paginate();

        return view('admin.pages.clients.index', compact('clients', 'filters'));
    }
}
