<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('icons/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/estilos.css')}}">
    <title>منصة مكتبي</title>
    <!-- Internal Data table css -->

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
</head>
<body>

<div class="container py-5">
    <nav id="navFixed" class="navbar fixed-top navbar-expand-lg navbar-light bg-light p-10px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <img src="{{URL::asset('assets/img/Logoo.svg')}}" width="500px" height="45px">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link scroll current" href="{{ url('/workspaces') }}">مساحات العمل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">شركاؤنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">الخريطة</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">خدماتنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="{{ url('/') }}">الرئيسية</a>
                </li>
            </ul>
        </div>
    </nav>

</div>


<div class="container mt-2 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 mt-1">
            @foreach ($sections as $x)
                <div class="row p-2 bg-white border rounded mt-2">
                    <div class="align-items-center align-content-center col-md-3 mt-1 border-right">
                        <div class=" flex-row align-items-center">
                            <h4 class="mr-1 text-center">$السعر: {{$x->price}}</h4>
                        </div>
                        <h6 class="text-success text-center">
                            @if ($x->status == 'نشط')
                                <span
                                    class="label text-success menu-right">الحالة : {{ $x->status }}</span>
                            @elseif($x->status == 'غير نشط')
                                <span
                                    class="label text-danger menu-right">الحالة : {{ $x->status }}</span>
                            @else
                                <span
                                    class="label text-warning menu-right">{{ $x->status }}</span>
                            @endif
                            <br>
                            <br>
                            <span>@if ($x->date )
                                    القسم محجوز حتى :
                                    {{ $x->date }}
                                @else
                                    <span class="label text-danger menu-right">لا يوجد حجز للقسم حالياً</span>
                                @endif</span>
                        </h6>
                        <div class="d-flex flex-column mt-4">
                            <a class="btn btn-primary btn-sm" href="{{url('guest/get/details/section/')}}/{{$x->id}} ">
                                <button class="btn btn-primary btn-sm" type="button">التفاصيل</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <h5 class="text-right">{{$x->sections_name}}</h5>

                        <p class="text-right text-truncate para mb-0">{{$x->description}} : الوصف<br></p>
                        <div class="mt-1 mb-1 spec-1 text-right">
                            <span class="dot"> : الميزات المتوفرة
                                <br>
                                <span class="text-green-600">@if ($x->services )
                                        {{ $x->services }}
                                    @else
                                        <span class="label text-warning menu-right">لا يوجد ميزات متوفرة حالياً</span>
                                    @endif</span>
                        </div>
                    </div>
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                    src="{{ asset('/images/sections/' . $x->sections_logo) }}">

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<footer class="footer">

    <div class="boxTextFooter">

        <p><span class="icon-heart"></span> منصة مكتبي </p>
    </div>
</footer>
</body>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
</html>
