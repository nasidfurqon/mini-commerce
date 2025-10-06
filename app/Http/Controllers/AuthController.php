<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * Handle auth control page - redirect to login
     */
    public function index()
    {
        return view('Auth.Index');
    }


    /**
     * Handle user login
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        
        // Use Laravel's built-in authentication
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }


    /**
     * Handle user registration
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->createUser($request);
        Auth::login($user);

        return $this->redirectBasedOnRole($user);
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.page')->with('success', 'Anda telah logout.');
    }

    /**
     * Authenticate user with email and password
     */
    private function authenticateUser(string $email, string $password): ?User
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    /**
     * Create new user from RegisterRequest
     */
    private function createUser(RegisterRequest $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Will be hashed by mutator
            'role' => 'pengguna' // Default role
        ]);
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        else if ($user->role === 'pengguna') {
            return redirect()->route('user.index');
        }

        return redirect()->intended('/');
    }

    /**
     * Redirect back with error message
     */
    private function redirectWithError(string $message)
    {
        return redirect()->back()
            ->withErrors(['email' => $message])
            ->withInput();
    }
}
