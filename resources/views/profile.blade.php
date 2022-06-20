@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet" />
    <style>
        body {
            width: 100%;
            margin: 0 auto;
            padding: 0px;
            font-family: helvetica;
            background-color: #0B3861;
        }

        #wrapper {
            text-align: center;
            margin: 0 auto;
            padding: 0px;
            width: 995px;
        }

        #output_image {
            max-width: 40%;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="my-auto">
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">{{Auth::user()->company_name}}</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/الملف الشخصي</span><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل</span></div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @if (session('success-create'))
        <div class="alert alert-success">
            {{ session('success-create') }}
        </div>
    @endif
    @if (session('success-edit'))
        <div class="alert alert-info">
            {{ session('success-edit') }}
        </div>
    @endif
    @if (session('success-delete'))
        <div class="alert alert-danger">
            {{ session('success-delete') }}
        </div>
    @endif
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm main-content-mail">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1 tx-20">تعديل الملف الشخصي</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ url('update/profile/' . $User->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <p><strong>إسم الشركة كاملا:</strong></p>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $User->name ? : old('name') }}">
                            @error('name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>إسم مالك الشركة كاملاً:</strong></p>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                   value="{{ $User->company_name ? : old('company_name') }}">
                            @error('company_name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>رقم الهاتف:</strong></p>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $User->phone ? : old('phone') }}">
                            @error('phone')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>البريد الإلكتروني:</strong></p>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ $User->email ? : old('email') }}">
                            @error('email')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>الموقع الإلكتروني:</strong></p>
                            <input type="text" class="form-control" id="website" name="website"
                                   value="{{ $User->website ? : old('website') }}">
                            @error('website')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>المدينة:</strong></p>
                            <select id="city" name="city" required autocomplete="city"
                                    class="form-control select2-no-search">
                                <option name="" value="غزة"{{$User->city == "غزة" ? 'selected' : ''}}>
                                    غزة
                                </option>
                                <option value="جباليا"{{$User->city == "جباليا" ? 'selected' : ''}}>
                                    جباليا
                                </option>
                                <option value="خانيونس"{{$User->city == "خانيونس" ? 'selected' : ''}}>
                                    خانيونس
                                </option>
                                <option value="رفح"{{$User->city == "رفح" ? 'selected' : ''}}>
                                    رفح
                                </option>
                                <option value="دير البلح"{{$User->city == "دير البلح" ? 'selected' : ''}}>
                                    دير البلح
                                </option>
                                <option value="بيت لاهيا"{{$User->city == "بيت لاهيا" ? 'selected' : ''}}>
                                    بيت لاهيا
                                </option>
                                <option value="بيت حانون"{{$User->city == "بيت حانون" ? 'selected' : ''}}>
                                    بيت حانون
                                </option>
                            </select>
                            @error('city')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p><strong>شعار الشركة :</strong></p>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" id="profile_photo_path" name="profile_photo_path"
                                           onchange="preview_image(event)" accept="image/*" type="file"
                                           value="{{ $User->profile_photo_path ? : old('profile_photo_path') }}"> <label
                                        class="custom-file-label"
                                        for="customFile">{{$User->profile_photo_path}}</label>
                                </div>
                                @error('profile_photo_path')
                                <div class="alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <br>
                            <a href="{{ asset('/images/users/' . $User->profile_photo_path) }}" data-lightbox="roadtrip">
                            <img id="output_image" alt="avatar" class=" avatar-lg mr-2" data-lightbox="roadtrip" src="{{ asset('/images/users/' . $User->profile_photo_path) }}"/>
                            </a>
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
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
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script>
        function preview_image(event) {

            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image');

                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);

        }
    </script>
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>
@endsection
