@extends('layouts.master')
@section('css')
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
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة مكان</span></div>
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
                    <form class="form-horizontal" method="POST" action="{{ url('update/places/' . $Places->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="places_name" name="places_name"
                                   value="{{ $Places->places_name ? : old('places_name') }}" placeholder="الإسم">
                            @error('places_name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <input type="hidden" class="form-control" id="address" name="address"
                                   placeholder="العنوان على الخريطة" value="{{ $Places->address ? : old('places_name') }}">
                            <!-- hiding -->
                            <div width="300" hieght="400" style="width:100%;height: 300px;" id="map"></div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                    crossorigin="anonymous">
                            </script>
                            <script>
                                $(document).ready(function () {

                                });

                            </script>
                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj3FCd3ajWDAc-jH9Ei4oSgRFyIbHXAH4&callback=initMap&v=weekly"
                                defer>
                            </script>
                            @error('address')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" placeholder="وصف المكان"
                                      rows="3">{{ $Places->description ? : old('description') }}</textarea>
                            @error('description')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-control select2-no-search" id="city" name="city">
                                <option value="غزة"{{$Places->city == "غزة" ? 'selected' : ''}}>
                                    غزة
                                </option>
                                <option value="جباليا"{{$Places->city == "جباليا" ? 'selected' : ''}}>
                                    جباليا
                                </option>
                                <option value="خانيونس"{{$Places->city == "خانيونس" ? 'selected' : ''}}>
                                    خانيونس
                                </option>
                                <option value="رفح"{{$Places->city == "رفح" ? 'selected' : ''}}>
                                    رفح
                                </option>
                                <option value="دير البلح"{{$Places->city == "دير البلح" ? 'selected' : ''}}>
                                    دير البلح
                                </option>
                                <option value="بيت لاهيا"{{$Places->city == "بيت لاهيا" ? 'selected' : ''}}>
                                    بيت لاهيا
                                </option>
                                <option value="بيت حانون"{{$Places->city == "بيت حانون" ? 'selected' : ''}}>
                                    بيت حانون
                                </option>
                            </select>
                            @error('city')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" accept="image/*" id="imgInp"
                                       onchange="preview_image(event)" name="places_logo" type="file"
                                       value="{{ $Places->places_logo ? : old('places_logo') }}">
                                <label
                                    class="custom-file-label"
                                    for="customFile">{{ $Places->places_logo ? : old('places_logo') }}
                                </label>
                            </div>
                            @error('sections_logo')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <br>
                        <img id="output_image" src="{{ asset('/images/places/' . $Places->places_logo) }}"/>
                        <br>
                        <br>

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
@endsection
