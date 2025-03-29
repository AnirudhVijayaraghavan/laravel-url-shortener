<?php

namespace App\Livewire;

use App\Models\GuestShortURLS;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPanelGuestTable extends Component
{
    use WithPagination;

    public function render()
    {
        $guestresults = GuestShortURLS::paginate(10);
        return view('livewire.admin-panel-guest-table', compact('guestresults'));
    }
}
