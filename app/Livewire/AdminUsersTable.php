<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsersTable extends Component
{
    use WithPagination;

    public function render()
    {
        $results = User::paginate(10);
        return view('livewire.admin-users-table', compact('results'));
    }
}
