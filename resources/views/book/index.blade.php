<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Books') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col s8">
                <x-validation-errors class="mb-4" :errors="$errors" />

                {!! Form::open(['method' => 'get']) !!}
                    <div class="input-field">
                        <input id="title" name='title' type="search">
                        <label class="label-icon" for="title"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s6">
                        <x-AuthorDropdown />
                    </div>

                    <div class="input-field col s6">
                        <x-CategoryDropdown />
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        {{ __('Submit') }}
                        <i class="material-icons right">filter_list</i>
                    </button>
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
                            <div class="collapsible-header">
                                <div class="title">
                                    <i class="material-icons">book</i>
                                    {{ $model->title }}
                                </div>
                                <div class="borrow">
                                    <a href="#modalBorrow" class="secondary-content {{ ($model->status) ? 'borrow-book' : 'return-book' }}" data-model="{{$model->id}}" ><i class="material-icons">{{ ($model->status) ? 'visibility' : 'visibility_off' }}</i></a>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                <div class="">
                                    <p>{{ __('Published') }}:  {{$model->publish_date}}</p>
                                    <p>{{ __('Author') }}:  {{$model->author->name}}</p>
                                    <p>{{ __('Category') }}:  {{$model->category->name}}</p>
                                </div>
                                <a href="#!" class="waves-effect waves-light btn blue"
                                   data-model="{{$model->id}}"
                                   data-title="{{$model->title}}"
                                   data-pdate="{{$model->publish_date}}"
                                   data-author="{{$model->author_id}}"
                                   data-category="{{$model->category_id}}"
                                ><i class="material-icons left">edit</i>{{ __('Edit') }}</a>
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
        {!! Form::open(['route' => 'book.store']) !!}
        <div class="modal-content">
            <h4>{{ __('Add Category') }}</h4>
            <br>
            <br>
            <div class="input-field col s6">
                {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'validate']) !!}
                {!! Form::label('title', 'Title') !!}
            </div>

            <div class="input-field col s6">
                {!! Form::date('publish_date', null, ['placeholder' => 'Published','class' => 'validate']) !!}
                {!! Form::label('publish_date', 'Published') !!}
            </div>

            <div class="input-field col s6">
                <x-AuthorDropdown />
            </div>

            <div class="input-field col s6">
                <x-CategoryDropdown />
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
        {!! Form::open(['route' => ['book.update', 0]]) !!}
        {!! Form::hidden('_method', 'PUT') !!}
        <div class="modal-content">
            <h4>{{ __('Update Book') }}</h4>
            <br>
            <br>
            <div class="input-field col s6">
                {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'validate title']) !!}
                {!! Form::label('title', 'Title') !!}
            </div>

            <div class="input-field col s6">
                {!! Form::date('publish_date', null, ['placeholder' => 'Published','class' => 'validate publish_date']) !!}
                {!! Form::label('publish_date', 'Published') !!}
            </div>

            <div class="input-field col s6">
                <x-AuthorDropdown />
            </div>

            <div class="input-field col s6">
                <x-CategoryDropdown />
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
            <h4>{{ __('Delete Book') }}</h4>
            <p>{{ __('Are you sure you want to delete this book?') }}</p>
            {!! Form::open(['route' => ['book.destroy', 0]]) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat green text-white">{{ __('Cancel') }}</a>
            <a href="#!" class="waves-effect waves-green btn-flat red text-white" onclick="$('#modalDeleteConfirmation form').submit()">{{ __('Agree') }}</a>
        </div>
    </div>

    <div id="modalBorrow" class="modal">
        {!! Form::open(['route' => ['book.update', 0]]) !!}
        {!! Form::hidden('_method', 'PUT') !!}
        <div class="modal-content">
            <h4>{{ __('Borrow Book') }}</h4>
            <br>
            <br>
            <div class="input-field col s6">
                {!! Form::date('start_date', null, ['placeholder' => 'Date','class' => 'validate start_date']) !!}
                {!! Form::label('start_date', 'Date') !!}
            </div>

            <div class="input-field col s6">
                {!! Form::date('end_date', null, ['placeholder' => 'Return date','class' => 'validate end_date']) !!}
                {!! Form::label('end_date', 'Return date') !!}
            </div>

            <div class="input-field col s6">
                <x-UserDropdown />
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

    <div id="modalReturn" class="modal">
        <div class="modal-content">
            <h4>{{ __('Return Book') }}</h4>
            <p>{{ __('The book was returned?') }}</p>
            {!! Form::open(['route' => ['book.update', 0]]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat text-white">{{ __('No') }}</a>
            <a href="#!" class="waves-effect waves-green btn-flat green text-white" onclick="$('#modalReturn form').submit()">{{ __('Yes') }}</a>
        </div>
    </div>

    <x-slot name="javascript">
        {{--Update--}}
        <script>
            $(".waves-effect.blue").click( function(e){
                e.preventDefault();
                baseUrl = "{{ route('book.index') }}" + '/';
                id = $(this).data('model');
                authorSelect = $("#modalEdit select.author_id");
                categorySelect = $("#modalEdit select.category_id");

                $("#modalEdit form").attr("action", baseUrl + id);
                $("#modalEdit input.title").val($(this).data('title'));
                $("#modalEdit input.publish_date").val($(this).data('pdate'));
                authorSelect.val($(this).data('author'));
                categorySelect.val($(this).data('category'));
                authorSelect.formSelect();
                categorySelect.formSelect();

                $('#modalEdit').modal('open');
            });
        </script>
        {{--Delete--}}
        <script>
            $(".waves-effect.red").click( function(e){
                e.preventDefault();
                baseUrl = "{{ route('book.index') }}" + '/';
                id = $(this).data('model');

                $("#modalDeleteConfirmation form").attr("action", baseUrl + id);
                $('#modalDeleteConfirmation').modal('open');
            });
        </script>
        {{--Borrow--}}
        <script>
            $(".borrow-book").click( function(e){
                e.preventDefault();
                baseUrl = "borrow/book/";
                id = $(this).data('model');

                $("#modalBorrow form").attr("action", baseUrl + id);

                $('#modalBorrow').modal('open');
            });
        </script>
        {{--Return--}}
        <script>
            $(".return-book").click( function(e){
                e.preventDefault();
                baseUrl = "return/book/";
                id = $(this).data('model');

                $("#modalReturn form").attr("action", baseUrl + id);
                $('#modalReturn').modal('open');
            });
        </script>
    </x-slot>
</x-app-layout>

