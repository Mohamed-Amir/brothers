@extends('Fronted.layouts.master')

@section('title')
    فعاليتنا
@endsection
@php
$blogs=\App\Models\Blog::where('type',1)->where('status',1)->get();
@endphp

@section('content')
    <div class="market">
        <div class="container">


            <div class="section_title text-center">
                <h3><img src="/Fronted/img/heading_icon.png">
                    <br/>
                    فعاليــــــــاتنا</h3>

            </div>
            @foreach($blogs as $row)
            <div class="item">
                <div class="row">


                    <div class="col-md-3">
                        <div class="pic"><img src="{{getImageUrl('Blog',$row->icon)}}" class="img-fluid"></div>
                    </div>

                    <div class="col-md-9">

                        <div class="title"><h4>{{$row->title}}</h4></div>
                        <div class="clear"></div>
                        <div class="details">
                            <li><i class="fas fa-calendar-minus"></i>{{CustomDateFormat($row->created_at)}}</li>
                        </div>
                        <div class="clear"></div>

                        <p>{!!  substr($row->content,0,300) !!} </p>


                        <button onclick="location.href='/singleBlog/{{$row->id}}'" class="btn-primary"><i class="fas fa-plus"></i> المزيد</button>
                    </div>
                </div>

            </div>
                @endforeach



        </div>
    </div>

@endsection
