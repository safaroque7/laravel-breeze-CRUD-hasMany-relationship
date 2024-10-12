<x-dashboard-container>
    

    <div class="col-md-10 mt-5">
        @if (session('success'))
            <h1 class="text-success py-2"> {{ __( session('success')) }} </h1>
        @endif

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Add New Client
            </li>
          </ol>
        </nav>

        <form action="{{ route('store-client') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row mb-md-3 mb-2">
            <div class="col-md-6">
              <label for="name" class="form-label"> Name </label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus />

              @if ($errors->has('name'))
                <span class="text-danger"> {{ $errors->first('name') }} </span>
              @endif

            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label"> Phone </label>
              <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"/>
              @if ($errors->has('phone'))
                  <span class="text-danger"> {{ $errors->first('phone') }} </span>
              @endif
            </div>
          </div>

          <div class="row mb-md-3 mb-2">
            <div class="col-md-4">
              <label for="email" class="form-label"> Email </label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
              @if ($errors->has('email'))
                  <span class="text-danger"> {{ $errors->first('email') }} </span>
              @endif
            </div>

            <div class="col-md-2">
              <label class="form-label border-bottom-custom-color-1 d-block">
                Gender
              </label>

              <input class="form-check-input" type="radio" name="gender" value="1" id="male" checked />
              <label class="form-check-label me-md-2 me-1" for="male"> Male </label>

              <input class="form-check-input" type="radio" name="gender" value="0" id="female"/>
              <label class="form-check-label" for="female"> Female </label>
            </div>

            <div class="col-md-6">
              <label for="address" class="form-label"> Address </label>
              <input type="text" name="address" class="form-control" value="{{ old('address') }}"/>
            </div>
          </div>

          <div class="row mb-md-4 mb-3">
            
            <div class="col-md-2">
              <label for="facebook-review" class="form-label">
                Facebook Review
              </label>
              <select name="facebook_review" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="google-review" class="form-label">
                Gogole Review
              </label>
              <select name="google_review" class="form-select">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="pageNumber" class="form-label">
                Page Number
              </label>
              <input
                type="number"
                name="page_number"
                id="pageNumber"
                class="form-control" value="{{ old('page_number') }}"
              />
            </div>

            <div class="col-md-6">
              <label for="uploadPhoto" class="form-label border-secondary d-block">
                Upload Photo
              </label>

              <input
                type="file"
                name="client_photo"
                id="uploadPhoto"
                class="form-control"
              />
            </div>

          </div>

          <div class="row mb-md-4 mb-3">
              <div class="col-md-4">
                <label
                  for="select-service"
                  class="form-label border-secondary d-block pb-md-2 pb-1 border-bottom-custom-color-1"
                >
                  Select Services
                </label>

                @foreach ($allServices as $allServiceItem)

                <!-- checkbox item -->
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="services[]" id="checkbox{{$allServiceItem->id}}" value="{{ $allServiceItem->id }}" />
                  <label class="form-check-label" for="checkbox{{$allServiceItem->id}}"> {{ $allServiceItem->name }} </label>
                </div>

                @endforeach

                
              </div>

              <div class="col-md-2">
                <label for="status" class="form-label"> Status </label>
                    <select name="status" id="" class="form-select d-inline" value="#">
                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                    </select>
              </div>

              <div class="col-md-6">
                <!-- Facebook Profile Link Start -->
                <label for="facebookProfileLink" class="form-label border-secondary d-block"> Facebook Profile Link </label>
                <input type="url" name="facebook_profile_link" id="facebookProfileLink" class="form-control mb-md-3 mb-2">

                <!-- Date of Birth start -->
                <label for="DateOfBirth" class="form-label border-secondary d-block"> Date of Birth </label>
                <input type="date" name="date_of_birth" id="DateOfBirth" class="form-control">
              </div>

          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>

      
</x-dashboard-container>