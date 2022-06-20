<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Oscar Cornejo">
    <meta name="description" content="Landing Page">
    <title>منصة مكتبي</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('icons/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/estilos.css')}}">

</head>

<body>

<!-- Contenedor Header -->
<header id="linkHome">
    <nav id="navFixed" class="navbar fixed-top navbar-expand-lg navbar-light bg-light p-10px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <img src="{{URL::asset('assets/img/Logoo.svg')}}" width="500px" height="45px">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/workspaces') }}">مساحات العمل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#linkContacto">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#ourPartners">شركاؤنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#linkAbout">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#linkTestimonial">الخريطة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#linkFeatures">خدماتنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#linkHome">الرئيسية</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="boxHeader">

        <div class="imgHeader">
            <img src="{{URL::asset('images/landing_11.png')}}" alt="">
        </div>

        <div class="textosHeader">
            <h1><b>منصة مكتبي</b></h1>
            <br>
            <p>المنصة الأولى فلسطينياً التي تعرض جميع مساحات العمل في مكان واحد</p>
            <a class="botonGetStarted" href="{{ url('/' . $page='login') }}" rel="">تسجيل الدخول</a>
            <a class="botonGetStarted" href="{{ url('/' . $page='register') }}" rel="">إنشاء عضوية</a>
        </div>
    </div>
</header>
<!-- Fin Contenedor Header -->

<!-- Contenedor Main -->
<main>
    <a id="subir" class="icon-arrow-up scroll" href="#linkHome"></a>
    <!-- section Features -->
    <section class="boxFeatures" id="linkFeatures">
        <h3>💙 خدماتنا</h3>

        <div class="features">
            <div class="cardFeatures">
                <h4>مكاتب شركات</h4>
                <p>مساحة مكتبية مفروشة مع وسائل الراحة الخاصة المتاحة غالباً ما تكون مناسبة عدد من 10-30 شخص</p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>

            <div class="cardFeatures">

                <h4>مكاتب مشتركة</h4>
                <p>عبارة عن مكتب شخصي في غرفة مشتركة فيها العديدة من الأشخاص</p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>

            <div class="cardFeatures">

                <h4>مكاتب فردية</h4>
                <p>مكاتب شخصية بغرف خاصة غير مشتركة مناسبة لأصحاب العمل الحر ومفضلي الخصوصية والإستقلال </p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>

            <div class="cardFeatures">

                <h4>غرف إجتماعات</h4>
                <p>غرف تحتوي على شاشات عرض للإجتماعات على الإنترنت</p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>

            <div class="cardFeatures">

                <h4>قاعات تدريبية</h4>
                <p>قاعات تدريبية تحتوي على كامل الميزات اللازمة لإحياء الدورات التدريبية</p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>

            <div class="cardFeatures">

                <h4>مكاتب طابق كامل</h4>
                <p>مكاتب مفروشة بالكامل في طابق خاص، عادة ما تكون مناسبة للشركات التي تحتوي على أكثر من 40 موظف</p>
                <a href="#">عرض الأماكن المتاحة</a>
            </div>
        </div>

    </section>
    <!-- Fin section Features -->

    <!-- section Testimonios -->
    <section class="boxSlider" id="linkTestimonial">
        <h3>مكان خريطة غزة والمكاتب</h3>


        <div width="300" hieght="400" style="width:100%;height: 300px;" id="map"></div>


        <script>
            function initMainMap() {


                var locations = [


                        @foreach($address as $section)
                        //  dd($section);
                        // dd( $section->sections_name." ".$section->address);
                    {!! "['$section->places_name',$section->address]," !!}

                    @endforeach
                ];
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: new google.maps.LatLng(31.51433912315498, 34.45081200995738),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow;

                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

            }

        </script>


        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj3FCd3ajWDAc-jH9Ei4oSgRFyIbHXAH4&callback=initMainMap&v=weekly"
            defer>
        </script>

        </section>
    <!-- Fin section Testimonios -->


    <!-- section About -->
    <section class="boxAbout" id="linkAbout">

        <h3>💙 من نحن</h3>

        <div class="about">
            <div class="imgAbout">
                <img src="{{URL::asset('images/about_22.png')}}" alt="">
            </div>

            <article class="contenidoAbout text-right">
                <h3 class="text-right">منصة مكتبي</h3>
                <p class="text-right">تم إنشاء هذه المنصة لمساعدة أصحاب الشركات المالكة لمساحات العمل أن تعرض
                    المساحات المتاحة للتأجير في بيئة عؤض مثالية تجمع بين أصحاب الشركات والأشخاص المهتمين بإستئجار
                    مساحات العمل </p>
                <a class="botonGetStarted " href="#">تعرف على المزيد</a>
            </article>
        </div>


    </section>
    <!-- Fin section About -->
    <!-- section Call To Actions -->
    <section class="boxCallToActions" id="ourPartners">
        <h3>... شركاء منصة مكتبي</h3>
        <div class="callToActions">
            <div class="imgCallToActions">
                <img src="{{URL::asset('images/land_2.jpg')}}" alt="">
            </div>

            <article class="contenido text-right">

                <p class="text-right">جميع الشركات الني تريد عرض مساحات العمل الخاصة بها بتفاصيلها الدقيقة لإظهارها
                    للمستخدين بطريقة مناسبة وعرض موفع الشركة بالتحديد على الخريطة وتسهيل إدارة مساحات العمل للشركات
                    بطريقة منظمة </p>

                <ul>
                    <li>التسجيل في منصة مكتبي عن طريقة إدخال البيانات من <a href="#">هنا</a>
                        <span class="icon-check"></span>
                    </li>
                    <li>تسديد رسوم الإشتراك السنوي في المنصة ، للمزيد من <a href="#">هنا</a>
                        <span class="icon-check"></span>
                    </li>
                    <li>التسجيل في منصة مكتبي عن طريقة إدخال البيانات من <a href="#">هنا</a>
                        <span class="icon-check"></span>
                    </li>
                    <li>تسديد رسوم الإشتراك السنوي في المنصة ، للمزيد من <a href="#">هنا</a>
                        <span class="icon-check"></span>
                    </li>
                </ul>
            </article>
        </div>
    </section>
    <!-- Fin section Call To Actions -->

    <!-- section Contacto -->
    <section class="boxContacto" id="linkContacto">
        <h3>تواصل معنا</h3>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container contacto ">
            <form id="miForm" method="POST" action="{{ route('feedback.store') }}">
                @csrf
                <div class="form-group text-right">
                    <label for="inputEmail"><b>الإسم كاملاً</b></label>
                    <input type="text" class="form-control text-right" id="feedback_sender_name"
                           name="feedback_sender_name"
                           placeholder="... الإسم كاملاً" required>
                </div>
                <div class="form-group text-right">
                    <label for="inputEmail"><b>البريد الإلكتروني</b></label>
                    <input type="email" class="form-control text-right" id="feedback_sender_email"
                           name="feedback_sender_email"
                           placeholder="... البريد الإلكتروني" required>
                </div>

                <div class="form-group text-right">
                    <label for="message"><b>الرسالة</b></label>
                    <textarea class="form-control text-right" rows="5" id="description" name="description"
                              placeholder="... الرسالة"
                              required></textarea>
                </div>

                <button type="submit" class="botonEnviarMensaje">إرسال</button>
            </form>
        </div>
    </section>
    <!-- section Contacto -->

</main>
<!-- Fin Contenedor Main -->

<!-- Contenedor Footer -->
<footer class="footer">
    <div class="boxTextFooter">

        <p><span class="icon-heart"></span> منصة مكتبي </p>
    </div>
</footer>
<!-- Fin Contenedor Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="{{URL::asset('assets/js/js/app.js')}}"></script>

</body>

</html>
