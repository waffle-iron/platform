<!DOCTYPE html>
<html class="@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>

    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ baseUrl('/') }}">
    <meta charset="utf-8">
 
    <link rel="stylesheet" href="https://doctub-cdn.netlify.com/assets/styles.css">
    <link rel="stylesheet" media="print" href="https://doctub-cdn.netlify.com/assets/print-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ baseUrl('/translations') }}"></script>

    @yield('head')

    @include('partials/custom-styles')

    @if(setting('app-custom-head') && \Route::currentRouteName() !== 'settings')
        <!-- Custom user content -->
        {!! setting('app-custom-head') !!}
        <!-- End custom user content -->
    @endif
</head>
<body class="@yield('body-class')" ng-app="bookStack">

    @include('partials/notifications')

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4" ng-non-bindable>
                    <a href="{{ baseUrl('/') }}" class="logo">
                        @if(setting('app-logo', '') !== 'none')
                            <img class="logo-image" src="https://doctub-cdn.netlify.com/assets/logo.svg" alt="Logo">
                        @endif
                        @if (setting('app-name-header'))
                            <span class="logo-text">{{ setting('app-name') }}</span>
                        @endif
                    </a>
                </div>
                <div class="col-lg-4 col-sm-3 text-center">
                    <form action="{{ baseUrl('/search') }}" method="GET" class="search-box">
                        <input id="header-search-box-input" placeholder="Search in DocTub" type="text" name="term" tabindex="2" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button id="header-search-box-button" type="submit" class="text-button"><i class="zmdi zmdi-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-5">
                    <div class="float right">
                        <div class="links text-center">
                          <a href="{{ baseUrl('/books') }}" style="background:#8ECC4C;text-shadow:0 1px 1px rgba(0, 0, 0, 0.5)"><i class="zmdi zmdi-book"></i>{{ trans('entities.books') }}</a>
                            @if(signedInUser() && userCan('settings-manage'))
                                <a href="{{ baseUrl('/settings') }}"><i class="zmdi zmdi-settings"></i>{{ trans('settings.settings') }}</a>
                            @endif
                            @if(!signedInUser())
                                <a href="{{ baseUrl('/register') }}" style="background:#f05330"><i class="zmdi zmdi-account-add"></i>Sign Up</a>
                                <a href="{{ baseUrl('/login') }}" style="background:transparent;box-shadow:0 2px 2px transparent">{{ trans('auth.log_in') }}</a>
                            @endif
                            @if(signedInUser())
                                <a href="{{ baseUrl('/books/create') }}" style="background:#f05330"><i class="zmdi zmdi-plus"></i>Create</a>
                            @endif
                        </div>
                        @if(signedInUser())
                            @include('partials._header-dropdown', ['currentUser' => user()])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="content" class="block">
        @yield('content')
    </section>

    <div id="back-to-top">
        <div class="inner">
            <i class="zmdi zmdi-chevron-up"></i> <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>
    <div class="faded-footer toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    <div class="action-buttons text-left">
                        <a href="https://doctub.com" class="text-primary text-button">© 2017 DocTub</a>
                        <a href="https://madewithlove.org.in" target="_blank">Made with&nbsp;&nbsp;<img src="https://doctub-cdn.netlify.com/assets/heart.svg" style="height:11px;margin-bottom:-1px">&nbsp;&nbsp;in India</a>
                    </div>
                </div>
            </div>
        </div>
     </div>
@yield('bottom')
<script src="https://doctub-cdn.netlify.com/assets/common.js"></script>
@yield('scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js"></script>
     <script>
      $(function() {
        var aCodes = document.getElementsByTagName('pre');
        for (var i=0; i < aCodes.length; i++) {
            hljs.highlightBlock(aCodes[i]);
        }
      });
     </script>
</body>
</html>
