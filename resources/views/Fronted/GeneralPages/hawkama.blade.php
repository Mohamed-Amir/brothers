@extends('Fronted.layouts.master')

@section('title')
    الحوكمة والتقارير
@endsection
@php
    $repots=\App\Models\Reports::where('type',2)->take(20)->get();
    $cats=\App\Models\Cat_reports::whereHas('reports')->get();
    $team=\App\Models\Team::where('status',1)->get();
@endphp

@section('style')
    <link rel="stylesheet" type="text/css" href="/Fronted/css/easy-responsive-tabs.css "/>
    <script src="/Fronted/js/jquery-1.9.1.min.js"></script>
    <script src="/Fronted/js/easyResponsiveTabs.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="page about">


            <section>
                <div class="rt-container">
                    <div class="col-rt-12">
                        <div class="Scriptcontent">


                            <!--Horizontal Tab-->
                            <div id="parentHorizontalTab">
                                <ul class="resp-tabs-list hor_1">
                                    <li> الحوكمة</li>
                                    <li>التقارير</li>

                                    <li>فريق العمل</li>
                                </ul>
                                <div class="resp-tabs-container hor_1">


                                    <div>
                                        <p>
                                            <!--vertical Tabs-->
                                        <div id="ChildVerticalTab_1">
                                            <ul class="resp-tabs-list ver_1">
                                                @foreach($cats as $row)
                                                    <li>{{$row->name}}</li>
                                                @endforeach
                                            </ul>
                                            <div class="resp-tabs-container ver_1">
                                                @foreach($cats as $row)
                                                    <div>
                                                        <div class="row">
                                                            @foreach($row->reports as $report)
                                                                <div class="col-md-4">
                                                                    <div class="filedownload"><img
                                                                                src="/Fronted/images/file_icon__.png"
                                                                                class="img-fluid">
                                                                        <a target="_blank" href="{{getImageUrl('Reports',$report->file)}}">
                                                                            <h4>{{$report->name}}
                                                                            </h4>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <div class="clear"></div>
                                        </div>


                                    </div>

                                    <div>
                                        <div class="row">


                                            @foreach($repots as $row)
                                                <div class="col-md-4">
                                                    <div class="filedownload"><img src="/Fronted/images/file_icon__.png"
                                                                                   class="img-fluid">
                                                        <h4><a target="_blank"
                                                               href="{{getImageUrl('Reports',$report->file)}}">{{$row->name}}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div>
                                        <section id="team" class="pb-5 teamwork">
                                            <div class="container">

                                                <div class="row">
                                                    @foreach($team as $row)
                                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                                            <div class="image-flip"
                                                                 ontouchstart="this.classList.toggle('hover');">
                                                                <div class="mainflip">
                                                                    <div class="frontside">
                                                                        <div class="card">
                                                                            <div class="card-body text-center">
                                                                                <p><img class=" img-fluid"
                                                                                        src="{{getImageUrl('Team',$row->image)}}"
                                                                                        alt="card image"></p>
                                                                                <h4 class="card-title">{{$row->name}}</h4>
                                                                                <p class="card-text">{{$row->specialization}}</p>
                                                                                <a href="#"
                                                                                   class="btn btn-primary btn-sm"><i
                                                                                            class="fa fa-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="backside">
                                                                        <div class="card">
                                                                            <div class="card-body text-center mt-4">
                                                                                <h4 class="card-title">{{$row->name}}</h4>
                                                                                <p class="card-text">{{substr($row->brief,0,500)}}
                                                                                <p>

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

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <!--Plug-in Initialisation-->
                    <script type="text/javascript">
                        $(document).ready(function () {
                            //Horizontal Tab
                            $('#parentHorizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function (event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });

                            // Child Tab
                            $('#ChildVerticalTab_1').easyResponsiveTabs({
                                type: 'vertical',
                                width: 'auto',
                                fit: true,
                                tabidentify: 'ver_1', // The tab groups identifier
                                activetab_bg: '#fff', // background color for active tabs in this group
                                inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
                                active_border_color: '#c1c1c1', // border color for active tabs heads in this group
                                active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
                            });

                            //Vertical Tab
                            $('#parentVerticalTab').easyResponsiveTabs({
                                type: 'vertical', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                closed: 'accordion', // Start closed if in accordion view
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function (event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo2');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });
                        });
                    </script>


                </div>
            </section>
        </div>
    </div>

@endsection
