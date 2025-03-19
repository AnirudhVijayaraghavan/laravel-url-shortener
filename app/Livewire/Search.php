<?php

namespace App\Livewire;

use App\Models\shortenedURLs;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
    public $results;
    public function render()
    {
        if ($this->searchTerm == '') {
            $this->results = array();
        } else {
            if (auth()->user()->isAdmin === 1) {
                $adminurls = shortenedURLs::search($this->searchTerm)->get();
                $adminurls->load('user:id,username,avatar');
                $this->results = $adminurls;
            } else {
                $urls = shortenedURLs::search($this->searchTerm)->where("user_id", auth()->user()->id)->get();
                $urls->load('user:id,username,avatar');
                $this->results = $urls;
            }
        }
        return view('livewire.search');
    }
}
