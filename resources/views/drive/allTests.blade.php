<x-drive-layout>

    <x-slot:details>
        <div class="py-1 px-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Name:</div>
                    <div class="col  p-0 ms-2">{{ $drive->name }}</div>
                </div>
                <div class="row">
                    <div class="col-auto w-bold fw-bold">Drive Date:</div>
                    <div class="col  ">{{ date('d-m-Y', strtotime($drive->created_at)) }}</div>
                </div>
                <div class="row ">
                    <div class="col-auto fw-bold ">Drive Type:</div>
                    <div class="col  ">{{ $drive->drive_type }}</div>
                </div>
                <div class="row align-middle">
                    <a class="btn btn-success me-3" href="{{ route('addTest', $drive->id) }} "> Add New Test</a>

                </div>
            </div>
        </div>
    </x-slot:details>

    <x-slot:navItem>

        <li class="nav-item">
            <a class="nav-link active px-5" href="{{ route('drives.tests', $drive->id) }}">Tests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('drives.candidates', $drive->id) }}">All Candidates</a>
        </li>
    </x-slot:navItem>

    <div class="col mt-5 m-4">
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration <span class="leadw">(mins)</span> </th>
                    <th scope="col">Created On</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($driveTests as $key => $item)
                    <tr>
                        <th scope="row">{{ $driveTests->firstItem() + $key }}</th>
                        <td>{{ $item->test->name }}</td>
                        <td>{{ $item->test->duration / 60 }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->test->created_at)) }} </td>
                        <td>
                            <div class="d-flex gap-3 ">
                                <div class="">
                                    <a href="{{ route('driveTest', $item->id) }}"
                                        class="btn btn-success fw-bold ">View</a>
                                </div>
                                <div>

                                    <form class="dropdown-item text-center"
                                        action="{{ route('removeTest', $item->id) }}" {{-- $test->id means driveTest->id Check for loop --}}
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to remove this test?');"
                                            class="btn btn-danger fw-bold w-100 text-decoration-none ">Remove
                                            Test</button>
                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $driveTests->links() }}

    </div>
    <x-flash />
</x-drive-layout>
