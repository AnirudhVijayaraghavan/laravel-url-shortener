<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\shortenedURLs;
use App\Models\GuestShortURLS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function adminDeleteUser(User $userID, Request $request) {
        if (Gate::allows('visitAdminPages')) {
            $userID->delete();
            return back()->with('success', "'You have deleted ' . $userID->username");
        } else {
            return back()->with('failure', "Something went wrong");
        }
    }
    public function editPages(shortenedURLs $urlID, Request $request)
    {
        $incomingFields = $request->validate([
            'longURL' => ['url:http,https'],
            'label' => ['nullable', 'regex:/^[A-Za-z0-9]{1,15}$/'],
            'custom_alias' => [
                'nullable',
                'regex:/^[a-zA-Z0-9]{1,15}$/',
                Rule::unique('shortened_urls', 'shortURL')
            ],
            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:today',
                'before_or_equal:' . now()->addYears(2)
            ]
        ]);
        if (Gate::allows('visitAdminPages')) {
            $urlID->longURL = $incomingFields['longURL'];
            $urlID->label = $incomingFields['label'] ?? '[No Label]';;
            $urlID->shortURL = $incomingFields['custom_alias'] ?? null ? 'a/' . $incomingFields['custom_alias'] : 'a/' . Str::random(9);
            $urlID->expiration_date = $incomingFields['expiration_date'] ?? now()->addYear();
            $urlID->save();
            return back()->with('success', 'shortenedURL ID: '.$urlID->id.', updated.');
        }

    }
    public function showEditURLPage(shortenedURLs $urlID, Request $request)
    {

        if (Gate::allows('visitAdminPages')) {
            return view('adminediturl', [
                'url' => $urlID
            ]);
        }
        return back()->with('failure', 'You are not authorized.');
    }
    public function adminDeleteURL(shortenedURLs $urlID)
    {
        $urlID->delete();
        return back()->with('success', 'You have deleted ' . $urlID->longURL);
    }
    public function adminDeleteURLGuest(GuestShortURLS $urlID)
    {
        $urlID->delete();
        return back()->with('success', 'You have deleted ' . $urlID->longURL);
    }
}
