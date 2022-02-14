<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="">
  <script src="{{ mix('/js/app.js') }}"></script>
  <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">


</head>
  <body class="bg-gradient-to-r from-slate-50 to-white">
      <nav class="flex items-center justify-between flex-wrap bg-indigo-400 p-6">
        <a href="/">
          <div class="flex items-center flex-shrink-0 text-white mr-6">
              <svg class="fill-current h-8 w-8 mr-2" xmlns="http://www.w3.org/2000/svg" version="1.1" width="16" height="16" viewBox="0 0 16 16" enable-background="new 0 0 16 16">
              <path d="M0,9l4,1.5L6,16l2.861-3.82L14,14l2-14L0,9z M7.169,11.44l-0.916,2.485l-1.086-3.118l8.402-7.631L7.169,11.44z"/>
                </svg>          
                <span class="font-semibold text-xl tracking-tight">Flight - it!</span>          
              </div>
            </a>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
              <a href="/manage/cities" class="block mt-4 lg:inline-block lg:mt-0 text-indigo-200 hover:text-white mr-4">
                Manage Cities
              </a>
              <a href="/manage/companies" class="block mt-4 lg:inline-block lg:mt-0 text-indigo-200 hover:text-white mr-4">
                Manage Companies
              </a>
              <a href="/manage/flights" class="block mt-4 lg:inline-block lg:mt-0 text-indigo-200 hover:text-white mr-4">
                Manage Flights
              </a>
              <a href="/list/flights" class="block mt-4 lg:inline-block lg:mt-0 text-indigo-200 hover:text-white">
                List Flights
              </a>
            </div>
          </div>
        </nav>
        {{ $slot }}    
        
  <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
  <script>
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  </script>
  @stack('scripts')
  </body>
</html>