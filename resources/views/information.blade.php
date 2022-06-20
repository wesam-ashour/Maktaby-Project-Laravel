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
    بيانات المستخدم
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">لوحة التحكم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    بيانات المستخدم</span>
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
                                                    المسخدم</a></li>

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
                                                        <th scope="row">اسم المستخدم :</th>
                                                        <td>{{ $UserData->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">اسم الشركة :</th>
                                                        <td>{{ $UserData->company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">رقم الهاتف :</th>
                                                        <td>{{ $UserData->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">بريد الالكتروني للمستخدم :</th>
                                                        <td>{{ $UserData->email }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">الموقع الالكتروني :</th>
                                                        <td>{{ $UserData->website }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">المدينة :</th>
                                                        <td>{{ $UserData->city }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">شعار الشركة :</th>
                                                        <td>

                                                            <a href="{{ asset('/images/users/' . $UserData->profile_photo_path) }}"
                                                               data-lightbox="roadtrip"><img alt="avatar"
                                                                                             class="rounded-circle avatar-md mr-2"
                                                                                             src="{{ asset('/images/users/' . $UserData->profile_photo_path) }}"></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">الحالة :</th>
                                                        <td>


                                                            @if ($UserData->Status == 'نشط')
                                                                <span
                                                                    class="label text-success menu-right">{{ $UserData->Status }}</span>
                                                            @elseif($UserData->Status == 'غير نشط')
                                                                <span
                                                                    class="label text-danger menu-right">{{ $UserData->Status }}</span>
                                                            @else
                                                                <span
                                                                    class="label text-warning menu-right">{{ $UserData->Status }}</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">تاريخ انشاء الحساب :</th>
                                                        <td>
                                                            {{--                                                            <span class="badge badge badge-primary">--}}
                                                            {{--                                                            {{ $UserData->created_at->format('d-m-Y')}}--}}
                                                            {{--                                                            </span>--}}
                                                            <span class="btn btn-primary">
                                                            {{ $UserData->created_at->format('d-m-Y')}}
                                                            </span>
                                                        </td>
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
