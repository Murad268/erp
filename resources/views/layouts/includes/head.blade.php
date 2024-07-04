<head>

    <meta charset="utf-8">
    <title>N adlı şirkətin erp sistemi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico">
    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Icons CSS -->

    <!-- Tailwind CSS -->


    <link rel="stylesheet" href="{{asset('assets/css/tailwind2.css')}}">
    @stack('links')
    @section('links')        <style>
        .hidden, .items-center{
            align-items: center !important;
            column-gap: 20px
        }
        span[aria-current="page"] span {
            /* Burada istədiyiniz stili əlavə edin */
            font-weight: bold;
            color: white;
            background-color: black;
            /* və s. */
        }
        .status-message {
            color: green !important;
            font-weight: bold !important;
            font-size: 20px;
        }
        .invalid-feedback {
            color: red !important;
            font-weight: bold !important;
            font-size: 20px;
        }
    </style>

</head>
