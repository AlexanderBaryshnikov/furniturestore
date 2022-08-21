<head>
    <meta charset="utf-8">
    <title>Furniture Store</title>
    <meta name="description" content="Furniture Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf" content="{{ csrf_token() }}"/>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    @stack('styles')
    @livewireStyles
</head>
