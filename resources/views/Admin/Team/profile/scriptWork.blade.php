@include('Admin.includes.scripts.dataTableHelper')

<script type="text/javascript">

    var table2 = $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
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

        ajax: "{{ route('Work.allData',$team->id)}}",

        columns: [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    function addFunction2(){
        newAddFunction('Work');
    }

    $('#formWork').submit(function (e) {
        e.preventDefault();
        newSaveOrUpdate(save_method == 'add' ? "{{ route('Work.create') }}" : "{{ route('Work.update') }}",'Work','table2');
        table2.ajax.reload();
    });

    function deleteFunction2(id, type) {
        if (type == 2 && checkArray.length == 0) {
            alert('لم تقم بتحديد اي عناصر للحذف');
        } else if (type == 1) {
            url = "/Admin/Work/destroy/" + id;
            deleteProccess(url);
            table2.ajax.reload();
        } else {
            url = "/Admin/Work/destroy/" + checkArray + '?type=2';
            deleteProccess(url);
            table2.ajax.reload();
            checkArray = [];
        }
    }

</script>

