@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="my-auto">
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">الميزات</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض</span></div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
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
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 tx-20">المميزات</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p tx-20"><span>#</span></th>
                                <th class="wd-lg-20p tx-20"><span>إسم الميزة</span></th>
                                <th class="wd-lg-20p tx-20"><span>الوصف</span></th>
                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Services as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->service_name }}</td>
                                    <td>{{ $x->description }}</td>
                                    <td>
                                        <form method="GET" action="{{ route('services.destroy', $x->id) }}">
                                        <a href="{{ url(('edit/services/' . $x->id)) }}" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a
                                                class="btn btn-sm btn-danger show_confirm">
                                                <i class="las la-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed  -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `هل أنت متأكد أنك تريد حذف هذا السجل؟`,
                text: "إذا قمت بحذف هذا ، فسيختفي إلى الأبد.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endsection
