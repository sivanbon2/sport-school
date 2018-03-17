<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sport_School') }}</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Acme|Gloria+Hallelujah|Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Kalam|Muli|Nanum+Pen+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <div class='container'>
        @yield('content')
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('.add_student_btn').on('click', function( event ){

                $('.panel').hide();
                $('#create_student_form').show();
                //event.preventDefault();
            });

            $('.show_student_info').on('click', function( event ){
                $('.panel').hide();
                var id = $(this).data('id');
                var elem_id = '#student_info_'+id;
                $(elem_id).fadeToggle();
                //event.preventDefault();
            });

            $('.edit_student').on('click', function( event ) {
                $('.panel').hide();
                var id = $(this).data('student-id');
                var elem_id = '#edit_student_form_' + id;
                $(elem_id).show();
            });
            $('.add_course_btn').on('click', function( event ){

                $('.panel').hide();
                $('#create_course_form').show();
                //event.preventDefault();
            });
            $('.show_course_info').on('click', function( event ){
                $('.panel').hide();
                var id = $(this).data('id');
                var elem_id = '#course_info_'+id;
                $(elem_id).fadeToggle();
                //event.preventDefault();
            });
            $('.edit_course').on('click', function( event ) {
                $('.panel').hide();
                var id = $(this).data('course-id');
                var elem_id = '#edit_course_form_' + id;
                $(elem_id).show();
            });
            $('.add_admin_btn').on('click', function( event ){

                $('.panel').hide();
                $('#create_admin_form').show();
                //event.preventDefault();
            });
            $('.show_admin_info').on('click', function( event ){
                $('.panel').hide();
                var id = $(this).data('id');
                var elem_id = '#admin_info_'+id;
                $(elem_id).fadeToggle();
                //event.preventDefault();
            });
            $('.edit_admin').on('click', function( event ) {
                $('.panel').hide();
                var id = $(this).data('user-id');
                var elem_id = '#edit_admin_form_' + id;
                $(elem_id).show();
            });

        });
    </script>
</body>
</html>
