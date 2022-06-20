@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="my-auto">
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">شركة {{$Companies->company_name}}</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ نعديل معلومات</span></div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm main-content-mail">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1 tx-20">إضافة مكان جديد</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ url('update/company/' . $Companies->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <p><strong>إسم الشركة كاملا:</strong></p>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $Companies->name ? : old('name') }}">
                            @error('name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>إسم مالك الشركة كاملاً:</strong></p>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                   value="{{ $Companies->company_name ? : old('company_name') }}">
                            @error('company_name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>رقم الهاتف:</strong></p>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $Companies->phone ? : old('phone') }}">
                            @error('phone')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>البريد الإلكتروني:</strong></p>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ $Companies->email ? : old('email') }}">
                            @error('email')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>الموقع الإلكتروني:</strong></p>
                            <input type="text" class="form-control" id="website" name="website"
                                   value="{{ $Companies->website ? : old('website') }}">
                            @error('website')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>المدينة:</strong></p>
                            <select id="city" name="city" required autocomplete="city"
                                    class="form-control select2-no-search">
                                <option name="" value="غزة"{{$Companies->city == "غزة" ? 'selected' : ''}}>
                                    غزة
                                </option>
                                <option value="جباليا"{{$Companies->city == "جباليا" ? 'selected' : ''}}>
                                    جباليا
                                </option>
                                <option value="خانيونس"{{$Companies->city == "خانيونس" ? 'selected' : ''}}>
                                    خانيونس
                                </option>
                                <option value="رفح"{{$Companies->city == "رفح" ? 'selected' : ''}}>
                                    رفح
                                </option>
                                <option value="دير البلح"{{$Companies->city == "دير البلح" ? 'selected' : ''}}>
                                    دير البلح
                                </option>
                                <option value="بيت لاهيا"{{$Companies->city == "بيت لاهيا" ? 'selected' : ''}}>
                                    بيت لاهيا
                                </option>
                                <option value="بيت حانون"{{$Companies->city == "بيت حانون" ? 'selected' : ''}}>
                                    بيت حانون
                                </option>
                            </select>
                            @error('city')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p><strong>الصورة:</strong></p>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" id="profile_photo_path" name="profile_photo_path"
                                           type="file"> <label class="custom-file-label"
                                                               for="customFile">{{$Companies->profile_photo_path}}</label>
                                </div>
                                @error('profile_photo_path')
                                <div class="alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div><!-- container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--- Internal Check-all-mail js -->
    <script src="{{URL::asset('assets/js/check-all-mail.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
@endsection
