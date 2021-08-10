@extends('Fronted.layouts.master')
@section('title')
      الحوكمه
@endsection

@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>الحوكمة</h2>
                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا !</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> الحوكمه </li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->


    <div class="padding">
        <div class="container">
            <div class="vertical-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pag1" role="tab" aria-controls="home">تقرير 1 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="profile">تقرير 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="messages">تقرير 3</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="pag1" role="tabpanel">
                        <div class="sv-tab-panel">
                            <h3>تقرير 1 </h3>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="filedownload"><img src="/Fronted/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">سياسة التعامل مع الاطراف</a></h4>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="tab-pane" id="pag2" role="tabpanel">
                        <div class="sv-tab-panel">
                            <h3>تقرير 2</h3>
                        </div>
                    </div>
                    <div class="tab-pane" id="pag3" role="tabpanel">
                        <div class="sv-tab-panel">
                            <h3>تقرير 3</h3>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
@endsection
