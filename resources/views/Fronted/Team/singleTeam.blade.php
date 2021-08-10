@extends('Fronted.layouts.master')

@section('title')
    {{$team->name}}
@endsection

@section('content')
    {!! gePageSection($team->name) !!}

    <section class="team-details mg-top-100 mg-bottom-70">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="team-one__single">
                        <div class="team-one__image">
                            <img src="{{getImageUrl('Team',$team->image)}}" class="img-fluid" alt="">
                        </div><!-- /.team-one__image -->


                    </div><!-- /.team-one__single -->
                </div><!-- /.col-lg-6 -->
                <div class="col-md-8">
                    <div class="team-details__content event-details">
                        <h2 class="team-details__title">نبذة </h2><!-- /.team-details__title -->
                        <p class="team-details__text">{{$team->brief}}</p><!-- /.team-details__text -->
                        @if($team->skills->count() > 0)
                        <h3 class="team-details__subtitle">المهارات</h3><!-- /.team-details__subtitle -->

                        <ul class="team-details__text">
                            @foreach($team->skills as $row)
                            <li>{{$row->name}}</li>
                                @endforeach
                        </ul>
                        <br />
                        @endif

                        <h3 class="team-details__subtitle">يانات التواصل</h3><!-- /.team-details__subtitle -->

                        <div class="meta-list">
                            <div><i class="fa fa-phone"></i>{{$team->phone}}</div>
                            <div><i class="fa fa-envelope"></i>{{$team->email}}</div>
                            <div><i class="fa fa-globe"></i>{{$team->city}}</div>
                        </div>
                        <br />

                        @if($team->work->count() > 0)
                        <a class="btn btn-red " href="{{route('Team.teamWork',['team_id'=>$team->id])}}">مشاهدة الاعمال</a>
                        @endif
                    </div><!-- /.team-details__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection

