<div class="card-group">
    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                </div>
                <div>
                    عدد الاخبار
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{\App\Models\Blog::where('type',4)->count()}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class=" icon-Add-User text-white"></i>
                                    </span>
                </div>
                <div>
                    عدد اعمالنا

                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{\App\Models\Blog::where('type',3)->count()}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="icon-Add-UserStar text-white"></i>
                                    </span>
                </div>
                <div>
                    عدد فعالياتنا

                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{\App\Models\Blog::where('type',1)->count()}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="icon-Address-Book2 text-white"></i>
                                    </span>
                </div>
                <div>
                    عدد الاصدارات

                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{\App\Models\Media::count()}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <!-- Column -->


</div>
