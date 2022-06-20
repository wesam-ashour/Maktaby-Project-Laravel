@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet"/>
@endsection
@section('title')

@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاقسام للاعضاء</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل القسم</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    القسم</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">اسم القسم :</th>
                                                        <td>{{ $sections->sections_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">السعر :</th>
                                                        <td>{{ $sections->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">العنوان :</th>
                                                        <td>{{ $sections->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">النوع :</th>
                                                        <td>{{ $sections->type }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">الوصف :</th>
                                                        <td>{{ $sections->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">الصورة :</th>
                                                        <td>
                                                            <a href="{{ asset('/images/sections/' . $sections->sections_logo) }}"
                                                               data-lightbox="roadtrip"><img alt="avatar"
                                                                                             class=" avatar-lg mr-2"
                                                                                             src="{{ asset('/images/sections/' . $sections->sections_logo) }}"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">الميزات :</th>
                                                        <td> @if ($sections->services )
                                                                {{ $sections->services }}
                                                            @else
                                                                <span class="label text-warning menu-right">لا يوجد ميزات متوفرة</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">الحالة :</th>
                                                        <td>@if ($sections->status == 'نشط')
                                                                <span
                                                                    class="label text-success menu-right">{{ $sections->status }}</span>
                                                            @elseif($sections->status == 'غير نشط')
                                                                <span
                                                                    class="label text-danger menu-right">{{ $sections->status }}</span>
                                                            @else
                                                                <span
                                                                    class="label text-warning menu-right">{{ $sections->status }}</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">تاريخ الحجز :</th>
                                                        <td> @if ($sections->date )
                                                                {{ $sections->date }}
                                                            @else
                                                                <span class="label text-warning menu-right">لا يوجد تاريخ حجز مسبق</span>
                                                            @endif</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>
    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>

@endsection
