<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\shortenedURLs;

class AdminPanelURLTable extends Component
{
    use WithPagination;
    
    public function render()
    {
        $results = shortenedURLs::paginate(10);
        return view('livewire.admin-panel-u-r-l-table', compact('results'));
    }
}
