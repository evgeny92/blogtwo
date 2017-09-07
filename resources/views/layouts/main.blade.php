<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>

    <body>
        @include('partials.nav')

        <div class="container">

            @include('partials.messages')

            @yield('content')

            @include('partials.footer')
        </div> <!-- end of .container -->

            @include('partials.javascript')
            @yield('scripts')
    </body>
</html>