<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /* $this->middleware('can:clients.create')->only(['create','store']);
        $this->middleware('can:clients.index')->only(['index']);
        $this->middleware('can:clients.edit')->only(['edit','update']);
        $this->middleware('can:clients.show')->only(['show']);
        $this->middleware('can:clients.destroy')->only(['destroy']); */
    }

    public function index()
    {
        $clients = User::role('Client')->get();
        return view('admin.client.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.client.create');
    }
    public function store(Request $request)
    {
        
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => bcrypt('12345678'),

        ])->assignRole('Client');
        if ($request->sale == 1) {
            return redirect()->back();
        }
        return redirect()->route('clients.index');
    }
    public function show(User $client)
    {
        $total_purchases = 0;
        foreach ($client->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        return view('admin.client.show', compact('client', 'total_purchases'));
    }
    public function edit(User $client)
    {
        return view('admin.client.edit', compact('client'));
    }
    public function update(Request $request, User $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
