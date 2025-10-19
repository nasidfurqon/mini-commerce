@extends('Layout.Header')

@section('content')
    
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 mx-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                <p>{{ session('success') }}</p>
                                            </div>
                                        @endif
                                        
                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="email" name="email" placeholder="Email" required />
                                            <input type="password" name="password" placeholder="Password" required />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                                    <a class="flote-none" id="remember" href="javascript:void(0)">Remember me</a>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                <p>{{ session('success') }}</p>
                                            </div>
                                        @endif
                                        
                                        <form action="{{ route('register') }}" method="post">
                                            @csrf
                                            <input type="text" name="name" placeholder="Name" required />
                                            <input name="email" placeholder="Email" type="email" required />
                                            <input type="password" name="password" placeholder="Password" required />
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection