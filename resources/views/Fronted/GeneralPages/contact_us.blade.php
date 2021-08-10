@extends('Fronted.layouts.master')

@section('title')
    تواصل معنا
@endsection

@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>تواصل معنا</h2>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                    <li class="breadcrumb-item active">تواصل معنا</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="contact-section">
        <div id="google_map"></div><!-- /#google_map -->
        <div class="container">
            <div class="row contact-wrap">
                <div class="col-md-6 xs-padding">
                    <div class="contact-info">
                        <h3>ابق على تواصل معنا</h3>

                        <ul>
                            <li><i class="ti-location-pin"></i> جدة، المملكة العربية السعودية</li>
                            <li><i class="ti-mobile"></i> +1 212 425 8617, +1 212 425 8533</li>
                            <li><i class="ti-email"></i> Youremail@companyname.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="contact-form">
                        <br />
                        <form action="contact.php" method="post" id="ajax_form" class="form-horizontal">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="الاسم" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="الرســالة" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default-btn" type="submit">إرسال</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection

@section('script')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUmz_Riose169lAsGLx3ckI4rsCYFnpyU&callback=initMap">
    </script>
    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng("{{about()->lat}}","{{about()->lng}}");
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 13
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function() {
                var iwContent = '<div id="iw_container">' +
                    '<div class="iw_title"><b>Location</b> : Noida</div></div>';
                // including content to the infowindow
                infowindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infowindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#commentForm').submit(function (e) {
            e.preventDefault();
            $("#saveComment").attr("disabled", true);

            Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);
            var formData = new FormData($('#commentForm')[0]);
            $.ajax({
                url: '/saveContactUs',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {

                        $("#saveComment").attr("disabled", false);

                        $.toast().reset('all');
                        swal(data.message, {
                            icon: "success",
                        });
                        $('#commentForm')[0].reset();

                        $("#saveComment").attr("disabled", false);
                    }
                }
            });

        })
    </script>
    @endsection
