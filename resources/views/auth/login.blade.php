@extends('layouts.app')

@section('content')
<div class="container login mt-6">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card card_login" id="card-login-color">
                <div class="card-header card-header_login" id="card-header_login">
                    <h3>
                        Login
                    </h3>
                </div>

                <div class="card-body">
                    <div class="forms">
                        <form method="POST" action="{{ route('login') }}" class="forms_contenido" id="forms_contenido_login">
                            @csrf

                            <div class="row mb-12">
                                <div class="col-md-12">
                                    <div class="input">
                                        <input type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="off">
                                        <label for="name">Correo</label>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-12">
                                <div class="col-md-12">
                                    <div class="input">
                                        <input type="password" class="@error('password') is-invalid @enderror" name="password" required="" autocomplete="off">
                                        <label for="name">Contraseña</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>


                            <div class="row d-flex justify-content-end">
                                <div class="d-flex justify-content-end">
                                    <button class="learn-more">
                                        <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text">Ingresar</span>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
