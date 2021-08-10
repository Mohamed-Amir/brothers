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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">صوره</label>
                                <input type="file" id="image" name="image"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">صوره رئيس مجلس الاداره</label>
                                <input type="file" id="ceo_image" name="ceo_image"  class="form-control"   >
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">رقم هاتف الجمعيه</label>
                                <input type="text" id="phone1" name="phone1"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">رقم هاتف اخر للجمعيه</label>
                                <input type="text" id="phone2" name="phone2"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">بريدنا الالكتروني</label>
                                <input type="text" id="our_email" name="our_email"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email"> عنوان الجمعيه </label>
                                <input type="text" id="address" name="address"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email"> فكره الجمعيه </label>
                                <input type="text" id="charity_idea" name="charity_idea"  class="form-control"   >
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">الرؤيه </label>
                                <input type="text" id="vision" name="vision"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">عدد المبادرات</label>
                                <input type="number" id="initiatives" name="initiatives"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">طفل يتيم</label>
                                <input type="number" id="orphans" name="orphans"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email">تآخي </label>
                                <input type="number" id="fraternize" name="fraternize"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-email"> اسره </label>
                                <input type="number" id="family" name="family"  class="form-control"   >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">كلمه رئيس مجلس الاداره</label>
                                <textarea type="text" cols="6" rows="4" id="ceo_speech" name="ceo_speech"  class="form-control" ></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email">  عن الجمعيه </label>
                                <textarea type="text" cols="6" rows="4" id="about_us" name="about_us"  class="form-control" ></textarea>
                            </div>
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
