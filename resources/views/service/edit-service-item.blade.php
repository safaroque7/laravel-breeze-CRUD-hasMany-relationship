<x-dashboard-container>
    <div class="col-md-10 mt-5">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Service Name </li>
            </ol>
        </nav>

        <div class="col-md-10 mt-md-5 mt-2 mb-md-4 mb-3">
            @if (session('success'))
                <h2 class="text-success"> {{ session('success') }} </h2>
            @endif

            <h1> Edit: <span class="text-info"> {{ __($editableServiceItem->name) }} </span> </h1>
            <form action="{{ route('update-service-item', _($editableServiceItem->id) ) }}" method='POST'>
                @csrf
                <div class="row mb-md-3 mb-2">
                    <div class="col-md-4">
                        <label for="service-name" class="form-label"> Category Name </label>
                        <input autofocus type="text" name="name"
                            class="form-control mb-md-1 border-@if ($errors->has('name')) {{ __('danger') }} @endif"
                            id="service-name" value="{{ _($editableServiceItem->name) }}">

                        <div class="d-flex mb-md-3 mb-2">
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

                    <div class="col-md-8">
                        <table id="table_id" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allServiceCollection as $allServiceItem)
                                    <tr>
                                        <td> {{ __($allServiceItem->id) }} </td>
                                        <td> {{ __($allServiceItem->name) }} </td>

                                        <td>
                                            <button class="btn btn-info text-white">
                                                <a href="{{ route('edit-service-item', __($allServiceItem->id)) }}"
                                                    class="text-decoration-none text-white"> Edit </a>
                                            </button>
                                            <button class="btn btn-danger text-white">
                                                <a onclick="return confirm('Are you sure you want to delete this service item?')" href="{{ route('delete-service-item', __($allServiceItem->id)) }}"
                                                    onclick="return confirm('Are you sure you want to delete this category name?')"
                                                    class="text-decoration-none text-white"> Delete </a> </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-container>
