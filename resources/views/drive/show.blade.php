<x-layout>
    <x-slot:title>
        View Drive
    </x-slot:title>
    <x-panel class="border-top-0 border-3 shadow-sm bg-success bg-opacity-10">
        <div class="container">
            <div class="row">
                <div class="col ">
                    <span class="fw-bold fs-4">
                        {{ $drive->name }}
                    </span>
                </div>
                <div class="col">

                    <span class="fs-4">
                        {{ date('d-m-Y', strtotime($drive->created_at)) }}
                    </span>
                </div>
                <div class="col text-end">
                    <span class="fs-5">
                        {{ $drive->drive_type }}

                    </span>
                </div>
            </div>
        </div>
    </x-panel>
    <x-panel class="mt-5 border-2 border-danger-subtle">
        <div class="d-flex justify-content-between mb-5">
            <h3></h3>
            <a class="btn btn-success me-3" href="{{ route('addTest', $drive->id) }} "> Add New Test</a>

        </div>
        <div class="list-group">
            @foreach ($driveTests as $test)
                <li class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">

                    <div class="d-flex gap-2 w-75 justify-content-between">
                        <div>

                            <h4 class=""> {{ $test->test->name }} </h4>
                            <p class="mb-0 opacity-75 mt-2">

                            </p>
                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                        <div>

                            <form class="dropdown-item text-center" action="{{ route('removeTest', $test->id) }}"
                                {{-- $test->id means driveTest->id Check for loop --}} method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" {{-- onclick="return confirm('Are you sure you want to remove this test?');" --}}
                                    class="btn btn-danger fw-bold w-100 text-decoration-none ">Remove Test</button>
                            </form>

                        </div>

                    </div>
                </li>
            @endforeach
        </div>
    </x-panel>
    <x-flash />
</x-layout>
