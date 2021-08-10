@extends('Fronted.layouts.master')

@section('title')
    شارك معنا
@endsection

@section('content')
    {!! gePageSection('شارك معنا') !!}
    <div class="registar-section pd-top-100 pd-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 contact-main">
                    <h3 class="form-title">تسجيل ذوي الاعاقة</h3>
                    <form class="registar-form" id="commentForm">
                        @csrf
                        <label for="name">الاسم بالكامل</label>
                        <input id="name" class="input" name="name" required type="text" placeholder="الاسم بالكامل" />

                        <label>الصورة الشخصية</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">

                        <label for="">نبذة مختصرة </label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>

                        <label for="">المهارات </label>
                        <input id="email" class="input" type="text" name="skills" placeholder="المهارات" />


                        <div class="clearfix"></div>
                        <label for="email">رقم التليفون</label>
                        <input id="email" class="input" type="text" name="phone" placeholder="رقم التليفون" />


                        <label for="email">العنوان</label>
                        <input id="email" class="input" type="text" name="address" placeholder="العنوان" />


                        <label for="email">اسم المستخدم / البريد اللأكتروني</label>
                        <input id="email" class="input" type="text" name="username" placeholder="اسم المستخدم" />
                        <hr />

                        <label> الاعمال الشخصية</label>
                        <input type="file" class="form-control-file" name="cv" id="exampleFormControlFile1">
                        <label for="Password">كلمة المرور</label>
                        <input id="Password" class="input" type="password" name="password" placeholder="كلمة المرور" />


                        <div class="registar-check">
                            <input id="remember-check" class="checkbox" type="checkbox" />
                            <label for="remember-check"> تذكرني </label>
                        </div>
                        <input class="btn" type="submit" id="saveComment" value="تسجيل" />
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#commentForm').submit(function (e) {
            e.preventDefault();
            $("#saveComment").attr("disabled", true);

            Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);
            var formData = new FormData($('#commentForm')[0]);
            $.ajax({
                url: '/save_register',
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
