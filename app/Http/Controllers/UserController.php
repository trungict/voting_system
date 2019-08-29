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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->fill($data);

        if ($user->save()) {
            return redirect()->route('users.index')->with([
                'message' => 'Add new user successfully',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('users.index')->with([
            'message' => 'Add new user failed',
            'alert-type' => 'error'
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $currentUser = Auth::user();

        if (!$currentUser->isAdmin() && $currentUser->id != $user->id) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($request->new_password) {
            $request->validate([
                'new_password' => 'sometimes|min:6|confirmed',
            ]);

            $user->password = Hash::make($request->new_password);
        }

        $user->fill($request->all());

        if ($user->save()) {
            return redirect()->back()->with([
                'message' => 'Update user successfully',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Update user failed',
            'alert-type' => 'error'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return $this
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return back()->withInput()->with([
                'message' => 'Remove user successfully',
                'alert-type' => 'success'
            ]);
        }

        return back()->withInput()->with([
            'message' => 'Remove user failed',
            'alert-type' => 'error'
        ]);
    }
}
