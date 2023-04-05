<x-drive-layout>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link px-5" aria-current="page" href="{{ route('driveTest', $driveTest->id) }}">Question Paper</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active px-5" href="{{ route('driveTest.tokens', $driveTest->id) }}">Tokens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="#">Candidates</a>
        </li>
    </x-slot:navItem>
    <div class="container">
        <div class="row">
            <div class="col">
                <x-panel class="bg-white mb-3">
                    <h3> Test Name: {{ $driveTest->test->name }} </h3>
                    <h4 class="mb-0">Drive Name: <a class="text-decoration-none" href="{{route('showDriveTests',$driveTest->drive->id)}} ">{{ $driveTest->drive->name }}</a> </h4>
                    <p class="mb-0">Drive Date: {{ date('d-m-Y', strtotime($driveTest->drive->created_at)) }} </p>
                    <p class="">Drive Type: {{ $driveTest->drive->drive_type }} </p>
                </x-panel>
                <x-panel class="bg-white rounded-1 col-7 mx-auto">
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
            <div class="col-9 mx-auto">
                <table class="table table-striped table-hover table-info ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Token</th>
                            <th scope="col">Expiry</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($allTokens as $token)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $token->token }}</td>
                                <td>{{ $token->expiry }}</td>
                                <td>{{ $token->is_expired ? 'Expired' : 'Active' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-drive-layout>
