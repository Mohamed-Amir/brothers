<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">

                            <img src="{{getAdminImage(Auth::guard('Admin')->user()->photo)}}" alt="users"
                                 class="rounded-circle img-fluid"/>

                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="nameOfUser m-b-10 user-name font-medium">{{ Auth::guard('Admin')->user()->name }}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button"
                               data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="{{route('profile.index')}}">
                                    <a class="dropdown-item" href="{{route('user.logout')}}">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل الخروج</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- main routes section-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">الاعدادات الرئيسية</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('admin.dashboard')}}"
                       aria-expanded="false">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu">الصفحة الرئيسية</span>
                    </a>
                </li>
                @if(in_array(5,adminsRoleArray(Auth::guard('Admin')->user())))
                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Admin.index')}}"
                       aria-expanded="false">
                        <i class="icon-Add-UserStar"></i>
                        <span class="hide-menu">المديرين</span>
                    </a>
                </li>
                @endif



                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="icon-File-TextImage"></i>
                        <span class="hide-menu"> الاعدادات الرئيسية </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        @foreach(slidersMainLinks() as $row)
                            @if(in_array($row[3],adminsRoleArray(Auth::guard('Admin')->user())))
                            <li class="sidebar-item">
                                <a class="sidebar-link  waves-effect waves-dark" href="{{route($row[2])}}"
                                   aria-expanded="false">
                                    <i class="icon-Administrator"></i>
                                    <span class="hide-menu">{{$row[1]}}</span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @if(in_array(2,adminsRoleArray(Auth::guard('Admin')->user())))
                {{-- Reports Route --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="icon-Record"></i>
                        <span class="hide-menu">الحوكمه و التقارير </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark" href="{{route('Cat_reports.index')}}"
                               aria-expanded="false">
                                <i class="icon-list"></i>
                                <span class="hide-menu">اقسام الحوكمة</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark"
                               href="{{route('Reports.index',['type'=>1])}}"
                               aria-expanded="false">
                                <i class="icon-Administrator"></i>
                                <span class="hide-menu">الحوكمه </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link  waves-effect waves-dark"
                               href="{{route('Reports.index',['type'=>2])}}"
                               aria-expanded="false">
                                <i class="icon-Administrator"></i>
                                <span class="hide-menu">التقارير </span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                {{-- Blog --}}

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Testimonials.index')}}"
                       aria-expanded="false">
                        <i class="icon-Administrator"></i>
                        <span class="hide-menu">ماذا قالو عنا؟</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Blog.index',['type'=>1,'title'=>'المبادرات'])}}"
                       aria-expanded="false">
                        <i class="icon-Administrator"></i>
                        <span class="hide-menu">المبادرات</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Blog.index',['type'=>2,'title'=>'اخبارنا'])}}"
                       aria-expanded="false">
                        <i class="fa fa-newspaper"></i>
                        <span class="hide-menu">اخبارنا</span>
                    </a>
                </li>
                {{-- subscribe Route --}}
{{--                @if(in_array(4,adminsRoleArray(Auth::guard('Admin')->user())))--}}
{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"--}}
{{--                       aria-expanded="false">--}}
{{--                        <i class="icon-Love-User"></i>--}}
{{--                        <span class="hide-menu">الخدمات الالكترونية </span>--}}
{{--                    </a>--}}
{{--                    <ul aria-expanded="false" class="collapse  first-level">--}}

{{--                        <li class="sidebar-item">--}}
{{--                            <a class="sidebar-link  waves-effect waves-dark"--}}
{{--                               href="{{route('Subscribe.index',['type'=>1])}}"--}}
{{--                               aria-expanded="false">--}}
{{--                                <i class="icon-list"></i>--}}
{{--                                <span class="hide-menu">الاشتراكات العاملة</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="sidebar-item">--}}
{{--                            <a class="sidebar-link  waves-effect waves-dark"--}}
{{--                               href="{{route('Subscribe.index',['type'=>2])}}"--}}
{{--                               aria-expanded="false">--}}
{{--                                <i class="icon-Administrator"></i>--}}
{{--                                <span class="hide-menu">الاشتراكات المنتسبة </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}


{{--                    </ul>--}}
{{--                </li>--}}
{{--                @endif--}}
                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Contact.index')}}"
                       aria-expanded="false">
                        <i class="icon-Email"></i>
                        <span class="hide-menu">رسائل تواصل معنا</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Client.index')}}"
                       aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">شركــاء النجاح</span>
                    </a>
                </li>

                <!--end main routes section-->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
