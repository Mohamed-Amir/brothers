@extends('Fronted.layouts.master')

@section('title')
    الاخبار
@endsection

@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>الاخبـــار</h2>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا !</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> الاخبار</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="events-section bg-grey bd-bottom padding">
        <div class="container">

            <div class="events-item ">
                <div class="event-thumb">
                    <img src="/Fronted/img/events-1.jpg" alt="events">
                </div>
                <div class="event-details">
                    <h3>عنوان الخبر </h3>
                    <div class="event-info">
                        <p><i class="ti-calendar"></i>11/2/2012</p>

                    </div>
                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق</p>
                    <a href="news_details.html" class="default-btn">المزيد</a>
                </div>
            </div><!-- Event-1 -->
            <br />
            <div class="events-item">
                <div class="event-thumb">
                    <img src="/Fronted/img/events-2.jpg" alt="events">
                </div>
                <div class="event-details">
                    <h3>عنوان الخبر </h3>
                    <div class="event-info">
                        <p><i class="ti-calendar"></i>11/2/2012</p>

                    </div>
                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق</p>
                    <a href="news_details.html" class="default-btn">المزيد</a>
                </div>
            </div><!-- Event-2 -->

        </div>

    </section><!-- Events Section -->


@endsection
