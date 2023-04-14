<x-layout>
    <x-slot:title>
        <h3>Dashboard</h3>
    </x-slot:title>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body pt-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-3 fs-5">
                                Question Bank</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $questionNumber }}<span
                                    class=" ms-2 lead">Questions</span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success  h-100 py-2">
                <div class="card-body pt-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-success text-uppercase mb-3 fs-5">
                                Tests (Combined)</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $testNumber }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info h-100 py-2">
                <div class="card-body pt-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-info text-uppercase mb-3 fs-5">Drives
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 fw-bold text-gray-800">{{ $drives->count() }}
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning h-100 py-2">
                <div class="card-body pt-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-3 fs-5">
                                Pending Evaluation</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">Current Drives</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div>
                            <table class="table table-bordered table-hover table-light ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"> Drive Type</th>

                                    </tr>
                                </thead>
                                <tbody class="table-group-divider border-1">
                                    @foreach ($drives as $key => $drive)
                                        <tr>
                                            <th scope="row">{{ $drives->firstItem() + $key }}</th>
                                            <td>{{ $drive->name }}</td>
                                            <td>{{ $drive->drive_type }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $drives->links() }}

                        </div>
                        {{-- <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class="">asads</div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class="">ljlknl</div>
                            </div>
                        </div> --}}
                        {{-- <canvas id="myAreaChart" width="1778" height="640"
                            style="display: block; height: 320px; width: 889px;"
                            class="chartjs-render-monitor"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card  mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-primary">Announcements</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="822" height="640"
                            style="display: block; height: 290px; width: 411px;"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                    {{-- <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
