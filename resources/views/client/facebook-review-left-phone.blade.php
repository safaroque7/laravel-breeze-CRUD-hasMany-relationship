<x-dashboard-container>
    <div class="col-md-10 mt-5">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('all-clients') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Facebook Review Left Emails </li>
            </ol>
        </nav>

        <div class="p-2 border border-secondary rounded">
            <code>
                @foreach ($facebookReviewLeftPhoneCollection as $facebookReviewLeftPhoneItem)
                    {{ __($facebookReviewLeftPhoneItem->phone) . ', ' }}
                @endforeach
            </code>
        </div>

    </div>

</x-dashboard-container>
