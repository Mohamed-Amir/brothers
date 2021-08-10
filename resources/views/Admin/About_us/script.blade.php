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

        ajax: "{{ route('About_us.allData')}}",

        columns: [
            {data: 'checkBox', name: 'checkBox'},
            {data: 'id', name: 'id'},
            {data: 'address', name: 'address'},
            {data: 'image', name: 'image'},
            {data: 'phone1', name: 'phone1'},
            {data: 'our_email', name: 'our_email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#formSubmit').submit(function (e) {
        e.preventDefault();
        saveOrUpdate(  "{{ route('About_us.update') }}");
    });


    function editFunction(id) {

        save_method = 'edit';

        $('#err').slideUp(200);

        $('#loadEdit_' + id).css({'display': ''});

        $.ajax({
            url: "/Admin/About_us/edit/" + id,
            type: "GET",
            dataType: "JSON",

            success: function (data) {

                $('#loadEdit_' + id).css({'display': 'none'});

                $('#save').text('تعديل');

                $('#titleOfModel').text('تعديل المعلومات');

                $('#formSubmit')[0].reset();

                $('#formModel').modal();

                $('#ceo_speech').val(data.ceo_speech);
                $('#phone2').val(data.phone2);
                $('#address').val(data.address);
                $('#charity_idea').val(data.charity_idea);
                $('#about_us').val(data.about_us);
                $('#phone1').val(data.phone1);
                $('#vision').val(data.vision);
                $('#our_email').val(data.our_email);
                $('#initiatives').val(data.initiatives);
                $('#orphans').val(data.orphans);
                $('#fraternize').val(data.fraternize);
                $('#family').val(data.family);
                $('#id').val(data.id);
            }
        });
    }



</script>
