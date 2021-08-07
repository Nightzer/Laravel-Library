<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p> {{ __('Borrowed Books') }}</p>
    </x-slot>

    <div class="container">
        <table class="responsive-table">
            <thead>
            <tr>
                <th>{{ __('id') }}</th>
                <th>{{ __('Book') }}</th>
                <th>{{ __('User') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Return Date') }}</th>
                <th>{{ __('Status') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->book->title}}</td>
                    <td>{{$model->user->name}}</td>
                    <td>{{$model->start_date}}</td>
                    <td>{{$model->end_date}}</td>
                    <td>{{ ($model->status == 1) ? 'Borrowed' : 'Returned' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $models->links() }}
    </div>



    <x-slot name="javascript">
    </x-slot>
</x-app-layout>
