<x-drive-layout>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link  px-5" aria-current="page" href="{{route('drives.show',$drive->id)}} ">Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active px-5" href="{{route('showDriveTests',$drive->id)}}">Tests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="#">All Candidates</a>
        </li>
        <li class="nav-item px-5">
            <a class="nav-link disabled">Tokens</a>
        </li>
    </x-slot:navItem>

    <x-panel class="mt-5 border-2 border-success-subtle">
        <div class="d-flex justify-content-between mb-5">

            <a class="btn btn-primary me-3" href="{{ route('drives.index') }} ">Go Back</a>
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
                        <div class="">
                            <a href="{{ route('driveTest',$test->test->id) }}"
                                class="btn btn-success border border-warning border-4">View</a>
                        </div>

                    </div>
                </li>
            @endforeach
        </div>
    </x-panel>
    <x-flash />
</x-drive-layout>
