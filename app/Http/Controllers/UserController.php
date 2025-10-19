<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display user dashboard: profile info and orders
     */
    public function dashboard()
    {
        $user = Auth::user();
        $orders = Order::with(['orderItems.product'])
            ->where('user_id', $user?->id)
            ->orderBy('created_at','desc')
            ->get();
        return view('Page.User.Dashboard', compact('user','orders'));
    }

    /**
     * Update user profile: name and email
     */
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
        ]);

        $user->fill($validated);
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
