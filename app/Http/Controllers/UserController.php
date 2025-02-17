<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

       /*  $this->middleware('can:users.create')->only(['create','store']);
        $this->middleware('can:users.index')->only(['index']);
        $this->middleware('can:users.edit')->only(['edit','update']);
        $this->middleware('can:users.show')->only(['show']);
        $this->middleware('can:users.destroy')->only(['destroy']); */
    }

    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password'=> Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
    public function update_client(Request $request, User $user)
    {
        
        $user->update_client($request);
        return back();
    }
    public function update_password(ChangePasswordRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('info', 'La contraseña se a actualizado correctamente.');
    }
}
