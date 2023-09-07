<!--
=========================================================
* Soft UI Design System - v1.0.9
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $config->website_title }} - {{ $desa->nama_desa }}</title>
    @if ($desa->logo !== null)
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/' . $desa->logo) }}">
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $desa->logo) }}">
    @else
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/default_logo.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/default_logo.png') }}">
    @endif
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700|Quicksand:300,400,500,600,700,800|Outfit:300,400,500,600,700,800|Outfit:300,400,500,600,700,800|Poppins:300,400,500,600,700,800"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/web/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/web/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/web/css/soft-design-system.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet" />
</head>

<body class="presentation-page">
    <!-- Navbar -->
    @include('web.layouts.navbar')

    @yield('content')
    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
    @include('web.layouts.footer')
