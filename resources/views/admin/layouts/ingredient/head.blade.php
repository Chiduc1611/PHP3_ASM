<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/Admin/assets/images/favicon.png') }} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Admin - @yield('page')</title>
<style>
    body a{
        text-decoration: none;
    }
    .dataTables_filter {
        float: inline-end;
    }

    .dataTables_paginate {
        float: inline-end;
    }

    .search_phim {
        margin-bottom: 20px;
    }

    .search_phim input[type=text] {
        padding: 4px;
        width: 200px;
    }

    .search_phim input[type=submit] {
        padding: 5px 20px;
    }

    .search_phim select {
        width: 180px;
        padding: 5px;
    }

    #zero_config_filter {
        display: none;
    }

    .thong_ke {
        margin-top: 10px;
    }

    .thong_ke label {
        margin-right: 10px;
    }

    .thong_ke select {
        width: 200px;
        padding: 6px;
    }

    .tong_dt2 {
        margin-top: 20px;
    }

    .tong_dt2 span {
        margin-left: 45px;
        margin-top: 20px;
        border: 1px solid #FF953F;
        padding: 6px;
        border-radius: 5px;
    }

    #zero_config_info {
        display: none;
    }

    #zero_config_paginate {
        display: none;
    }
</style>
<link href="{{ asset('/Admin/dist/css/style.min.css') }}" rel="stylesheet">
<link href="{{ asset('/Admin/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<script src="https://cdn.tiny.cloud/1/1wvl1p45k1gu64bm1uiiae857jueitaw3fhjhfifbtkbfhwo/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<script script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown ',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat ',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            "See docs to implement AI Assistant")),
    });
</script>
