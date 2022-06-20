@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الشركات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الأقسام</span><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
            </div>
        </div>
    </div>

    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">

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

                                <th class="wd-lg-20p tx-20">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php $i = 0; ?>
                                @foreach ($Places as $x)
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->places_name }}</td>
                                    <td>{{$x->sections_count}}</td>
                                    <td>{{ $x->city }}</td>
                                    <td>
                                        <a href="{{url('get/details/company/sections/')}}/{{$x->id}} "
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
@endsection
