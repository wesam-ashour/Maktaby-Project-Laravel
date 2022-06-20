@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاقسام للأعضاء</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"></span><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"></span></span><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                        <div class="d-flex justify-content-start">
                            <a href="{{ url(('add/sections/' . $places->id)) }}" class="btn btn-success mt-3 mr-2">إضافة قسم</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p tx-20"><span>#</span></th>
                                <th class="wd-lg-20p tx-20"><span>إسم القسم</span></th>
                                <th class="wd-lg-20p tx-20"><span>النوع</span></th>
                                <th class="wd-lg-20p tx-20"><span>الحالة</span></th>
                                <th class="wd-lg-20p tx-20"><span>الصورة</span></th>
                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($sections as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->sections_name }}</td>
                                    <td>{{ $x->type }}</td>
                                    <td>{{ $x->status }}</td>

                                    <td>
                                        <a href="{{ asset('/images/sections/' . $x->sections_logo) }}" data-lightbox="roadtrip"><img alt="avatar" class=" avatar-lg mr-2"
                                                         src="{{ asset('/images/sections/' . $x->sections_logo) }}"></a>
                                    </td>
                                    <td>
                                        <form method="GET" action="{{ route('sections.destroy', $x->id) }}">
                                        <a href="{{url('user/get/details/section/')}}/{{$x->id}} "
                                           class="btn btn-sm btn-primary"><i class="las la-eye"></i></a>
                                        <a href="{{ url(('edit/sections/' . $x->id)) }}" class="btn btn-sm btn-info">
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
            <div class="modal" id="modaldemo9">
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
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>
@endsection
