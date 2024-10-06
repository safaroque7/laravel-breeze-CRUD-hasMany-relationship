<x-dashboard-container>
    <div class="col-md-10 mt-5">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client's Profile</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <h1 class="mb-0"> <a href="#" class="text-dark"> <i class="transition bi bi-chevron-compact-left hover-item-arrow"></i> </a> </h1>
            </div>
            <div class="col-md-3">
                <img src="/images/{{ $singleClientInformation->client_photo }}" alt="" class="img-fluid" onerror="this.onerror=null;this.src='https://picsum.photos/id/{{ __($singleClientInformation->id) }}/370/483';">
            </div>
            <div class="col-md-5">

                <div class="d-flex flex-column">

                    <p class="pb-2 border-bottom border-grey"> Name : <span class="fw-bold text-uppercase"> {{ __($singleClientInformation->name) }} </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Phone : <span> <a href="tel:01915344418"> {{ __($singleClientInformation->phone) }} </a>
                        </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Email : <span> <a href="mailto:{{ __($singleClientInformation->email) }}"> {{ __($singleClientInformation->email) }} </a> </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Gender : <span> {{ __($singleClientInformation->gender == 1) ? "Male" : "Female" }} </a> </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Address : <span> {{ __($singleClientInformation->address) }} </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Facebook Review : <span> {{ __($singleClientInformation->facebook_review == 1) ? "Yes" : "No" }} </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Google Review : <span> {{ __($singleClientInformation->google_review == 1) ? "Yes" : "No" }} </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Services : <span> {{ __($singleClientInformation->services) }} </span> </p>
                    <p class="pb-2 border-bottom border-grey"> Page Number : <span> {{ __($singleClientInformation->page_number) }} </span> </p>

                    <div class="border-bottom border-grey">
                        <div class="dropdown">
                            Action :
                            <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots-vertical"></i>                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="{{ route('edit-single-client-info', $singleClientInformation->id) }}">Edit</a></li>
                                <li><a onclick="return confirm('Are you sure you want to delete this item?')" class="dropdown-item" href="{{ route('delete-single-client-info', $singleClientInformation->id) }}">Delete</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <h1 class="mb-0"> <a href="#" class="text-dark"> <i class="transition bi bi-chevron-compact-right hover-item-arrow"></i> </a> </h1>
            </div>
        </div>
    </div>

</x-dashboard-container>