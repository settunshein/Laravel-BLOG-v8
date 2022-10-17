<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>@yield('title', 'Laravel BLOG')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <!-- Additional CSS Files -->
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">

    <style>
        .category-list .fa-html5{
            font-size: 16px !important;
        }

        .category-list .fa-css3-alt{
            font-size: 16px !important;
        }

        .custom-fs-13{
            font-size: 13px;
        }

        .btn-like{
            border: 1.5px solid #E12836;
            background-color: transparent;
            color: #E12836;
            cursor: pointer;
            transition: .4s;
        }

        .btn-like.active,
        .btn-like:hover{
            background-color: #E12836;
            color: #FFF;
        }

        .btn-like:focus{
            outline: none !important;
            box-shadow: none;
        }

        /* Custom Styling Sweet Alert 2 */
        .swal2-popup {
            font-size: 12.5px !important;
        }

        .swal2-styled.swal2-confirm {
            padding-right: 25px !important;
            padding-left: 25px !important;
        }

        .swal2-styled.swal2-cancel,
        .swal2-styled.swal2-confirm {
            box-shadow: none !important;
            outline: none !important;
            border-radius: 0 !important;
        }

        /* Custom Styling Pagination */
        .pagination {
            margin-bottom: 0;
            border-radius: 0; 
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            color: #FFF;
            background-color: #E12836 !important;
            border-color: #E12836 !important;
        }

        .pagination > li > a, 
        .pagination > li > span {
           color: #1C1E1F !important;
        }
        
        .page-item:first-child .page-link,
        .page-item:last-child .page-link{
            border-radius: 0;
        }

        .page-item.active .page-link {
            color: #FFF !important;
            background-color: #E12836 !important;
            border-color: #E12836 !important;
        }
    </style>
</head>