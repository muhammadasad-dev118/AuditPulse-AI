<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterTenantController extends Controller
{
    public function show()
    {
        return view('auth.register-tenant');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:8|confirmed',
        ]);

        // 1. Create the Tenant
        $tenant = Tenant::create([
            'name' => $request->company_name,
            'slug' => Str::slug($request->company_name),
        ]);

        // 2. Create the User linked to that Tenant
        $user = User::create([
            'tenant_id' => $tenant->id,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        Auth::login($user);

        // 3. Set the session for our BelongsToTenant trait
        session(['tenant_id' => $tenant->id]);

        return redirect('/admin'); // Redirect to Filament Dashboard
    }
}