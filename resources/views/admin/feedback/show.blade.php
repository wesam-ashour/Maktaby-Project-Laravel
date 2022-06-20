@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="my-auto">
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">الأقسام</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/الملاحظات</span><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0"> /{{ $Feedback->feedback_sender_name }}</span></div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-8 col-xl-12 col-xl-12">
            <div class="card">

                <div class="card-body">
                    <div class="email-media">
                        <div class="mt-0 d-sm-flex">
                            <div class="media-body">
                                <div class="float-left d-none d-md-flex fs-15">
                                    <span class="mr-3">{{ date('d-m-Y H:i', strtotime($Feedback->created_at)) }}</span>
                                    <div class="mr-3">
                                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                           aria-expanded="false"><i class="fe fe-more-horizontal  tx-18"
                                                                    data-toggle="tooltip" title=""
                                                                    data-original-title="View more"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Delete</a>
                                            <a class="dropdown-item" href="#">Print</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-title  font-weight-bold mt-3"> اسم المرسل : <span
                                        class="text-muted"> {{ $Feedback->feedback_sender_name }} </span></div>
                                <div class="media-title  font-weight-bold mt-3"> ايميل المرسل : <span
                                        class="text-muted"> {{ $Feedback->feedback_sender_email }} </span></div>
                                <small class="mr-2 d-md-none">Dec 13 , 2018 12:45 pm</small>
                                <small class="mr-2 d-md-none"><i class="fe fe-star text-muted" data-toggle="tooltip"
                                                                 title="" data-original-title="Rated"></i></small>
                                <small class="mr-2 d-md-none"><i class="fa fa-reply text-muted" data-toggle="tooltip"
                                                                 title="" data-original-title="Reply"></i></small>
                            </div>
                        </div>
                    </div>

                    <div class="eamil-body mt-5">
                        <div class="media-title  font-weight-bold mt-3"> الملاحظة :</div>
                        <br>
                        <p>{{ $Feedback->description }}</p>
                    </div>
                    <form method="GET" action="{{ route('feedback.destroy', $Feedback->id) }}">
                        @csrf
                        <div class="card-footer text-left">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <a
                                class="btn btn-danger mt-1 mb-1 show_confirm">
                                <i class="las la-trash">حذف </i>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div></div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
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
@endsection
