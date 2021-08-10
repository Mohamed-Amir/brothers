<div class="modal fade bd-example-modal-lg" id="formModel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formSubmit">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="titleOfModel"><i class="ti-marker-alt m-r-10"></i> Add new </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">الصوره</label>
                                <input type="file" id="image" name="image"  class="form-control"   >
                            </div>
                        </div>

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="example-email">العنوان</label>--}}
{{--                                <input type="text" id="titleS" name="title" class="form-control"   >--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="example-email">اسم الزر </label>--}}
{{--                                <input type="text" id="btn_name" name="btn_name"  class="form-control"   >--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="example-email">رابط الزر</label>--}}
{{--                                <input type="text" id="btn_link" name="btn_link"  class="form-control"   >--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">الحالة</label>
                                <select  id="status" name="status"  class="form-control"   >
                                    <option value="1">مفعل</option>
                                    <option value="2">غير مفعل</option>
                                </select>
                            </div>
                        </div>

{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="example-email">المحتوى</label>--}}
{{--                                <textarea rows="4" cols="50" id="desc" name="desc"  class="form-control"   >--}}
{{--                                </textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
                <div id="err"></div>
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-dismiss="modal">اغلاق</button>
                    <button type="submit" id="save" class="btn btn-success"><i class="ti-save"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
