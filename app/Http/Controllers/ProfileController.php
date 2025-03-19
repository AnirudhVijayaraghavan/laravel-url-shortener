<?php

namespace App\Http\Controllers;

use App\Models\shortenedURLs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    //
    
    public function uploadNewAvatarImage(User $user, Request $request) {
        $request->validate(
            [

                'avatar' => 'required|image|max:3000'
            ]

        );
        Gate::authorize('update', $user);
        $filename = $user->id . "-" . uniqid() . ".jpg";
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file("avatar"));
        $imgData = $image->cover(120, 120)->toJpeg();
        Storage::disk('public')->put('AllAvatars/' . $filename, $imgData);
        $oldAvatar = $user->avatar;
        $user->avatar = $filename;
        $user->save();
        // if (auth()->user()->isAdmin === 1) {
        //     $user->password = $incomingFields['password'];
        //     $user->save();
        //     return back()->with('success', "Password updated for user: ".$user->username);
        // } else {
        //     // Update the authenticated username
        //     auth()->user()->update($incomingFields);
        //     auth()->logout();
        //     return redirect("/login")->with('success', 'Password updated. Please login again.');

        // }


        if ($oldAvatar != "/fallback-avatar.jpg") {
            Storage::disk('public')->delete(str_replace("/storage/", "", $oldAvatar));
        }
        return back()->with('success', 'Avatar changed successfully.');
        //$request->file('avatar')->store('AllAvatars','public');
    }
    public function loadManageAvatarPage(User $user){
        Gate::authorize('view', $user);
        return view('manage-avatar-form',[
            'userData' => $user
        ]);
    }
    public function updatePassword(User $user, Request $request)
    {
        $incomingFields = $request->validate([
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        Gate::authorize('update', $user);
        if (auth()->user()->isAdmin === 1) {
            $user->password = $incomingFields['password'];
            $user->save();
            return back()->with('success', "Password updated for user: ".$user->username);
        } else {
            // Update the authenticated username
            auth()->user()->update($incomingFields);
            auth()->logout();
            return redirect("/login")->with('success', 'Password updated. Please login again.');

        }


    }
    public function updateUsername(User $user, Request $request)
    {
        // This will automatically abort with a 403 if the policy check fails
        //Gate::authorize('update', $username);
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')]
        ]);
        Gate::authorize('update', $user);
        if (auth()->user()->isAdmin === 1) {
            $user->username = $incomingFields['username'];
            $user->save();
        } else {
            // Update the authenticated username
            auth()->user()->update($incomingFields);
        }


        return redirect("/profile/{$incomingFields['username']}")->with('success', 'Username updated.');
        //return back()->with('success', 'Username updated.');
    }
    public function updateEmail(User $user, Request $request)
    {
        //return Gate::authorize('update', $user);
        Gate::authorize('update', $user);
        $incomingFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')]
        ]);
        //auth()->user()->email = $incomingFields['email'];
        // Update the authenticated user's email
        if (auth()->user()->isAdmin === 1) {
            $user->email = $incomingFields['email'];
            $user->save();
        } else {
            auth()->user()->update($incomingFields);
        }

        return back()->with('success', 'Email updated.');
    }
    public function loadProfilePage(User $user)
    {

        $existCheck = User::where("username", $user->username)->first();
        //return $existCheck;

        Gate::authorize('view', $user);
        // if (auth()->user()->username !== $user->username) {
        //     return back()->with('failure', 'You cannot view another profile.');
        // }
        if ($existCheck) {
            return view('mainProfile', [
                'userData' => $existCheck
            ]);
        }
    }
}
