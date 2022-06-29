@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white" style="margin-right: 400px">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/logoo2.svg')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"></h1></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>مرحبا ❤</h2>
                                            <h5 class="font-weight-semibold mb-4">من فضلك سجل دخولك للمتابعة.</h5>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>البريد الالكتروني</label>
                                                    <input id="email" type="email" class="form-control" name="email">

                                                </div>

                                                <div class="form-group">
                                                    <label>كلمة المرور</label>

                                                    <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">



                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل دخول') }}
                                                </button>
                                            </form>
                                            <div class="main-signin-footer mt-5 text-right">
                                                <p>
                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                            {{ __('نسيت كلمة المرور؟') }}
                                                        </a>
                                                   </p>
                                                <p class="text-right">ليس لديك حساب؟ <a href="{{ url('/' . $page='register') }}">إنشاء حساب الان</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
