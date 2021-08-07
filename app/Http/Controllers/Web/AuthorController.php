<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class AuthorController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('author.index')->with('models', App::make('Author')->index($request));
    }

    /**
     * @param StoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreRequest $request)
    {
        App::make('Author')->store($request);
        return redirect(route('author.index'));
    }

    /**
     * @param UpdateRequest $request
     * @param Author $author
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, Author $author)
    {
        App::make('Author')->update($request, $author);
        return redirect(route('author.index'));
    }

    /**
     * @param Author $author
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Author $author)
    {
        App::make('Author')->destroy($author);
        return redirect(route('author.index'));
    }
}
