<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BorrowRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('book.index')->with('models', App::make('Book')->index($request));
    }

    /**
     * @param StoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreRequest $request)
    {
        App::make('Book')->store($request);
        return redirect(route('book.index'));
    }

    /**
     * @param UpdateRequest $request
     * @param Book $book
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateRequest $request, Book $book)
    {
        App::make('Book')->update($request, $book);
        return redirect(route('book.index'));
    }

    /**
     * @param Book $book
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Book $book)
    {
        App::make('Book')->destroy($book);
        return redirect(route('book.index'));
    }

    /**
     * @param BorrowRequest $request
     * @param Book $book
     * @return Application|RedirectResponse|Redirector
     */
    public function borrow(BorrowRequest $request, Book $book)
    {
        App::make('Book')->borrow($request, $book);
        return redirect(route('book.index'));
    }

    /**
     * @param Book $book
     * @return Application|RedirectResponse|Redirector
     */
    public function return(Book $book)
    {
        App::make('Book')->return($book);
        return redirect(route('book.index'));
    }
}
