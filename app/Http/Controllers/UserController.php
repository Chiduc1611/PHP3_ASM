<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function register(Request $request)
    {


        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route("views.index");
    }

    public function login(Request $request)
    {
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $user = User::where("email", $credentials['email'])->first();

            $sessionUser = session(['user' => $user->name]);

            return redirect()->route('views.index');
        }
        return back()->withErrors([
            // 'email' => 'Tài khoản hoặc mật khẩu không đúng.'
            dd("Sai")
        ]);
    }
}
