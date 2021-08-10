@extends('Fronted.layouts.master')

@php
    $blogs=\App\Models\Blog::where('type',4)->where('status',1)->get();
@endphp

@section('title')
    اخبارنا
@endsection

@section('content')

    <div class="market">
        <div class="container">


            <div class="section_title text-center">
                <h3><img src="/Fronted/img/heading_icon.png">
                    <br/>
                    أخبـــارنا</h3>

            </div>

            <div class="row">

                @foreach($blogs as $row)
                <div class="col-md-4">
                    <div class="item">
                        <div class="pic"><img src="{{getImageUrl('Blog',$row->icon)}}" class="img-fluid"></div>
                        <div class="title"><h4>{{$row->title}}</h4></div>

                        <div class="clear"></div>
                        <div class="details">
                            <li><i class="fas fa-calendar-minus"></i>{{CustomDateFormat($row->created_at)}}</li>
                        </div>
                        <div class="clear"></div>

                        <p>{!!  substr($row->content,0,130) !!}</p>


                        <button onclick="location.href='/singleBlog/{{$row->id}}'" class="btn-primary"><i class="fas fa-plus"></i> المزيد</button>
                    </div>
                </div>
                    @endforeach


            </div>
        </div>

    </div>


@endsection