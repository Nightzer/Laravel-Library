<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('category.index')->with('models', App::make('Category')->index($request));
    }

    /**
     * @param StoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreRequest $request)
    {
        App::make('Category')->store($request);
        return redirect(route('category.index'));
    }

    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, Category $category)
    {
        App::make('Category')->update($request, $category);
        return redirect(route('category.index'));
    }

    /**
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Category $category)
    {
        App::make('Category')->destroy($category);
        return redirect(route('category.index'));
    }
}
