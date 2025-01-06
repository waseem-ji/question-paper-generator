<x-drive-layout>
    <x-slot:details>
        <div class="py-2 px-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Name:</div>
                    <div class="col p-0 ms-2"><a class="text-decoration-none"
                            href="{{ route('drives.show', $driveTest->drive->id) }}">{{ $driveTest->drive->name }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto fw-bold p-0">Test Name:</div>
                    <div class="col  p-0 ms-2">{{ $driveTest->test->name }}</div>
                </div>
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Date:</div>
                    <div class="col p-0 ms-2">{{ date('d-m-Y', strtotime($driveTest->drive->created_at)) }}</div>
                </div>
                <div class="row ">
                    <div class="col-auto fw-bold p-0">Drive Type:</div>
                    <div class="col p-0 ms-2">{{ $driveTest->drive->drive_type }}</div>
                </div>
                <div class="row align-middle">

                </div>
            </div>
        </div>
    </x-slot:details>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link px-5" aria-current="page" href="{{ route('driveTest', $driveTest->id) }}">Question
                Paper</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('driveTest.tokens', $driveTest->id) }}">Tokens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active px-5" href="{{ route('driveTest.candidates', $driveTest->id) }}">Candidates</a>
        </li>
    </x-slot:navItem>
    {{-- Can include the test paper here in the info page --}}
    <div class="container-fluid">
        <div class="row me-3 mb-3">
            <div class="d-flex justify-content-end">
                <form method="GET" action="#" class="row">
                    <label for="cutOff"
                        class="col-auto d-flex align-items-center justify-content-center fw-medium">CutOff
                        Mark
                    </label>
                    <input type="text" name="cutOff" id="cutOff" placeholder="Enter CutOff Mark"
                        class="form-control-lg border-0 fw-lighter bg-light col" value="{{ request('cutOff') }}">
                </form>
            </div>
        </div>
        <div class="row mt-2 mb-5 border-0  bg-light mx-2 p-3">

            <div class="col">

                <table class="table table-bordered table-hover table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Position</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($candidateTests as $key => $candidateTest)
                            {{-- @if ($candidateTest->result > $cutOff) --}}
                            <tr>
                                <th scope="row">{{ $candidateTests->firstItem() + $key }}</th>
                                <td>{{ $candidateTest->candidate->name }}</td>
                                <td>{{ $candidateTest->candidate->email }}</td>
                                <td>{{ $candidateTest->candidate->phone }}</td>
                                <td>{{ $candidateTest->candidate->position }}</td>
                                <td>{{ $candidateTest->result }}</td>
                            </tr>
                            {{-- @endif --}}
                        @endforeach

                    </tbody>
                </table>
                {{ $candidateTests->links() }}
            </div>

        </div>
    </div>
</x-drive-layout>
