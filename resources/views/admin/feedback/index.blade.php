@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="my-auto">
                <div class="d-flex"><h4 class="content-title mb-0 my-auto">الأقسام</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/ الملاحظات</span></div>
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
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm main-content-mail">

        <div class="col-lg-8 col-xl-12 col-xl-12">
            <div class="card">
                <div class="main-content-body main-content-body-mail card-body">
                    <div class="main-mail-header">
                        <div>
                            <h4 class="main-content-title mg-b-5">الملاحظات</h4>
                            <p>لديك {{$Feedback->count()}} من الملاحظات</p>
                        </div>
                        <div>
                        </div>
                    </div><!-- main-mail-list-header -->

                    <div class="main-mail-list">
                        <?php $i = 0; ?>
                        @foreach ($Feedback as $x)
                            <?php $i++; ?>
                            <a class="main-mail-item unread" href="{{url('get/details/feedback/')}}/{{$x->id}} ">
                                <div class="main-mail-checkbox">
                                    <label>{{ $i }}-<span></span></label>
                                </div>
                                <div class="main-mail-body">
                                    <div class="main-mail-from">
                                        <strong>
                                            {{ $x->feedback_sender_name }}
                                        </strong>
                                    </div>
                                    <div class="main-mail-subject">
                                        <span>{{ $x->description }}</span>
                                    </div>
                                </div>
                                <div class="main-mail-date">
                                    {{ date('d-m-Y H:i', strtotime($x->created_at)) }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mg-lg-b-30"></div>
                </div>
            </div>
        </div>
        <div class="main-mail-compose">
            <div>
                <div class="container">
                    <div class="main-mail-compose-box">
                        <div class="main-mail-compose-header">
                            <span>New Message</span>
                            <nav class="nav">
                                <a class="nav-link" href=""><i class="fas fa-minus"></i></a> <a class="nav-link"
                                                                                                href=""><i
                                        class="fas fa-compress"></i></a> <a class="nav-link" href=""><i
                                        class="fas fa-times"></i></a>
                            </nav>
                        </div>
                        <div class="main-mail-compose-body">
                            <div class="form-group">
                                <label class="form-label">To</label>
                                <div>
                                    <input class="form-control" placeholder="Enter recipient's email address"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Subject</label>
                                <div>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write your message here..."
                                          rows="8"></textarea>
                            </div>
                            <div class="form-group mg-b-0">
                                <nav class="nav">
                                    <a class="nav-link" data-toggle="tooltip" href="" title="Add attachment"><i
                                            class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip"
                                                                                 href="" title="Add photo"><i
                                            class="far fa-image"></i></a> <a class="nav-link" data-toggle="tooltip"
                                                                             href="" title="Add link"><i
                                            class="fas fa-link"></i></a> <a class="nav-link" data-toggle="tooltip"
                                                                            href="" title="Emoticons"><i
                                            class="far fa-smile"></i></a> <a class="nav-link" data-toggle="tooltip"
                                                                             href="" title="Discard"><i
                                            class="far fa-trash-alt"></i></a>
                                </nav>
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
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
@endsection
