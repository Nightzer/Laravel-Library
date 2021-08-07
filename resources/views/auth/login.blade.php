<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2 ">

                <div class="card card-login ">
                    <div class="card-login-splash">
                        <div class="wrapper">
                            <h3>Account</h3>
                            <a class="btn" href="{{ route('register') }}">Register</a>
                            <a class="btn" href="{{ route('register') }}">Register</a>
                        </div>
                        {!! Html::image('https://placekitten.com/g/300/300',__('Logo')) !!}
                    </div>
                    <div class="card-content">
                        <span class="card-title">Log In</span>
                        {!! Form::open(['route' => 'login']) !!}
                            <div class="input-field">
                                {!! Form::email('email', null, ['placeholder' => 'Username','class' => 'validate']) !!}
                                {!! Form::label('email') !!}
                            </div>
                            <div class="input-field">
                                {!! Form::password('password', null, ['placeholder' => 'Password','class' => 'validate']) !!}
                                {!! Form::label('password') !!}
                            </div>

                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                            <!-- Validation Errors -->
                            <x-validation-errors class="mb-4" :errors="$errors" />

                            <br><br>
                            <div>
                                <input class="btn right" type="submit" value="Log In">
                                <a href="#!" class="btn-flat">Back</a>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-guest-layout>
