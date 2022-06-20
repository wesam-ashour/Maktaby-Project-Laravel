@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ لوحة التحكم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection
@section('content')

    @can('مستخدم جديد')
        <div class="row row-sm">
            <div class="col-md-12 col-xl-12 ">
                <div class=" main-content-body-invoice">
                    <div class="card card-invoice">
                        <div class="card-body">
                            <div class="invoice-header" style="margin-left:460px">
                                <h1 class="content-title mb-0 my-auto">تفاصيل الإشتراك</h1>
                            </div><!-- invoice-header -->

                            <div class="table-responsive mg-t-40">
                                <table class="table table-invoice border text-md-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="wd-20p tx-bold   ">نوع الإشتراك</th>
                                        <th class="wd-40p">الوصف</th>
                                        <th class="tx-right">الصلاحية</th>
                                        <th class="tx-right">السعر</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>شهري</td>
                                        <td class="tx-12">إشتراك شهري مدته 30 يوم مع صلاحية إضافة 3 أماكن بحد أقصى
                                            وإضافة 10 أقسام في كل مكان
                                        </td>
                                        <td class="tx-right">30 + 3</td>
                                        <td class="tx-right">$ 100.00</td>
                                    </tr>
                                    <tr>
                                        <td>سنوي</td>
                                        <td class="tx-12">إشتراك سنيو صالح لمدة 365 يوم مع صلاحية إضافة 5 أماكن بحد أقصى
                                            وإضافة 10 أقسام في كل مكان...
                                        </td>
                                        <td class="tx-right">365 + 20</td>
                                        <td class="tx-right">$ 1,000.00</td>
                                    </tr>
                                    <tr>
                                        <td>إشتراك مخصص</td>
                                        <td class="tx-12">إشتراك لعدد محدد من الأيام</td>
                                        <td class="tx-right">---</td>
                                        <td class="tx-right">$ 5 * عدد الأيام</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="mg-b-40">

                            <a href="tel:+97259999999" class="btn btn-success float-left mt-3">تواصل هنا
                                <i class="mdi mdi-phone ml-1"></i></a>

                            {{--                            <a href="#" class="btn btn-success float-left mt-3">--}}
                            {{--                                تواصل هنا <i class="mdi mdi-phone ml-1"></i>--}}
                            {{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
    @endcan

    @can('مستخدم غير فعال')

        <div class="card text-center">
            <div class="card-header">
                Alert
            </div>
            <div class="card-body">
                <h5 class="card-title">HI SIR YOUR ACCOUNT NOT WORK CURRENTLY</h5>
                <p class="card-text">Please contact us with email and wait 24 Hours to check your email</p>
                <a href="#" class="btn btn-primary">Send new email</a>
            </div>

        </div>
    @endcan



    @can('لوحة تحكم المسؤول')
        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-20 font-weight-bold text-white text-center">الشركات</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$Companies->count()}}
                                        شركة </h4>
                                    <p class="mb-0 tx-14 text-white op-7">عدد الشركات المشتركة في المنصة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-20 font-weight-bold text-white text-center">الشركات النشطة</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$CompanyActive->count()}}
                                        شركة </h4>
                                    <p class="mb-0 tx-14 text-white op-7">عدد الشركات النشطة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-20 font-weight-bold text-white text-center">الملاحظات</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$Feedback->count()}}
                                        ملاحظة</h4>
                                    <p class="mb-0 tx-12 text-white op-7">حافظة الملاحظات</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>

        <!--Row-->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0 tx-20">الإشتراكات الجديدة</h4>
                            <div class="d-flex justify-content-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top userlist-table">
                            <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-lg-20p tx-20"><span>#</span></th>
                                    <th class="wd-lg-20p tx-20"><span>إسم الشركة</span></th>
                                    <th class="wd-lg-20p tx-20"><span>إسم المالك</span></th>
                                    <th class="wd-lg-20p tx-20"><span>رقم الهاتف</span></th>
                                    <th class="wd-lg-20p tx-20">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($Data as $x)

                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $x->company_name }}</td>

                                        <td>{{ $x->name }}</td>

                                        <td>{{ $x->phone }}</td>
                                        <td>
                                            <a href="{{url('get/details/user/')}}/{{$x->id}} "
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
    @endcan

    @can('لوحة تحكم المستخدم')
        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-20 font-weight-bold text-white text-center">مساحات العمل غير نشطة</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$SectionsNotActive->count()}}
                                        قسم </h4>
                                    <p class="mb-0 tx-14 text-white op-7">عدد مساحات العمل غير نشطة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-20 font-weight-bold text-white text-center">مساحات العمل المحجوزة</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$SectionsActive->count()}}
                                        قسم </h4>
                                    <p class="mb-0 tx-14 text-white op-7">عدد مساحات العمل نشطة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- row closed -->
        </div>

        <!--Row-->
        <div class="row row-sm">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0 tx-20">اخر الأماكن المضافة</h4>
                            <div class="d-flex justify-content-end">
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
                                    <th class="wd-lg-20p tx-20"><span>عدد الأقسام</span></th>
                                    <th class="wd-lg-20p tx-20"><span>المدينة</span></th>
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

                                        <td>{{$x->sections_count}}</td>

                                        <td>{{ $x->city }}</td>
                                        <td>
                                            <a href="{{url('get/details/places/')}}/{{$x->id}} "
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

        </div>
        <!-- row closed  -->
        @endcan


        </div></div>
        @endsection
        @section('js')
        @endsection
