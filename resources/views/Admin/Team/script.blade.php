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
            'sSearch': 'بحث :',
            "paginate": {
                "next": "التالي",
                "previous": "السابق"
            },
            "sInfo": "عرض صفحة _PAGE_ من _PAGES_",
        },
        serverSide: true,

        order: [[0, 'desc']],

        buttons: ['copy', 'excel', 'pdf'],

        ajax: "{{ route('Team.allData')}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'specialization', name: 'specialization'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#formSubmit').submit(function (e) {
        e.preventDefault();
        saveOrUpdate(save_method == 'add' ? "{{ route('Team.create') }}" : "{{ route('Team.update') }}");
    });


    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/Team/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text('تعديل صاحب الهمة');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#specialization').val(data.specialization);
                $('#name').val(data.name);
                $('#specialization_desc').val(data.specialization_desc);
                $('#status').val(data.status);
                $('#brief').val(data.brief);
                $('#city').val(data.city);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });
    }


    function deleteFunction(id, type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1) {
            url = "/Admin/Team/destroy/" + id;
            deleteProccess(url);
        } else {
            url = "/Admin/Team/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            checkArray = [];
        }
    }

</script>

{{-- ChangeStatus Function --}}
<script>
    function ChangeStatus(status, id) {
        Toset('طلبك قيد التنفيذ', 'info', '', false);
        $.ajax({
            url: '/Admin/Team/ChangeStatus/' + id + '?status=' + status,
            type: 'get',
            success: function (data) {
                $.toast().reset('all');
                table.ajax.reload();
                Toset('تمت العملية بنجاح', 'success', '', 5000);
            }
        })
    }

    function profile(id) {
        window.open('/Admin/Team/view/'+id);
    }
</script>