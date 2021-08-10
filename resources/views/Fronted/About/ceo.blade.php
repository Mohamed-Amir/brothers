@extends('Fronted.layouts.master')

@section('title')
    كلمه رئيس مجلس الاداره
@endsection

@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>عن الجمعية</h2>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا !</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> من نحن</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->
@include('Fronted.layouts.Home.ceo_words')
@endsection
