<?php

namespace App\View\Components;

use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthorDropdown extends Component
{
    public $authors;
    public $authorId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($authorId = 0)
    {
        $this->authorId = $authorId;
        $authors = Author::select('id', 'name')->get();
        $this->authors = $authors->mapWithKeys(function ($item) {
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
        return view('components.author-dropdown');
    }
}
