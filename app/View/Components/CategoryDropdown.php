<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public $categories;
    public $categoryId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categoryId = 0)
    {
        $this->categoryId = $categoryId;
        $categories = Category::select('id', 'name')->get();
        $this->categories = $categories->mapWithKeys(function ($item) {
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
        return view('components.category-dropdown');
    }
}
