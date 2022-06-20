@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاماكن للأعضاء</h4>
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
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title mg-b-0 tx-20"> اسم الشركة : {{Auth::user()->company_name}}</h4>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-end">
                            <a href="{{ url(('add/places')) }}" class="btn btn-success mt-3 mr-2">إضافة مكان</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p tx-20"><span>#</span></th>
                                <th class="wd-lg-20p tx-20"><span>إسم المكان</span></th>
                                <th class="wd-lg-20p tx-20"><span>عدد الاقسام</span></th>
                                <th class="wd-lg-20p tx-20"><span>المدينة</span></th>
                                <th class="wd-lg-20p tx-20"><span>صورة</span></th>
                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($places as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->places_name }}</td>
                                    <td>
                                        {{$x->sections_count}}
                                    </td>
                                    <td>{{ $x->city }}</td>
                                    <td>
                                        <a href="{{ asset('/images/places/' . $x->places_logo) }}"
                                           data-lightbox="roadtrip"><img alt="avatar" class=" avatar-lg mr-2"
                                                                         src="{{ asset('/images/places/' . $x->places_logo) }}"></a>
                                    </td>
                                    <td>
                                        <form method="GET" action="{{ route('places.destroy', $x->id) }}">
                                            <a href="{{url('get/details/places/')}}/{{$x->id}} "
                                               class="btn btn-sm btn-primary"><i class="las la-eye"></i></a>
                                            <a href="{{ url(('edit/places/' . $x->id)) }}" class="btn btn-sm btn-info">
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
    @endsection
    @section('content')
        </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
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
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>
@endsection
