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
                    <h4 class="card-title mb-1 tx-20">تعديل القسم</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ url('update/sections/' . $sections->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <p><strong>الإسم:</strong></p>
                            <input type="text" class="form-control" name="sections_name" id="sections_name"
                                   placeholder="الإسم" value="{{ $sections->sections_name ? : old('sections_name') }}">
                            @error('sections_name')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>السعر:</strong></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input aria-label="Amount (to the nearest dollar)" name="price" id="price"
                                       class="form-control" type="text" value="{{ $sections->price ? : old('price') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00/ شهر </span>
                                </div>
                            </div><!-- input-group -->
                            @error('price')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>العنوان على الخريطة :</strong></p>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="العنوان على الخريطة"
                                   value="{{ $sections->address ? : old('address') }}">
                            @error('address')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>نوع مساحة العمل :</strong></p>
                            <select class="form-control select2-no-search" id="type" name="type">
                                <option value="مكتب مخصص" {{$sections->city == "مكتب مخصص" ? 'selected' : ''}}>
                                    مكتب مخصص
                                </option>
                                <option value="مكتب قياسي" {{$sections->city == "مكتب قياسي" ? 'selected' : ''}}>
                                    مكتب قياسي
                                </option>
                                <option value="جناح المكتب" {{$sections->city == "جناح المكتب" ? 'selected' : ''}}>
                                    جناح المكتب
                                </option>
                                <option
                                    value="مكتب طابق كامل" {{$sections->city == "مكتب طابق كامل" ? 'selected' : ''}}>
                                    مكتب طابق كامل
                                </option>
                                <option value="غرفة إجتماعات" {{$sections->city == "غرفة إجتماعات" ? 'selected' : ''}}>
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
                                      placeholder="وصف مساحة العمل"
                                      rows="3">{{ $sections->description ? : old('description') }}</textarea>
                            @error('description')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <p><strong>أضف صورة مساحة العمل :</strong></p>
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" accept="image/*" id="imgInp"
                                       onchange="preview_image(event)" name="sections_logo" type="file"
                                       value="{{ $sections->sections_logo ? : old('sections_logo') }}">
                                <label
                                    class="custom-file-label"
                                    for="customFile">{{ $sections->sections_logo ? : old('sections_logo') }}
                                </label>
                            </div>
                            @error('sections_logo')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <img id="output_image" src="{{ asset('/images/sections/' . $sections->sections_logo) }}"/>
                        <br>
                        <br>

                        <p><strong>الميزات المتوفرة :</strong></p>
                        <div class="row">

                            @foreach($services as $x)
                                <div class="col-lg-2">
                                    <label class="ckbox"><input id="services" name="services[]"
                                                                value="{{ $x->service_name }}"
                                                                @if(!old() || old('services')) checked="checked"
                                                                @endif
                                                                type="checkbox"><span>{{ $x->service_name }}</span></label>
                                </div>
                            @endforeach

                        </div>
                        <br>
                        <p><strong>حالة القسم :</strong></p>
                        <div class="row mg-t-20">

                            <div class="col-lg-2">
                                <label class="dosbox"><input name="status" id="status" type="radio" value="نشط"> <span>نشط</span></label>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <label class="dosbox"><input checked name="status" id="status" type="radio"
                                                             value="غير نشط">
                                    <span>غير نشط حالياً</span></label>
                            </div>
                            @error('status')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <p><strong>تاريخ نهاية الحجز :</strong></p>
                            <input class="form-control fc-datepicker" id="date" name="date" placeholder="YYYY-MM-DD"
                                   type="text" value="{{ $sections->date ? : old('date') }}">
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                            @error('date')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
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
