@extends('layouts.master')
@section('css')

@endsection
<link href="{{ URL::asset('lightbox/css/lightbox.css') }}" rel="stylesheet"/>

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الشركات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
    <!-- Start Table -->

    <!-- End Table -->
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title tx-20 mg-b-0">جدول الشركات</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-20p tx-20"><span>#</span></th>
                                <th class="wd-lg-20p tx-20"><span>شعار الشركة</span></th>
                                <th class="wd-lg-20p tx-20"><span>إسم الشركة</span></th>
                                <th class="wd-lg-20p tx-20"><span>المدينة</span></th>
                                <th class="wd-lg-20p tx-20"><span>رقم الهاتف</span></th>
                                <th class="wd-lg-20p tx-20"><span>الحالة</span></th>
                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Company as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>

                                        <a href="{{ asset('/images/users/' . $x->profile_photo_path) }}"
                                           data-lightbox="roadtrip"><img alt="avatar"
                                                                         class="rounded-circle avatar-md mr-2"
                                                                         src="{{ asset('/images/users/' . $x->profile_photo_path) }}"></a>
                                    </td>

                                    <td>{{ $x->company_name }}</td>

                                    <td>{{ $x->city }}</td>
                                    <td>{{ $x->phone }}</td>
                                    <td>
                                        @if ($x->Status == 'نشط')
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{ $x->Status }}
                                            </span>
                                        @elseif ($x->Status == 'غير نشط')
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{ $x->Status }}
                                            </span>
                                        @else
                                            <span class="label text-warning d-flex">
                                                <div class="dot-label bg-warning ml-1"></div>{{ $x->Status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('get/details/company/places/')}}/{{$x->id}} "
                                           class="btn btn-sm btn-primary"><i class="las la-eye"></i></a>

                                        <a href="{{ url(('edit/companies/' . $x->id)) }}" class="btn btn-sm btn-info">
                                            <i class="las la-pen"></i>
                                        </a>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('lightbox/js/lightbox.js') }}"></script>
@endsection
