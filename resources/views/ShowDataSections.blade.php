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
    <title>workspaces</title>

    <style>
        body {
            font-family: 'open sans';
            overflow: hidden;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            text-align: right;
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em;
            height: 500px;
            width: 1000px;

        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            font-weight: bold;
        }

        .checked,
        .price span {
            color: #17A2B8;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            /*margin-right: 10px;*/
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #17A2B8;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #17A2B8;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #17A2B8;
        }

        .green {
            background: #17A2B8;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
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

<div class="container mb-5">
    <div class="d-flex justify-content-center row">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">

                    <div class="details col-md-6">
                        <h3 class="product-title text-right mt-5"> {{ $sections->sections_name }} </h3>

                        <p class="product-description text-right">{{ $sections->description }} </p>
                        <h4 class="price text-right">نوع مساحة العمل :<span>{{ $sections->type }}</span></h4>
                        <h4 class="price text-right">السعر :<span> ${{ $sections->price }}</span></h4>
                        <h5 class="sizes text-right">المميزات :
                            <span class="size text-right" data-toggle="tooltip">@if ($sections->services )
                                    {{ $sections->services }}
                                @else
                                    <span class="label text-warning menu-right">لا يوجد ميزات متوفرة</span>
                                @endif</span>
                        </h5>
                        <h5 class="price text-right">المدينة :
                            <span> {{ $sections->address }} </span>
                        </h5>

                    </div>
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <img alt="avatar"
                                 class=" avatar-lg mr-2"
                                 src="{{ asset('/images/sections/' . $sections->sections_logo) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<footer class="footer">
    <div class="boxTextFooter">

        <p><span class="icon-heart"></span> 2022 منصة مكتبي </p>
    </div>
</footer>
</body>

</html>
