@include('Admin.includes.scripts.dataTableHelper')

<script type="text/javascript">

    var table = $('#datatable').DataTable({
        bLengthChange: false,
        searching: true,
        responsive: true,
        'processing': true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>',
            'sSearch' : 'بحث :',
            "paginate": {
                "next": "التالي",
                "previous": "السابق"
            },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
        },
        serverSide: true,

        order: [[0, 'desc']],

        buttons: ['copy', 'excel', 'pdf'],

        ajax: "{{ route('Blog.allData',['type'=>$type])}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'icon', name: 'icon'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('#formSubmit').submit(function(e){
        e.preventDefault();
        $("#save").attr("disabled", true);
        $('#err').slideUp(200);

        Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);

        var id=$('#id').val();
        var content= CKEDITOR.instances.content.getData();
        var formData = new FormData($('#formSubmit')[0]);
        formData.append('content',content);
        url = save_method == 'add' ? "{{route('Blog.create')}}" : "{{route('Blog.update')}}" ;
        $.ajax({
            url : url,
            type : "post",
            data : formData,
            contentType:false,
            processData:false,

            success : function(data)
            {
                $.toast().reset('all');
                $("#save").attr("disabled", false);

                if (data.status == 1)
                {
                    CKEDITOR.instances.content.resetDirty();
                    $("#save").attr("disabled", true);

                    $.toast().reset('all');
                    swal(data.message, {
                        icon: "success",
                    });
                    table.ajax.reload();
                    $("#formModel").modal('toggle');
                    $("#save").attr("disabled", false);
                    $('#err').slideUp(200);
                }
                // Error
                else
                {
                    $.toast().reset('all');
                    $("#save").attr("disabled", false);
                    Toset('{{ trans("main.error") }}','error','',5000);
                }

            },
            error :  function(y)
            {
                $("#save").attr("disabled", false);
                $.toast().reset('all');
                Toset('{{ trans("main.tryAgin") }}','error','');
                var error = y.responseText;
                error= JSON.parse(error);
                error = error.errors;
                console.log(error );
                $('#err').empty();
                for(var i in error)
                {
                    for(var k in error[i])
                    {
                        var message=error[i][k];
                        $('#err').append("<p class='text-danger'>*"+message+"</p>");
                    }
                    $('#err').slideDown(200);

                }
            }
        });

    });



    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Blog/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text('تعديل الصوره');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#titleS').val(data.title);
                $('#author').val(data.author);
                $('#cat_id').val(data.cat_id);
                $('#count').val(data.count);
                $('#type').val(data.type);
                $('#status').val(data.status);
                CKEDITOR.instances['content'].setData(data.content);
                $('#id').val(data.id);
            }
        });
    }


    function deleteFunction(id,type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1){
            url =  "/Admin/Blog/destroy/" + id;
            deleteProccess(url);
        }else{
            url= "/Admin/Blog/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray=[];
        }
    }


</script>

<script>
    function ChangeStatus(status,id) {
        Toset('طلبك قيد التنفيذ','info','',false);
        $.ajax({
            url : '/Admin/Blog/ChangeStatus/' +id +'?status='+status,
            type : 'get',
            success : function(data){
                $.toast().reset('all');
                table.ajax.reload();
                Toset('تمت العملية بنجاح','success','',5000);
            }
        })
    }
</script>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'content' );

</script>
