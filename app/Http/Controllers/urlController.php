<?php

namespace App\Http\Controllers;

use App\Models\GuestShortURLS;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\shortenedURLs;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class urlController extends Controller
{
    //
    public function redirectGuestShortURL($guestshortURL) {
        $existCheck = GuestShortURLS::where('shortURL', '=', 'g/' . $guestshortURL)->first();

        if ($existCheck) {
            return redirect($existCheck->longURL);
        }
        return view('404')->with('failure', 'Link does not exist.');
    }
    public function shortenGuestURL(Request $request)
    {
        $incomingFields = $request->validate([
            'original_url' => ['required', 'url:http,https']
        ]);
        $incomingFields['longURL'] = strip_tags($incomingFields['original_url']);
        $incomingFields['shortURL'] = 'g/' . Str::random(9);

        $newURL = new GuestShortURLS();
        $newURL->longURL = $incomingFields['longURL'];
        $newURL->expiration_date = now()->addMonth();
        //Checking if longURL exists, then checking if generated shortURL exists, if so, then randomizing again.
        $existCheck = GuestShortURLS::where("longURL", "=", $incomingFields['original_url'])->first();
        if ($existCheck) {
            $shortURLValue = $existCheck->shortURL;
            return back()->with('displayDUP', 'A shortened version exists, please use: ' . '127.0.0.1:8000/' . $shortURLValue);
        } else {
            $existCheckShortURL = GuestShortURLS::where("shortURL", "=", $incomingFields['shortURL'])->first();
            if ($existCheckShortURL) {
                $incomingFields['shortURL'] .= Str::random(1);
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return back()->with('displaySURL', '127.0.0.1:8000/' . $newURL->shortURL);
            } else {
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return back()->with('displaySURL', '127.0.0.1:8000/' . $newURL->shortURL);
            }
        }

    }
    public function redirectShortURL($shortURL)
    {
        $existCheck = shortenedURLs::where('shortURL', '=', 'a/' . $shortURL)->first();

        if ($existCheck) {
            if ($existCheck->clickCount === -1) {
                return redirect($existCheck->longURL);
            } else {
                $existCheck->clickCount += 1;
                $existCheck->save();
                return redirect($existCheck->longURL);
            }

        }
        return view('404')->with('failure', 'Link does not exist.');
    }
    public function shortenURL(Request $request)
    {
        $incomingFields = $request->validate([
            'original_url' => ['required', 'url:http,https'],
            'label' => ['nullable', 'regex:/^[a-zA-Z0-9]{1,15}$/'],
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
            ],
            'enable_click_count' => ['nullable', 'boolean']
        ]);

        $incomingFields['longURL'] = strip_tags($incomingFields['original_url']);
        $incomingFields['shortURL'] = $incomingFields['custom_alias'] ?? null ? 'a/' . $incomingFields['custom_alias'] : 'a/' . Str::random(9);
        $incomingFields['user_id'] = auth()->id();

        $existCheckQuery = shortenedURLs::where('longURL', $incomingFields['longURL'])->first();
        if ($existCheckQuery) {
            $shortURLValue = $existCheckQuery->shortURL;
            return back()->with('displayDUP', 'A shortened version exists, please use: ' . '127.0.0.1:8000/' . $shortURLValue);
        }
        $existCheckQueryCustomAlias = shortenedURLs::where('shortURL', $incomingFields['shortURL'])->first();
        if ($existCheckQueryCustomAlias) {
            //$shortURLValue = $existCheckQuery->shortURL;
            return back()->with('displayDUP', 'A shortened URL with that link already exists, please try another one.');
        }

        $newURL = new shortenedURLs;
        $newURL->user_id = auth()->user()->id;
        $newURL->longURL = $incomingFields['longURL'];
        $newURL->shortURL = $incomingFields['shortURL'];
        $newURL->clickCount = $incomingFields['enable_click_count'] == 1 ? 0 : -1;
        $newURL->label = $incomingFields['label'] ?? '[No Label]';
        $newURL->expiration_date = $incomingFields['expiration_date'] ?? now()->addYear();
        $newURL->save();

        //$newPost = shortenedURLs::create($incomingFields)->with('success','You have shortened '.$incomingFields['longURL']);
        return back()->with('displaySURL', '127.0.0.1:8000/' . $newURL->shortURL);
    }
    public function showHomePage()
    {
        return view("homepage", [
            'ownedShortenedURLs' => auth()->user()->urls()->latest()->paginate(4)
        ]);

    }
    // private function getSharedHomePageLayoutData(){
    //     View::share('sharedData', [

    //     ])
    // }
}
