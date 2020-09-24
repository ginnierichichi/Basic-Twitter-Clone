<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{


    public function show(User $user)
    {
        return view('profiles.show', [
            'user'=> $user,
            'tweets'=> $user -> tweets()->withLikes()->paginate(10),
        ]);
    }

    public function edit(User $user)
    {
        return view ('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
                        'username' => [
                            'string',
                            'required',
                            'max:255',
                            'alpha_dash',
                            Rule::unique('users')->ignore($user)
                        ],
                        'name' => ['string', 'required', 'max:255'],
                        'avatar'=> ['file'],
                        'banner'=> ['file'],
                        'bio'=>['string', 'max:255'],
                        'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                        'password' => [request('password') != null ?'sometimes|required|min:8': '']
//                        'password'=>['string', 'sometimes', 'required', 'min:8', 'max:255', 'confirmed'], <--this makes you also put a password in.
                        ]);


        if (request('avatar')){
            $attributes['avatar']= request('avatar')->store('avatars');
        }

        if(request('banner'))
        {
            $attributes['banner']= request('banner')->store('banners');
        }

        $user->update($attributes);
        return redirect($user->path());

    }

    public function create(User $user)
    {
        return User::create([
            'bio'=>$user['bio']
        ]);
    }

}
