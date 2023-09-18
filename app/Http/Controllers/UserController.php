<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //make instance of User model
        $testUser = new User();
        //
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $pswd = $request->input('password');
        $repswd = $request->input('re_password');

        $pswd_val = $testUser->checkTwoPassword($pswd, $repswd);
        if ($pswd_val) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);

            auth()->login($user);

            return redirect()->route('Home')->with('success', 'User registered successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors(['pswd_error' => 'Password and Re_Password is not match']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        //
        $posts = $user->posts()->get();

        $post_count = $user->getPostCountAttribute();
        $view_count = $user->getViewCountAttribute();

        return view('user.profile',)->with(
            [
                'user' => $user,
                'posts' => $posts,
                'post_count' => $post_count,
                'view_count' => $view_count,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('user.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
//        dd($request);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'new_password' => 'required|string|min:6',
        ]);

        $first_pswd = $request->input('first_password');
        $new_pswd = $request->input('new_password');
        $new_repswd = $request->input('new_re_password');
        $pswd_val = $user->checkTwoPassword($new_pswd, $new_repswd);

        if ($first_pswd != null) {
            if (password_verify($first_pswd, $user->password)) {
                if (!$pswd_val) {
                    return redirect()->back()->withInput()->withErrors(['pswd_error' => 'Password and Re_Password is not match']);
                } else {
                    $pswd = bcrypt($new_pswd);
                }
            } else {
                $pswd = $user->password;
            }
        } else {
            $pswd = $user->password;
        }


        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $pswd,
        ]);

        return redirect()->route('Home')->with('success', 'User Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //delete user's posts
        $user->posts()->delete();

        //delete user
        $user->delete();

        return redirect()->route('Home')->with('warning', 'User Delted successfully.');

    }

    public function login()
    {
        return view('user.login');
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $formFields = $request->only('email', 'password');

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect(route('Home'))->with('success', 'User login successfully.');
        } else {
            return back()->with('error', 'The information entered is not correct.');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('Home'))->with(['info' => 'You have been logged out']);
    }
}
