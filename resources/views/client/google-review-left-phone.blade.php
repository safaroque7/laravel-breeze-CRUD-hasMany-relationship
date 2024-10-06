<x-dashboard-container>
    <div class="col-md-10 mt-5">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Google Review Left Phone </li>
            </ol>
        </nav>

        <div class="p-2 border border-secondary rounded">
            <code>
                @foreach ($getGoogleReviewLeftPhoneCollection as $getGoogleReviewLeftPhoneItem)
                    {{ __($getGoogleReviewLeftPhoneItem->phone) . ', ' }}
                @endforeach
            </code>
        </div>

    </div>

</x-dashboard-container>
