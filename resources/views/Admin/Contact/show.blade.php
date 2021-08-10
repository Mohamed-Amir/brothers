<div class="modal fade" id="showData" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> تفاصيل الاشتراك</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Lock-User"></i>الاسم</h5>
                            <p class="name_ar valueModal" id="name"></p>
                        </div>

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Email"></i>البريد الالكتروني</h5>
                            <p class="main valueModal" id="email"></p>
                        </div>

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Calendar-3"></i>تم الانشاء في :</h5>
                            <p class="valueModal" id="created_at"></p>
                        </div>

                        <div class="col-md-6 showDetilse">
                            <h5><i class="icon-Arrow-Join"></i>كود الرسالة</h5>
                            <p class="valueModal" id="id"></p>
                        </div>
                        <div class="col-md-12 showDetilse">
                            <h5><i class="fas fa-pencil-alt"></i>الرسالة</h5>
                            <textarea class="updated_by valueModal" readonly id="message" style="width: 100%"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

