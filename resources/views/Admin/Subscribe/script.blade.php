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

        ajax: "{{ route('Subscribe.allData',['type'=>$type])}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'id_number', name: 'id_number'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    function showFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadShow_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Subscribe/show/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadShow_' + id).css({'display': 'none'});

                $('#showData').modal();

                $('#name').text(data.name);
                $('#phone').text(data.phone);
                $('#email').text(data.email);
                $('#id_number').text(data.id_number);
                $('#job').text(data.job);
                $('#qualification').text(data.qualification);
                $('#age').text(data.age);
                $('#nationality').text(data.nationality);
                $('#created_at').text(data.created_at);
                $('#id').text(data.id);
            }
        });
    }


    function deleteFunction(id,type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1){
            url =  "/Admin/Subscribe/destroy/" + id;
            deleteProccess(url);
        }else{
            url= "/Admin/Subscribe/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray=[];
        }
    }


</script>

<script>
    function ChangeStatus(status,id) {
        Toset('طلبك قيد التنفيذ','info','',false);
        $.ajax({
            url : '/Admin/Subscribe/ChangeStatus/' +id +'?status='+status,
            type : 'get',
            success : function(data){
                $.toast().reset('all');
                table.ajax.reload();
                Toset('تمت العملية بنجاح','success','',5000);
            }
        })
    }
</script>

<script>
    $('#seachForm').submit(function(e){
        e.preventDefault();
        var formData=$('#seachForm').serialize();
        table.ajax.url('/Admin/Subscribe/allData?type={{$type}}&'+formData);
        table.ajax.reload();
        TosetV2('تمت العملية بنجاح','success','',5000);

    })
</script>
