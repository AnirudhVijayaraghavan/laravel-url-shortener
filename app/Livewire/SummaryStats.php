<?php

namespace App\Livewire;

use App\Models\GuestShortURLS;
use App\Models\User;
use Livewire\Component;
use App\Models\shortenedURLs;

class SummaryStats extends Component
{
    public $totalUrls = 0;
    public $totalClicks = 0;
    public $activeUsers = 0;
    public function render()
    {   $this->totalUrls = shortenedURLs::count()+GuestShortURLS::count();
        $this->activeUsers = User::count();
        $this->totalClicks = shortenedURLs::where('clickCount', '>', -1)->sum('clickCount');
        return view('livewire.summary-stats');
    }
}
