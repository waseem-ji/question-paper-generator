<x-drive-layout>
    <x-slot:details>
        <div class="py-2 px-0">
            <div class="container d-flex justify-content-between align-items-center ">
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
            <a class="nav-link active px-5" href="{{ route('driveTest.tokens', $driveTest->id) }}">Tokens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('driveTest.candidates', $driveTest->id) }}">Candidates</a>
        </li>
    </x-slot:navItem>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <x-panel class="bg-light rounded-1 col-6 mx-auto">
                    <div class="ms-5">
                        <form action="{{ route('generateToken', $driveTest->id) }}" class="mt-3" method="POST">
                            @csrf
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="duration" class="col-form-label">Set Duration</label>
                                </div>
                                <div class="col-auto">
                                    <input type="number" id="duration" name="duration" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <span class="form-text">
                                        Enter time in hours
                                    </span>
                                </div>
                            </div>
                            @error('duration')
                                <p class="text-danger">{{ $message }} </p>
                            @enderror
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success me-3" href=" "> Generate
                                    Token</button>

                            </div>

                        </form>
                    </div>
                </x-panel>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col mx-auto">
                <table class="table table-bordered table-hover table-light ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Token</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Expiry</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($allTokens as $key => $token)
                            <tr>
                                <th scope="row">{{ $allTokens->firstItem() + $key }}</th>
                                <td>{{ $token->token }}</td>
                                <td>{{ $token->created_at }}</td>
                                <td>{{ $token->expiry }}</td>
                                @php
                                    $status = false;
                                    if ($token->expiry < Carbon\Carbon::now()) {
                                        $status = true;
                                    }
                                @endphp
                                <td class="fw-bold {{ $status ? 'text-danger' : 'text-success' }}">
                                    {{ $status ? 'Expired' : 'Active' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-drive-layout>
