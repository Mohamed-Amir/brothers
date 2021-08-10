@extends('Fronted.layouts.master')

@section('title')
    {{$row->title}}
@endsection
@section('content')

    <div class="container">
        <div class="page about">


            <section>
                <div class="row">
                    <div class="col-md-7">

                        <div class="section_title text-center">
                            <img src="/Fronted/img/heading_icon.png">
                            <br/>
                            <h3> {{$row->title}} </h3>

                        </div>
                        <div class="text">

                            <p class="just">
{!! $row->content !!}

                            </p>



                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="{{getImageUrl('Blog',$row->image)}}" class="img-fluid">
                    </div>

                </div>

                <br/>
            </section>


            <!-- Team -->

            <!-- Team -->

        </div>
    </div>


@endsection