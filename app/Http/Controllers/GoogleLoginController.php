<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_user_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                // $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'avatar'=> $user->avatar, 'google_user_id' => $user->id]);
                $NewUser = new User;
                $NewUser->email = $user->getEmail();
                $NewUser->name  = $user->getName();
                $NewUser->image  = $user->getAvatar();
                $NewUser->google_user_id  = $user->getId();
                $NewUser->save();

                Auth::login($NewUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd('Somethig Went Wrong! or You Are Blocked!');
            dd($e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
