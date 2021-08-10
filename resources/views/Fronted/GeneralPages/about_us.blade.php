@extends('Fronted.layouts.master')

@section('title')
    عن المؤسسة
@endsection

@section('content')
    <div class="container">
        <div class="page about">


            <section>
                <div class="row">
                    <div class="col-md-7">
                        <div class="text wow bounceIn" data-wow-duration="1s" data-wow-delay="1s ">
                            <h2 class="h3">عن المؤسسة</h2>

                            <br/>
                            <p class="just">
                            {{about()->about_us}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <img src="{{getImageUrl('About_us',about()->image)}}" class="img-fluid wow bounceIn" data-wow-duration="2s"
                             data-wow-delay="1s ">
                    </div>

                </div>

            </section>


            <!-- Team -->

            <!-- Team -->

        </div>
    </div>


    <section id="team" class="pb-5 teamwork">
        <div class="container">


            <div class="section_title text-center">
                <img src="/Fronted/img/heading_icon_grey.png">
                <br/>
                <h3> فريق العمل </h3>

            </div>

    @php
    $team=\App\Models\Team::where('status',1)->get();
    @endphp
            <div class="row">
                <!-- Team member -->
                @foreach($team as $row)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{getImageUrl('Team',$row->image)}}" alt="card image"></p>
                                        <h4 class="card-title">{{$row->name}}</h4>
                                        <p class="card-text">{{$row->specialization}}</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">{{$row->name}}</h4>
                                        <p class="card-text">{{substr($row->brief,0,500)}}<p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </section>
@endsection
