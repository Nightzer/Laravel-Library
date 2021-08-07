<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDropdown extends Component
{
    public $users;
    public $userId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userId = 0)
    {
        $this->userId = $userId;
        $users = User::select('id', 'name')->get();
        $this->users = $users->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.user-dropdown');
    }
}
