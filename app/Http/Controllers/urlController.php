<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\SendNewURLEmail;
use App\Models\shortenedURLs;
use App\Models\GuestShortURLS;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class urlController extends Controller
{
    //
    public function search($term)
    {
        if (auth()->user()->isAdmin === 1) {
            $adminurls = shortenedURLs::search($term)->get();
            $adminurls->load('user:id,username,avatar');
            return $adminurls;
        }
        $urls = shortenedURLs::search($term)->where("user_id", auth()->user()->id)->get();
        $urls->load('user:id,username,avatar');
        return $urls;

    }
    public function redirectGuestShortURL($guestshortURL)
    {
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
            return back()->with('displayDUP', 'A shortened version exists, please use: ' . 'shorty.anirudhvijay.xyz/' . $shortURLValue);
        } else {
            $existCheckShortURL = GuestShortURLS::where("shortURL", "=", $incomingFields['shortURL'])->first();
            if ($existCheckShortURL) {
                $incomingFields['shortURL'] .= Str::random(1);
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return back()->with('displaySURL', 'shorty.anirudhvijay.xyz/' . $newURL->shortURL);
            } else {
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return back()->with('displaySURL', 'shorty.anirudhvijay.xyz/' . $newURL->shortURL);
            }
        }

    }
    public function shortenGuestURLAPI(Request $request)
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
            return response()->json([
                'message' => 'A shortened version exists, please use: ' . 'shorty.anirudhvijay.xyz/' . $shortURLValue,
                'data' => $shortURLValue, // optional data
            ], 200);
        } else {
            $existCheckShortURL = GuestShortURLS::where("shortURL", "=", $incomingFields['shortURL'])->first();
            if ($existCheckShortURL) {
                $incomingFields['shortURL'] .= Str::random(1);
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return response()->json([
                    'message' => 'shorty.anirudhvijay.xyz/' . $newURL->shortURL,
                    'data' => $newURL->shortURL, // optional data
                ], 200);
            } else {
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                return response()->json([
                    'message' => 'shorty.anirudhvijay.xyz/' . $newURL->shortURL,
                    'data' => $newURL->shortURL, // optional data
                ], 200);
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

        $newURL = new shortenedURLs;
        $newURL->user_id = auth()->user()->id;
        $enableClick = $incomingFields['enable_click_count'] ?? 0;
        $newURL->clickCount = ($enableClick == 1) ? 0 : -1;
        $newURL->label = $incomingFields['label'] ?? '[No Label]';
        $newURL->expiration_date = $incomingFields['expiration_date'] ?? now()->addYear();


        $existCheckQuery = shortenedURLs::where('longURL', $incomingFields['longURL'])
            ->where('user_id', auth()->id())
            ->first();
        if ($existCheckQuery) {
            $shortURLValue = $existCheckQuery->shortURL;
            return back()->with('displayDUP', 'A shortened version exists, please use: ' . 'shorty.anirudhvijay.xyz/' . $shortURLValue);
        } else {
            $newURL->longURL = $incomingFields['longURL'];
            $existCheckShortURL = shortenedURLs::where("shortURL", "=", $incomingFields['shortURL'])->first();
            if (
                $existCheckShortURL &&
                ($incomingFields['shortURL'] != 'a/' . $incomingFields['custom_alias'])
            ) {
                $incomingFields['shortURL'] .= Str::random(2);
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                dispatch(new SendNewURLEmail([
                    'name' => auth()->user()->username,
                    'email' => auth()->user()->email,
                    'shortURL' => $newURL->shortURL,
                    'longURL' => $newURL->longURL
                ]));
                return back()->with('displaySURL', 'shorty.anirudhvijay.xyz/' . $newURL->shortURL);
            } else if (
                $existCheckShortURL &&
                ($incomingFields['shortURL'] == 'a/' . $incomingFields['custom_alias'])
            ) {
                return back()->with('displayDUP', 'A shortened URL with that link already exists, please try another one.');

            } else {
                $newURL->shortURL = $incomingFields['shortURL'];
                $newURL->save();
                dispatch(new SendNewURLEmail([
                    'name' => auth()->user()->username,
                    'email' => auth()->user()->email,
                    'shortURL' => $newURL->shortURL,
                    'longURL' => $newURL->longURL
                ]));
                return back()->with('displaySURL', 'shorty.anirudhvijay.xyz/' . $newURL->shortURL);
            }
        }

        // The following was to check if custom alias exists. Handled it in if condition above.
        // $existCheckQueryCustomAlias = shortenedURLs::where('shortURL', $incomingFields['shortURL'])->first();
        // if ($existCheckQueryCustomAlias) {
        //     //$shortURLValue = $existCheckQuery->shortURL;
        //     return back()->with('displayDUP', 'A shortened URL with that link already exists, please try another one.');
        // }
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
