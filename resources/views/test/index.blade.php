<x-layout>
    <x-slot:title>
        Tests
    </x-slot:title>
    <x-panel class="border-dark bg-light">
        <div class="d-flex justify-content-between mb-5 pb-4 border-bottom border-3 border-secondary-subtle">
            <h3>All Tests</h3>
            <a class="btn btn-success me-3" href="{{ route('tests.create') }} "> Add a New Test</a>
        </div>

        <div class="list-group">
            @foreach ($tests as $test)
                <li class="list-group-item list-group-item-action border border-secondary border-3 mx-auto d-flex gap-3 py-3 mb-4 "
                    onclick="location.href='{{ route('tests.show', $test->id) }}' " aria-current="true"
                    style="--bs-border-opacity: .5;">

                    <div class="d-flex gap-2 w-75 justify-content-between">
                        <div>

                            <h6 class="mb-0  h6 text-decoration-none fs-3">{{ $test->name }} </h6>
                            <span class="fw-light text-secondary-subtle fs-6">
                                {{ date('d-m-Y', strtotime($test->created_at)) }} </span>

                        </div>

                    </div>
                    <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                        <div>

                            <form class="dropdown-item text-center" action="{{ route('tests.destroy', $test->id) }} "
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this test?');"
                                    class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>

                            </form>

                        </div>
                        <div>
                            <a href="{{ route('tests.edit', $test->id) }} " class="btn btn-warning">Edit</a>
                        </div>
                        <div>
                            <a href="{{ route('tests.show', $test->id) }} " class="btn btn-primary">View</a>
                        </div>

                    </div>
                </li>
            @endforeach

        </div>

    </x-panel>
    <x-flash />
</x-layout>
