<x-drive-layout>
    <x-slot:details>
        <div class="py-2 px-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Name:</div>
                    <div class="col  p-0 ms-2">{{ $drive->name }}</div>
                </div>
                <div class="row">
                    <div class="col-auto w-bold ">Drive Date:</div>
                    <div class="col  ">{{ date('d-m-Y', strtotime($drive->created_at)) }}</div>
                </div>
                <div class="row ">
                    <div class="col-auto fw-bold ">Drive Type:</div>
                    <div class="col  ">{{ $drive->drive_type }}</div>
                </div>
                <div class="row align-middle">

                </div>
            </div>
        </div>
    </x-slot:details>

    <x-slot:navItem>

        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('drives.tests', $drive->id) }}">Tests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5 active" href="{{ route('drives.candidates', $drive->id) }}">All Candidates</a>
        </li>

    </x-slot:navItem>

    <div class="row mt-5 m-4">
        <div class="col">
            <table class="table table-bordered table-hover table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Position</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($candidates as $key => $candidate)
                        <tr>
                            <th scope="row">{{ $candidates->firstItem() + $key }}</th>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->email }}</td>
                            <td>{{ $candidate->phone }}</td>
                            <td>{{ $candidate->position }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $candidates->links() }}
        </div>
    </div>
    <x-flash />
</x-drive-layout>
