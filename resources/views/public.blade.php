<!DOCTYPE html>
<html>
<head>
    <title>{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="{{ baseUrl('/css') }}/styles.css">
    <link rel="stylesheet" media="print" href="{{ baseUrl('/css') }}/print-styles.css">
    <link rel="stylesheet" href="{{ baseUrl('/libs') }}/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <script src="{{ baseUrl('/libs/jquery') }}/jquery.min.js"></script>
    @include('partials/custom-styles')

    <!-- Custom user content -->
    @if(setting('app-custom-head'))
        {!! setting('app-custom-head') !!}
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

@include('partials.notifications')

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <a href="{{ baseUrl('/') }}" class="logo">
                    @if(setting('app-logo', '') !== 'none')
                        <img class="logo-image" src="{{ baseUrl('/image') }}/logo.svg" alt="Logo">
                    @endif
                    @if (setting('app-name-header'))
                        <span class="logo-text">{{ setting('app-name') }}</span>
                    @endif
                </a>
            </div>
            <div class="col-sm-6">
                <div class="float right">
                    <div class="links text-center">
                        @yield('header-buttons')
                    </div>
                    @if(isset($signedIn) && $signedIn)
                        @include('partials._header-dropdown', ['currentUser' => $currentUser])
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<section class="container">
    @yield('content')
</section>
<script src="https://doctub-cdn.netlify.com/assets/common.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
     <script>
      $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
      });
     </script>
     <script>
        if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js');
        }
     </script>
</body>
</html>
