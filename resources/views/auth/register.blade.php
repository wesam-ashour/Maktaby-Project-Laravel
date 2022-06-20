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
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>مرحباً بك ❤</h2>
                                            <p class="mb-1 tx-16">سجل الآن في منصة مكتبي </p><br>
                                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                                @csrf

                                                <label>إسم مالك الشركة كاملاً</label>
                                                <div class="form-group">
                                                    <input id="name" type="text" class="form-control" name="name">
                                                    @error('name')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>إسم الشركة كاملاً</label>
                                                <div class="form-group">
                                                    <input id="company_name" type="text" class="form-control" name="company_name">
                                                    @error('company_name')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>رقم الهاتف</label>
                                                <div class="form-group">
                                                    <input id="phone" type="text" class="form-control" name="phone">
                                                    @error('phone')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>البريد الإلكتروني</label>
                                                <div class="form-group">
                                                    <input id="email" type="email" class="form-control" name="email">
                                                    @error('email')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>الموقع الإلكتروني</label>
                                                <div class="form-group">
                                                    <input id="website" type="text" class="form-control" name="website">
                                                    @error('website')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>المدينة</label>
                                                <div class="form-group">
                                                    <select id="city" name="city" class="form-control select2-no-search">

                                                        <option value="غزة" @if(old('city') == 1) selected @endif>
                                                            غزة
                                                        </option>
                                                        <option value="جباليا">
                                                            جباليا
                                                        </option>
                                                        <option value="خانيونس">
                                                            خانيونس
                                                        </option>
                                                        <option value="رفح">
                                                            رفح
                                                        </option>
                                                        <option value="دير البلح">
                                                            دير البلح
                                                        </option>
                                                        <option value="بيت لاهيا">
                                                            بيت لاهيا
                                                        </option>
                                                        <option value="بيت حانون">
                                                            بيت حانون
                                                        </option>
                                                    </select>
                                                    @error('city')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>شعار الشركة</label>
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input class="custom-file-input" id="profile_photo_path" name="profile_photo_path" accept="image/*" type="file"> <label class="custom-file-label" for="customFile">شعار الشركة</label>
                                                    </div>
                                                    @error('profile_photo_path')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>كلمة المرور</label>
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control" name="password">
                                                    @error('password')
                                                    <div class="alert-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <label>تأكيد كلمة المرور</label>
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control" name="password_confirmation">
                                                </div>
                                                @error('password')
                                                <div class="alert-danger">{{$message}}</div>
                                                @enderror
                                                <button class="btn btn-main-primary btn-block ">إنشاء الحساب</button>
                                            </form>
                                            <div class="main-signup-footer mt-2">
                                                <p class="mb-1">لديك حساب بالفعل لدينا ؟<a href="{{ url('/' . $page='login') }}"> تسجيل الدخول</a></p>
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
