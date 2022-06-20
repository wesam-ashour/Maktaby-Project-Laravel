@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الشركات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الأقسام</span><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ معلومات القسم </span></span><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 tx-20"></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p tx-20"><span>#</span></th>
                                <th class="wd-lg-20p tx-20"><span>إسم الجزء</span></th>
                                <th class="wd-lg-20p tx-20"><span>النوع</span></th>
                                <th class="wd-lg-20p tx-20"><span>الحالة</span></th>
                                <th class="wd-lg-20p tx-20"><span>الصورة</span></th>
                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Sections as $x)
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $x->sections_name }}</td>
                                <td>{{ $x->type }}</td>
                                <td>{{ $x->status }}</td>
                                <td>
                                    <a href="{{ asset('/images/sections/' . $x->sections_logo) }}"
                                       data-lightbox="roadtrip"><img alt="avatar" class=" avatar-lg mr-2"
                                                                     src="{{ asset('/images/sections/' . $x->sections_logo) }}"></a>
                                </td>
                                <td>
                                    <a href="{{url('get/details/section/')}}/{{$x->id}} "
                                       class="btn btn-sm btn-primary"><i class="las la-eye"></i></a>
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
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>
@endsection
