<x-layout>
    <x-slot:title>
        <h3>All Tests</h3>
        <a class="btn btn-success me-3" href="{{ route('tests.create') }} "> Add a New Test</a>
    </x-slot:title>

    <div>
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($tests as $key => $test)
                    <tr>
                        <th scope="row">{{ $tests->firstItem() + $key }}</th>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->duration }}</td>
                        <td>{{ date('d-m-Y', strtotime($test->created_at)) }} </td>
                        <td>
                            <div class="d-flex gap-3 ">
                                <div>
                                    <a href="{{ route('tests.show', $test->id) }} " class="btn btn-primary">View</a>
                                </div>
                                <div>
                                    <a href="{{ route('tests.edit', $test->id) }} " class="btn btn-warning">Edit</a>
                                </div>
                                <div>

                                    <form class="dropdown-item text-center"
                                        action="{{ route('tests.destroy', $test->id) }} " method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this test?');"
                                            class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $tests->links() }}

    </div>
    <x-flash />
</x-layout>
