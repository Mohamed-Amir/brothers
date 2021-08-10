{{--@extends('Fronted.layouts.master')--}}

{{--@section('title')--}}
{{--    {{$blog->title}}--}}
{{--    @endsection--}}

{{--@php--}}
{{--    $date= \Carbon\Carbon::setLocale('ar');--}}
{{--    $blogs=\App\Models\Blog::orderBy('id','desc')->where('status',1)->where('id','!=',$blog->id)->take(4)->get();--}}
{{--    $cats=\App\Models\BlogCat::orderBy('id','desc')->get();--}}
{{--@endphp--}}

{{--@section('content')--}}
{{--    {!! gePageSection($blog->title) !!}--}}

{{--    <div class="single-blog-section pd-top-100 pd-bottom-100">--}}
{{--        <div class="blog-main">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-9 col-lg-push-3 col-sm-8 col-sm-push-4 pd-bottom-50">--}}
{{--                        <div class="single-blog">--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="{{getImageUrl('Blog',$blog->image)}}" alt="blog image">--}}
{{--                            </div>--}}

{{--                            <div class="blog-details">--}}

{{--                                <div class="thumb-meta">--}}
{{--                                    <span class="admin"><i class="fa fa-user"></i>{{$blog->author}}</span>--}}
{{--                                    @if($blog->cat)--}}
{{--                                    <span class="catagory">--}}
{{--											<i class="fa fa-folder-open" aria-hidden="true"></i> <a href="#">{{ $blog->cat->name }}</a>--}}
{{--										</span>--}}
{{--                                    @endif--}}
{{--                                    <span class="tag">--}}
{{--                                        <i class="fa fa-tags"></i><a href="#">{{$blog->tags}}</a>--}}
{{--										</span>--}}
{{--                                    <span class="comments"><i class="fa fa-comments-o"></i>{{$blog->comments->count()}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="blog-content">--}}
{{--                                    {!! $blog->content !!}--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <br />--}}
{{--                        <div class="blog-comment">--}}
{{--                            <h3 class="comment-header"> {{$blog->comments->count()}} تعليقات</h3>--}}
{{--                            @foreach($blog->comments as $row)--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-left">--}}
{{--                                    <img src="/Fronted/images/reviewer/2.jpg" alt="image">--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <span class="comment-title"> {{$row->name}}</span>--}}
{{--                                    <span class="comment-date"><i class="fa fa-calendar-o"></i> {{$row->created_at->diffForHumans() }}</span>--}}
{{--                                    <p> {{$row->comment}}</p>--}}
{{--                                 </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}

{{--                            <h3 class="comment-header">اترك تعليقك</h3>--}}
{{--                            @include('Fronted.Blog.commentForm')--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-lg-pull-9 col-sm-4 col-sm-pull-8">--}}


{{--                        <div class="sidebar-left">--}}
{{--                            <div id="search-3" class="widget widget_search">--}}
{{--                                <form role="search" method="get" class="search-form" action="{{route('Blog.search')}}">--}}
{{--                                    <input type="search" class="search-field" placeholder="بحث"  name="searchText">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div id="categories-3" class="widget widget-category">--}}
{{--                                <h3 class="widget-title">الموضوعات</h3>--}}
{{--                                <ul>--}}
{{--                                    @foreach($cats as $row)--}}
{{--                                    <li class="category-list"><a href="{{route('Blog.blogsByCat',['cat_id'=>$row->id])}}">{{$row->name}}</a></li>--}}
{{--                                        @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            @if($blogs->count() > 0)--}}
{{--                            <div class="widget widget-recent">--}}
{{--                                <h3 class="widget-title">أحدث المدونات</h3>--}}
{{--                                <ul>--}}
{{--                                    @foreach($blogs as $row)--}}
{{--                                    <li>--}}
{{--                                        <div class="thumb">--}}
{{--                                            <a href="#"><img src="{{getImageUrl('Blog',$row->icon)}}" alt="blog"></a>--}}
{{--                                        </div>--}}
{{--                                        <a href="{{route('Blog.singleBlog',['blog_id'=>$row->id])}}">--}}
{{--                                            {!! strip_tags(substr($row->content,0,100)) !!}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                        @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                                @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

{{--@section('script')--}}
{{--    @include('Admin.includes.scripts.AlertHelper')--}}
{{--    <script>--}}
{{--        $('#commentForm').submit(function (e) {--}}
{{--          e.preventDefault();--}}
{{--            $("#saveComment").attr("disabled", true);--}}

{{--            Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);--}}
{{--            var formData = new FormData($('#commentForm')[0]);--}}
{{--            $.ajax({--}}
{{--                url: '/Blog/saveComment/{{$blog->id}}',--}}
{{--                type: "post",--}}
{{--                data: formData,--}}
{{--                contentType: false,--}}
{{--                processData: false,--}}
{{--                success: function (data) {--}}
{{--                    if (data.status == 1) {--}}

{{--                        $("#saveComment").attr("disabled", false);--}}

{{--                        $.toast().reset('all');--}}
{{--                        swal(data.message, {--}}
{{--                            icon: "success",--}}
{{--                        });--}}
{{--                        setTimeout(function(){ location.reload() }, 1000);--}}

{{--                        $("#saveComment").attr("disabled", false);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--        })--}}
{{--    </script>--}}
{{--    @endsection--}}
