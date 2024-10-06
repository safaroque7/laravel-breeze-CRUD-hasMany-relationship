<x-dashboard-container>

    <div class="col-md-10 mt-5">
        @if (session('success'))
            <h1 class="text-success py-2"> {{ __(session('success')) }} </h1>
        @endif

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit Client's Information
                </li>
            </ol>
        </nav>

        <form action="{{ route('update-single-client-info', $editableSingleClientInfo->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row mb-md-3 mb-2">
                <div class="col-md-6">
                    <label for="name" class="form-label"> Name </label>
                    <input type="text" name="name" class="form-control"
                        value="{{ __($editableSingleClientInfo->name) }}" autofocus />

                    @if ($errors->has('name'))
                        <span class="text-danger"> {{ $errors->first('name') }} </span>
                    @endif

                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label"> Phone </label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ __($editableSingleClientInfo->phone) }}" />
                    @if ($errors->has('phone'))
                        <span class="text-danger"> {{ $errors->first('phone') }} </span>
                    @endif
                </div>
            </div>

            <div class="row mb-md-3 mb-2">
                <div class="col-md-4">
                    <label for="email" class="form-label"> Email </label>
                    <input type="email" name="email" class="form-control"
                        value="{{ __($editableSingleClientInfo->email) }}" />
                    @if ($errors->has('email'))
                        <span class="text-danger"> {{ $errors->first('email') }} </span>
                    @endif
                </div>

                <div class="col-md-2">
                    <label class="form-label border-bottom-custom-color-1 d-block">
                        Gender
                    </label>

                    <input @if ($editableSingleClientInfo->gender == 1) checked @endif value="1" class="form-check-input"
                        type="radio" name="gender" id="male" />
                    <label class="form-check-label me-md-2 me-1" for="male"> Male </label>

                    <input class="form-check-input" type="radio" name="gender" id="female"
                        @if ($editableSingleClientInfo->gender == 0) checked @endif value="0" />
                    <label class="form-check-label" for="female"> Female </label>
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label"> Address </label>
                    <input type="text" name="address" class="form-control"
                        value="{{ __($editableSingleClientInfo->address) }}" />
                </div>
            </div>

            <div class="row mb-md-4 mb-3">

                <div class="col-md-2">
                    <label for="facebook-review" class="form-label">
                        Facebook Review
                    </label>
                    <select name="facebook_review" class="form-select">
                        <option @if ($editableSingleClientInfo->facebook_review == 1) Selected @endif value="1">Yes</option>
                        <option @if ($editableSingleClientInfo->facebook_review == 0) Selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="google-review" class="form-label">
                        Gogole Review
                    </label>
                    <select name="google_review" class="form-select">
                        <option @if ($editableSingleClientInfo->google_review == 1) Selected @endif value="1">Yes</option>
                        <option @if ($editableSingleClientInfo->google_review == 0) Selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="pageNumber" class="form-label">
                        Page Number
                    </label>
                    <input type="number" name="page_number" id="pageNumber" class="form-control"
                        value="{{ __($editableSingleClientInfo->page_number) }}" />
                </div>

                <div class="col-md-6">
                    <!-- Facebook Profile Link Start -->
                    <label for="facebookProfileLink" class="form-label border-secondary d-block"> Facebook Profile Link
                    </label>
                    <input type="url" name="facebook_profile_link" id="facebookProfileLink"
                        class="form-control mb-md-3 mb-2"
                        value="{{ __($editableSingleClientInfo->facebook_profile_link) }}">
                </div>
            </div>

            <div class="row mb-md-4 mb-3">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="select-service"
                                class="form-label border-secondary d-block pb-md-2 pb-1 border-bottom-custom-color-1">
                                Select Services
                            </label>

                            <!-- checkbox item -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" id="checkbox1"
                                    value="Online News Portal" @if ($editableSingleClientInfo->services == 'Online News Portal') checked @endif />
                                <label class="form-check-label" for="checkbox1">
                                    Online News Portal
                                </label>
                            </div>

                            <!-- checkbox item -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" id="checkbox2"
                                    value="Official website" @if ($editableSingleClientInfo->services == 'Official website') checked @endif />
                                <label class="form-check-label" for="checkbox2">
                                    Official website
                                </label>
                            </div>

                            <!-- checkbox item -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" id="checkbox3"
                                    value="Scholl/College/University website"
                                    @if ($editableSingleClientInfo->services == 'Scholl/College/University website') checked @endif />
                                <label class="form-check-label" for="checkbox3">
                                    Scholl/College/University website
                                </label>
                            </div>

                            <!-- checkbox item -->
                            <div class="form-check mb-md-3 mb-2">
                                <input type="checkbox" class="form-check-input" name="services[]" id="checkbox4"
                                    value="Personal Website" @if ($editableSingleClientInfo->services == 'Personal Website') checked @endif />
                                <label class="form-check-label" for="checkbox3">
                                    Personal Website
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="status" class="form-label"> Status </label>
                            <select name="status" id="status" class="form-select d-inline">
                                <option @if ($editableSingleClientInfo->status == 1) selected @endif value="1"> Active
                                </option>
                                <option @if ($editableSingleClientInfo->status == 0) Selected @endif value="0"> Inactive
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Date of Birth start -->
                            <label for="DateOfBirth" class="form-label border-secondary d-block"> Date of Birth
                            </label>
                            <input type="date" name="date_of_birth" id="DateOfBirth" class="form-control" value="{{ __($editableSingleClientInfo->date_of_birth) }}"                                >
                        </div>

                    </div>
                </div>


                <div class="col-md-6">
                    <label for="uploadPhoto" class="form-label border-secondary d-block"> Upload Photo </label>
                    <input type="file" name="client_photo" id="uploadPhoto" class="form-control mb-md-3" />
                    <div class="w-50">
                        <img src="/images/{{ __($editableSingleClientInfo->client_photo) }}"
                            alt="{{ __($editableSingleClientInfo->name) }}" class="img-fluid">
                    </div>
                </div>



            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>


</x-dashboard-container>
