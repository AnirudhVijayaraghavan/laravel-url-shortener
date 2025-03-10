<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Providers\AppServiceProvider;

class PremiumController extends Controller
{
    //
    public function disableSubscription()
    {
        auth()->user()->isPremium = false;
        auth()->user()->save();
        return back()->with('failure', "We're sorry to see you go!");
    }
    public function enableSubscription()
    {
        auth()->user()->isPremium = true;
        auth()->user()->save();
        return back()->with('success', 'Congratulations, you are now a premium user!');
    }
    public function loadPremiumWelcomePage()
    {
        $this->getSharedPremiumLayoutData();
        return view('premiumwelc');
    }
    private function getSharedPremiumLayoutData()
    {
        
        View::share('sharedData', [
            'isPremium' => auth()->user()->isPremium
        ]);
    }
}
