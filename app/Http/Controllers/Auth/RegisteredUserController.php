<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Naics_code;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        session()->forget('participants');
        $page_data["naics_code"] = Naics_code::all();
        $page_data["participants"] = [];
        return view('auth.register', $page_data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'password' => ['required', Rules\Password::defaults()],
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'role' => $request->checkedInstructor == null ? 'student' : 'instructor',
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ]);

        //TODO: Pendiente por lanzar mensaje de exito
        event(new Registered($user));
        // Auth::login($user);

        return redirect()->route('login');
    }
}
