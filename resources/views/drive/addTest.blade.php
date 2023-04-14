<x-layout>
    <x-slot:title>
        <h3>Add Test to drive</h3>
    </x-slot:title>
    <x-panel>

        <div class="d-flex justify-content-between mb-5">

            <a class="btn btn-primary me-3" href="{{ route('drives.tests', $drive_id) }} ">Go Back</a>
            <p></p>
            {{-- <a class="btn btn-success me-3" href="{{ route('addTest', $drive->id) }} "> Add New Test</a> --}}

        </div>
        <div class="list-group">
            @foreach ($tests as $test)
                <li class="list-group-item list-group-item-action border border-secondary border-3 mx-auto d-flex gap-3 py-3 mb-4 "
                    aria-current="true" style="--bs-border-opacity: .5;">

                    <div class="d-flex gap-2 w-75 justify-content-between">
                        <div>

                            <h6 class="mb-0  h6 text-decoration-none fs-3">{{ $test->name }} </h6>
                            <span class="fw-light text-secondary-subtle fs-6">
                                {{ date('d-m-Y', strtotime($test->created_at)) }} </span>

                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                        <div>

                            <form class="dropdown-item text-center" action="{{ route('storeTest') }}" method="post">
                                @csrf

                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                <input type="hidden" name="drive_id" value="{{ $drive_id }}">
                                <button type="submit"
                                    class="btn btn-success fw-bold w-100 text-decoration-none ">Select</button>

                            </form>

                        </div>

                        <div>
                            <a href="{{ route('tests.show', $test->id) }} " class="btn btn-primary">View</a>
                        </div>

                    </div>
                </li>
            @endforeach

        </div>

    </x-panel>
</x-layout>
