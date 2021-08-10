@extends('Fronted.layouts.master')

@php
    $blogs=\App\Models\Blog::where('status',1)->where('type',3)->paginate(36);
@endphp

@section('title')
    اعمالنا
@endsection

@section('content')

    <div class="container">
        <div class="page work">


            <div class="row">
            @foreach($blogs as $row)
                    <div class="col-md-3 col-xs-6">
                        <div class="our_work wow bounceIn" data-wow-duration="8s" data-wow-delay="8s ">
                            <a href="/singleBlog/{{$row->id}}">
                                <div class="pic"><img src="{{getImageUrl('Blog',$row->icon)}}" class="img-fluid"></div>
                                <div class="caption">{{$row->title}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>

@endsection