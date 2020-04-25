<!DOCTYPE html>
<html lang="cs">
<meta charset="UTF-8">
  <head>
    @include('partials._head')
  </head>
  
  <body>

    @include('partials._nav')    

    <div class="container">
      @include('partials._messages')

      @yield('content')

      @include('partials._footer')

    </div> <!-- end of .container --> 

        @include('partials._javascript')

        @yield('scripts')

  </body>
</html>
