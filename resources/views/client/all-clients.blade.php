<x-dashboard-container>



    <div class="col-md-10 mt-5">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Clients</li>
            </ol>
        </nav>


        <table id="table_id" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>FB Review</th>
                    <th>Google Review</th>
                    <th>Project</th>
                    <th>Page No.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($allClients as $allClient)
                    <tr>
                        <td>{{ __($allClient->id) }}</td>
                        <td class="d-flex justify-content-between client-image-size">
                                <img src="/images/{{ $allClient->client_photo }}" alt="{{ $allClient->client_photo }}"
                                    class="img-fluid rounded-circle"
                                    onerror="this.onerror=null;this.src='https://picsum.photos/id/5/50/50';">
                        </td>
                        <td>{{ __($allClient->phone) }}</td>
                        <td> {{ __($allClient->email) }} </td>
                        <td>{{ __($allClient->gender == 1) ? "Male" : "Female" }}</td>
                        <td>
                            {{ __($allClient->address)}}
                        </td>
                        <td>{{ __($allClient->facebook_review == 1) ? "Yes" : "No"}}</td>
                        <td>{{ __($allClient->google_review == 1) ? "Yes" : "No"}}</td>
                        <td> {{ __($allClient->services) }} </td>
                        <td> <a href="#" class="text-dark"> {{ __($allClient->page_number)}} </a> </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="single-profile.html">View</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>




            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>FB Review</th>
                    <th>G Review</th>
                    <th>Project</th>
                    <th>Page No.</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>



</x-dashboard-container>