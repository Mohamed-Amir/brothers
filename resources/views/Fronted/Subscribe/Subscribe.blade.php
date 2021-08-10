@extends('Fronted.layouts.master')
@section('title')
    {{$title}}
@endsection

@section('content')
    {!! gePageSection($title) !!}

    <div class="registar-section pd-top-100 pd-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 contact-main">
                    <h3 class="form-title">{{$title}}</h3>

                    <form class="registar-form" id="subscribeForm">
                        @csrf

                        <p style="color: red;">{{$price}}</p>

                        <input type="hidden" name="type" value="{{$type}}">
                        <label for="name">الاسم بالكامل</label>
                        <input id="name" class="input" name="name" required="" type="text" placeholder="الاسم بالكامل">

                        <label for="email">رقم السجل المدني</label>
                        <input id="email" class="input" type="text" name="id_number" required=""
                               placeholder="رقم السجل المدني">


                        <label for="email">المؤهل</label>
                        <input id="text" class="input" type="text" name="qualification" required="" placeholder="المؤهل">

                        <label for="email">الوظيفة</label>
                        <input id="text" class="input" type="text" name="job" required="" placeholder="الوظيفة">


                        <label for="email">الجنسية</label>
                        <input id="text" class="input" type="text" name="nationality" required="" placeholder="الجنسية">


                        <label for="email">رقم الجوال</label>
                        <input id="phone" class="input" type="number" required="" name="phone" placeholder="رقم الجوال">

                        <label for="email">السن</label>
                        <input id="number" class="input" type="text" name="age" required="" placeholder="السن">


                        <label for="email">البريد الإلكتروني</label>
                        <input id="email" class="input" type="text" name="email" required=""
                               placeholder="البريد الإلكتروني">


                        <input class="btn mg-top-15" type="submit" id="save" value="تسجيل">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#subscribeForm').submit(function (e) {
            $("#save").attr("disabled", true);
            e.preventDefault();
            Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);
            var formData = new FormData($('#subscribeForm')[0]);
            $.ajax({
                url: '/Subscribe/saveSubscribe',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {

                        $("#save").attr("disabled", false);

                        $.toast().reset('all');
                        swal(data.message, {
                            icon: "success",
                        });
                        $('#subscribeForm')[0].reset();
                        $("#saveComment").attr("disabled", false);
                    }
                }
            });

        })
    </script>
@endsection