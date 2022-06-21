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
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">{{Auth::user()->company_name}} /</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">الاقسام</span><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة مساحة عمل</span></div>
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
                    <h4 class="card-title mb-1 tx-20">إضافة قسم جديد</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ url('store/sections/' . $places->id) }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <p><strong>الإسم :</strong></p>
                            <input type="text" class="form-control" name="sections_name" id="sections_name"
                                   placeholder="الإسم">
                            @error('sections_name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <p><strong>السعر :</strong></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input aria-label="Amount (to the nearest dollar)" name="price" id="price"
                                       class="form-control" type="text">
                                <div class="input-group-append">
                                    <span class="input-group-text">/ شهر </span>
                                </div>

                            </div><!-- input-group -->
                            @error('price')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>المدينة:</strong></p>
                            <div class="form-group">
                                <select class="form-control select2-no-search" id="address" name="address">
                                    <option label="حدد المدينة التي يتواجد فيها القسم"
                                            @if(old('address') == 1) selected @endif>
                                    </option>
                                    <option value="غزة">
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
                            @error('address')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>نوع مساحة العمل :</strong></p>
                            <select class="form-control select2-no-search" id="type" name="type">
                                <option label="نوع مساحة العمل">
                                </option>
                                <option value="مكتب مخصص" @if(old('type') == 1) selected @endif>
                                    مكتب مخصص
                                </option>
                                <option value="مكتب قياسي">
                                    مكتب قياسي
                                </option>
                                <option value="جناح المكتب">
                                    جناح المكتب
                                </option>
                                <option value="مكتب طابق كامل">
                                    مكتب طابق كامل
                                </option>
                                <option value="غرفة إجتماعات">
                                    غرفة إجتماعات
                                </option>
                            </select>
                            @error('type')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p><strong>وصف مساحة العمل :</strong></p>
                            <textarea class="form-control" name="description" id="description"
                                      placeholder="وصف مساحة العمل" rows="3"></textarea>
                            @error('description')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>أضف صورة مساحة العمل :</strong></p>
                            <div class="custom-file">
                                <input class="custom-file-input" accept="image/*" onchange="preview_image(event)"
                                       name="sections_logo" type="file">
                                <label
                                    class="custom-file-label" for="customFile">أضف صورة مساحة العمل</label>

                            </div>
                            @error('sections_logo')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <br>
                        <img id="output_image"/>
                        <br>
                        <br>
                        <p><strong>الميزات المتوفرة :</strong></p>
                        <div class="row">

                            @foreach($services as $x)
                                <div class="col-lg-2">
                                    <label class="ckbox"><input id="services" name="services[]"
                                                                value="{{ $x->service_name }}"
                                                                type="checkbox"><span>{{ $x->service_name }}</span></label>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <p><strong>حالة القسم :</strong></p>
                        <div class="row mg-t-20">

                            <div class="col-lg-2">
                                <label class="dosbox"><input name="status" id="status" type="radio" value="نشط"
                                                             required> <span>نشط</span></label>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <label class="dosbox"><input checked name="status" id="status" type="radio"
                                                             value="غير نشط" required>
                                    <span>غير نشط حالياً</span></label>
                            </div>
                            @error('status')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>تاريخ نهاية الحجز :</strong></p>
                            <input class="form-control fc-datepicker" id="date" name="date" placeholder="YYYY-MM-DD"
                                   type="text">
                            @error('date')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
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
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
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
