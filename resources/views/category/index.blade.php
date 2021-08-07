<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Categories') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col s8">
                <x-validation-errors class="mb-4" :errors="$errors" />

                {!! Form::open(['method' => 'get']) !!}
                    <div class="input-field">
                        <input id="name" name='name' type="search" required>
                        <label class="label-icon" for="name"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col s2 offset-s2">
                <a href="#modalAdd" class="btn-floating btn-large waves-effect waves-light teal modal-trigger"><i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <ul class="collapsible popout">
                    @foreach($models as $model)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">folder</i>{{ $model->name }}</div>
                            <div class="collapsible-body">
                                <div class="">
                                    <p>{{$model->description}}</p>
                                </div>
                                <a href="#!" class="waves-effect waves-light btn blue" data-model="{{$model->id}}" data-name="{{$model->name}}" data-description="{{$model->description}}"><i class="material-icons left">edit</i>{{ __('Edit') }}</a>
                                <a href="#!" class="waves-effect waves-light btn red" data-model="{{$model->id}}"><i class="material-icons left">delete</i>{{ __('Delete') }}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $models->links() }}
            </div>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="modalAdd" class="modal">
        {!! Form::open(['route' => 'category.store']) !!}
        <div class="modal-content">
            <h4>{{ __('Add Category') }}</h4>
            <br>
            <br>
            <div class="input-field col s6">
                {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'validate']) !!}
                {!! Form::label('name', 'Name') !!}
            </div>

            <div class="input-field col s6">
                {!! Form::text('description', null, ['placeholder' => 'Description','class' => 'validate']) !!}
                {!! Form::label('description', 'Description') !!}
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" name="action">
                {{ __('Submit') }}
                <i class="material-icons right">send</i>
            </button>
        </div>
        {!! Form::close() !!}
    </div>

    <div id="modalEdit" class="modal">
        {!! Form::open(['route' => ['category.update', 0]]) !!}
        {!! Form::hidden('_method', 'PUT') !!}
        <div class="modal-content">
            <h4>{{ __('Update Category') }}</h4>
            <br>
            <br>
            <div class="input-field col s6">
                {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'validate name']) !!}
                {!! Form::label('name', 'Name') !!}
            </div>

            <div class="input-field col s6">
                {!! Form::text('description', null, ['placeholder' => 'Description','class' => 'validate description']) !!}
                {!! Form::label('description', 'Description') !!}
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" name="action">
                {{ __('Submit') }}
                <i class="material-icons right">send</i>
            </button>
        </div>
        {!! Form::close() !!}
    </div>


    <div id="modalDeleteConfirmation" class="modal">
        <div class="modal-content">
            <h4>{{ __('Delete Category') }}</h4>
            <p>{{ __('Are you sure you want to delete this category?') }}</p>
            {!! Form::open(['route' => ['category.destroy', 0]]) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat green text-white">{{ __('Cancel') }}</a>
            <a href="#!" class="waves-effect waves-green btn-flat red text-white" onclick="$('#modalDeleteConfirmation form').submit()">{{ __('Agree') }}</a>
        </div>
    </div>

    <x-slot name="javascript">
        {{--Update--}}
        <script>
            $(".waves-effect.blue").click( function(e){
                e.preventDefault();
                baseUrl = "{{ route('category.index') }}" + '/';
                id = $(this).data('model');

                $("#modalEdit form").attr("action", baseUrl + id);
                $("#modalEdit input.name").val($(this).data('name'));
                $("#modalEdit input.description").val($(this).data('description'));
                $('#modalEdit').modal('open');
            });
        </script>
        {{--Delete--}}
        <script>
            $(".waves-effect.red").click( function(e){
                e.preventDefault();
                baseUrl = "{{ route('category.index') }}" + '/';
                id = $(this).data('model');

                $("#modalDeleteConfirmation form").attr("action", baseUrl + id);
                $('#modalDeleteConfirmation').modal('open');
            });
        </script>

    </x-slot>
</x-app-layout>

