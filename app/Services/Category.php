<?php


namespace App\Services;


use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category as Model;

class Category
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return Model::when($request->name, function ($query, $name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        })
        ->paginate();
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $model = Model::create($request->all());

        $message = [
            'tittle' => 'Category created',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $model;
    }

    /**
     * @param UpdateRequest $request
     * @param Model $model
     * @return Model
     */
    public function update(UpdateRequest $request, Model $model)
    {
        $model->update([
            'name' => $request->input('name', $model->name),
            'description' => $request->input('description', $model->description)
        ]);

        $message = [
            'tittle' => 'Category updated',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return $model;
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function destroy(Model $model)
    {
        $model->delete();

        $message = [
            'tittle' => 'Category deleted',
            'text' => '',
            'success' => 'success'
        ];
        session()->flash('message', $message);

        return true;
    }
}
