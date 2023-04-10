<x-drive-layout>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link active px-5" aria-current="page" href="#">Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('showDriveTests', $drive->id) }}">Tests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="#">All Candidates</a>
        </li>
        <li class="nav-item px-5">
            <a class="nav-link disabled">Tokens</a>
        </li>
    </x-slot:navItem>

    <div class="row">
        <div class="col">
            <x-panel class="bg-light">
                <div class="container ">
                    <div class="row p-3">
                        <div class="col-auto fw-bold fs-4">Drive Name:</div>
                        <div class="col fw-bold fs-4">{{ $drive->name }}</div>
                    </div>
                    <div class="row p-3">
                        <div class="col-auto fw-bold fs-4">Drive Date:</div>
                        <div class="col fw-bold fs-4">{{ date('d-m-Y', strtotime($drive->created_at)) }}</div>
                    </div>
                    <div class="row p-3">
                        <div class="col-auto fw-bold fs-4">Drive Type:</div>
                        <div class="col fw-bold fs-4">{{ $drive->drive_type }}</div>
                    </div>
                </div>
            </x-panel>
        </div>
        <div class="col">
            
            <div class="row">
                <div class="col-md-10 col-xl-4  mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Candidates</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1834<span
                                            class=" ms-2 lead">Candidates</span></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 col-xl-4  mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1834<span
                                            class=" ms-2 lead">Tests</span></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-xl-4  mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tokens</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">184<span
                                            class=" ms-2 lead">Tokens</span></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-flash />
</x-drive-layout>
