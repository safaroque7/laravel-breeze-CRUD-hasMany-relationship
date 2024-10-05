<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @include('layouts.navigation') --}}
    </div>


    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-white">
                    <a href="{{ '/dashboard' }}" class="text-white text-decoration-none">
                        Dashboard
                    </a>

                    <span class="plus-icon-to-add-new-client">
                        <a href="{{ route('add-new-client') }}" class="text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                            </svg>
                        </a>
                    </span>
                </h2>

                <div class="time-and-date-par">
                    <h5 class="mb-0 text-white">
                        Friday, 30 September 2024 <i class="bi bi-dash"></i> 08:04 PM
                    </h5>
                </div>

                <div class="login-info d-flex jusity-content-betwee align-items-center py-md-2 py-1">
                    <p class="text-white pe-md-3 pe-2 mb-0">S A Faroque</p>
                    <div class="dropdown">
                        <div class="dropdown-toggle bg-dark" id="profile1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://picsum.photos/id/5/30/30" alt=""
                                class="img-fluid rounded-circle border border-white" />
                            <span class="text-white"><i class="bi bi-caret-down-fill"></i></span>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="profile1">
                            <li><a class="dropdown-item" href="route('profile.edit')">{{ __('Profile') }}</a></li>
                            <li>
                                <div class="dropdown-item">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col-md-2 bg-dark vh-100 px-0">
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom d-flex justify-content-between align-items-center">
                        <a class="nav-link text-white" href="{{ route('all-clients') }}"> <i class="bi bi-people-fill"></i>
                            <i class="bi bi-person-fill-add"></i> All Cleints </a>

                            <span class="total-clients text-white border border-white rounded-circle py-1 px-2 me-md-3">  </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('add-new-client') }}">
                            <i class="bi bi-person-plus-fill"></i> Add New Cleint
                        </a>
                    </li>
                </ul>
            </div>

            {{ $slot }}

        </div>

        <!-- footer section started -->
        <div class="row bg-dark fixed-bottom">
            <p class="text-center text-white mb-0 py-md-3 py-2">
                @Copyright. All rights reserved.
            </p>
        </div>
        <!-- footer section ended -->
    </div>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            $("#table_id").dataTable();
        });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
              integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
          </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
              integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
          </script>
          -->


</body>

</html>
