@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
          rel="stylesheet">
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
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2></h2>
                                            <h5 class="font-weight-semibold mb-4">لإعادة تعيين كلمة السر الخاصة بك . .
                                                !</h5>
                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                                @if (session('status'))
                                                    <div class="mb-4 font-medium text-sm text-green-600">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label>البريد الإلكتروني</label> <input class="form-control"
                                                                                            placeholder="البريد الإلكتروني"
                                                                                            type="email" name="email"
                                                                                            value="{{old('email')}}"
                                                                                            autofocus>
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('إعادة تعيين كلمة المرور') }}
                                                </button>
                                            </form>

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
