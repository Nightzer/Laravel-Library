<?php


namespace App\Services;


use App\Http\Requests\Book\BorrowRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\Book as Model;

class Book
{
    public function index(Request $request)
    {
        return Model::when($request->title, function ($query, $title) {
            return $query->where('title', 'LIKE', '%' . $title . '%');
        })
        ->when($request->author_id, function ($query, $author_id) {
            return $query->where('author_id', $author_id);
        })
            ->when($request->category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
        ->paginate();
    }

    public function store(StoreRequest $request)
    {
        $model = Model::create($request->all());

        $message = [
            'tittle' => 'Book created',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $model;
    }

    public function update(UpdateRequest $request, Model $model)
    {
        $model->update([
            'title' => $request->input('title', $model->title),
            'publish_date' => $request->input('publish_date', $model->publish_date),
            'author_id' => $request->input('author_id', $model->author_id),
            'category_id' => $request->input('category_id', $model->category_id)
        ]);

        $message = [
            'tittle' => 'Book updated',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $model;
    }

    public function destroy(Model $model)
    {
        $model->delete();

        $message = [
            'tittle' => 'Book deleted',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return true;
    }

    public function borrow(BorrowRequest $request, Model $model)
    {
        $model->update([
            'status' => 0
        ]);

        $borrowModel = Borrow::create(array_merge($request->all(), ['book_id' => $model->id]));

        $message = [
            'tittle' => 'Book borrowed',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $borrowModel;
    }

    public function return(Model $model)
    {
        $model->update([
            'status' => 1
        ]);

        $borrow = $model->borrow()->where('status',1)->first();
        $borrow->update([
            'status' => 0
        ]);

        $message = [
            'tittle' => 'Book returned',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $borrow;
    }
}
