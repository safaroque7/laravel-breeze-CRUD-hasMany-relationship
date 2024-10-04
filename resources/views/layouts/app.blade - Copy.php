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
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />

  <link
    rel="stylesheet"
    href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
  />

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
  />

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
                  <a href="dashboard.html" class="text-white text-decoration-none">
                    Dashboard
                  </a>
                </h2>
      
                <div class="time-and-date-par">
                  <h5 class="mb-0 text-white">
                    Friday, 30 September 2024 <i class="bi bi-dash"></i> 08:04 PM
                  </h5>
                </div>
      
                <div
                  class="login-info d-flex jusity-content-betwee align-items-center py-md-2 py-1"
                >
                  <p class="text-white pe-md-3 pe-2 mb-0">S A Faroque</p>
                  <div class="dropdown">
                    <div
                      class="dropdown-toggle bg-dark"
                      id="profile1"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <img
                        src="https://picsum.photos/id/5/30/30"
                        alt=""
                        class="img-fluid rounded-circle border border-white"
                      />
                      <span class="text-white"
                        ><i class="bi bi-caret-down-fill"></i
                      ></span>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="profile1">
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><a class="dropdown-item" href="#">Sign Out</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-between">
              <div class="col-md-2 bg-dark vh-100 px-0">
                <ul class="nav flex-column">
                  <li class="nav-item border-bottom">
                    <a class="nav-link text-white" href="all-clients.html">
                      <i class="bi bi-people-fill"></i>
                      <i class="bi bi-person-fill-add"></i>
                      All Cleints</a
                    >
                  </li>
      
                  <li class="nav-item">
                    <a class="nav-link text-white" href="add-new-client.html">
                      <i class="bi bi-person-plus-fill"></i> Add New Cleint
                    </a>
                  </li>
                </ul>
              </div>
      
              <div class="col-md-10 mt-5">
                <div class="row">
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light rounded-3 border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Total Clients
                      </h4>
                      <h1 class="total-items">
                        <a href="all-clients.html" class="text-decoration-none text-dark"> 305 </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light rounded-3 border border-success">
                      <h4 class="text-white bg-success py-2 rounded-top">
                        Active Clients
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 100 </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light rounded-3 border border-danger">
                      <h4 class="text-white bg-danger py-2 rounded-top">
                        Inactive Clients
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00 </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Linkon Domains
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark">00</a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Linkon Hosting
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00 GB </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Linkon Hosting BDiX
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00GB </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Adil Domains
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00 </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Adil Hostings
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00GB </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light rounded-3 border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        All Emails
                      </h4>
                      <h1 class="total-items">
                        <a
                          href="#"
                          class="text-decoration-none text-dark"
                        >
                          00
                        </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light rounded-3 border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        All Phone Numbers
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark"> 00 </a>
                      </h1>
                    </div>
                  </div>
      
                  <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
                    <div class="bg-light border border-secondary">
                      <h4 class="text-white bg-secondary py-2 rounded-top">
                        Total Hosting Size
                      </h4>
                      <h1 class="total-items">
                        <a href="#" class="text-decoration-none text-dark">00GB </a>
                      </h1>
                    </div>
                  </div>
                </div>
              </div>
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
            $(function () {
              $("#table_id").dataTable();
            });
          </script>
      
          <!-- Optional JavaScript; choose one of the two! -->
      
          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
          ></script>
      
          <!-- Option 2: Separate Popper and Bootstrap JS -->
          <!--
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
          -->
        
    
    </body>
</html>
