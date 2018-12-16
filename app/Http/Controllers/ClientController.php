<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::query()->sortable()->paginate();

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Client\CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        Client::query()->create($request->except(['_token']));

        return redirect(route('client.index'))
            ->with(['status' => 'Client successful created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Client $client
     * @param \App\Http\Requests\Client\UpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, UpdateRequest $request)
    {
        $client->update($request->except(['_token', '_method']));

        return redirect(route('client.edit', $client->id))
            ->with(['status' => 'Client successful updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect(route('client.index'))
            ->with(['status' => 'Client successful deleted.']);
    }
}
