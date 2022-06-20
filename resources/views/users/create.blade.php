@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
    اضافة مستخدم
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                مستخدم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
                        </div>
                    </div><br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('users.store','test')}}" method="post">
                        {{csrf_field()}}
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>إسم مالك الشركة كاملا : <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                            name="name" type="text">
                                </div>

                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>إسم الشركة كاملا: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           name="company_name" type="text">
                                </div>

                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>رقم الهاتف: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                            name="phone" type="text">
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                           name="email"  type="email">
                                </div>

                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>الموقع الالكتروني: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20"
                                            name="website"  type="text">
                                </div>
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>المدينة: <span class="tx-danger">*</span></label>
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
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       name="password"  type="password">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       name="confirm-password"  type="password">
                            </div>

                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label">حالة المستخدم</label>
                                <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                    <option value="نشط">نشط</option>
                                    <option value="غير نشط">غير نشط</option>
                                </select>
                            </div>

                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> صلاحية المستخدم</label>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection
