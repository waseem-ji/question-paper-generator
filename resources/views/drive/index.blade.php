<x-layout>
    <x-slot:title>
        <h3>All Drives</h3>
        <a class="btn btn-success me-3" href="{{ route('drives.create') }} "> Add a New Drive</a>
    </x-slot:title>

    
    <div>
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Drive Type</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($drives as $key => $drive)
                    <tr>
                        <th scope="row">{{ $drives->firstItem() + $key }}</th>
                        <td>{{ $drive->name }}</td>
                        <td>{{ $drive->drive_type }}</td>
                        <td>{{ date('d-m-Y', strtotime($drive->created_at)) }} </td>
                        <td>
                            <div class="d-flex gap-3 ">
                                <div>
                                    <a href="{{ route('drives.show', $drive->id) }} " class="btn btn-primary">View</a>
                                </div>
                                <div>
                                    <a href="{{ route('drives.edit', $drive->id) }} " class="btn btn-warning">Edit</a>
                                </div>
                                <div>

                                    <form class="dropdown-item text-center"
                                        action="{{ route('drives.destroy', $drive->id) }} " method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $drives->links() }}

    </div>
    <x-flash />
</x-layout>
