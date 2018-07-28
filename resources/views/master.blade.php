<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    
    <body>
        @include('partials._nav')

        <div class="container">
            @include('partials._messages')
            @yield('content')
            <hr>
            @include('partials._footer')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>