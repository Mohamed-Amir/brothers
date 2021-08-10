@extends('Fronted.layouts.master')

@section('title')
    اخوانكم
@endsection

@section('content')
    <div class="content">

        @include('Fronted.layouts.Home.slider')
        @include('Fronted.layouts.Home.initiative')
        @include('Fronted.layouts.Home.about')
        @include('Fronted.layouts.Home.ceo_words')
        @include('Fronted.layouts.Home.numbers')
        @include('Fronted.layouts.Home.blog')
        @include('Fronted.layouts.Home.testimonials')
    </div>

        @include('Fronted.layouts.Home.clients')
@endsection
