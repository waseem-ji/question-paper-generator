<x-layout>
    <x-slot:title>
        <h3>Add Test to drive</h3>
    </x-slot:title>
    <x-panel class="bg-light">

        <div class="d-flex justify-content-between mb-5">

            <a class="btn btn-primary me-3" href="{{ route('drives.tests', $drive_id) }} ">Go Back</a>
            <p></p>
            {{-- <a class="btn btn-success me-3" href="{{ route('addTest', $drive->id) }} "> Add New Test</a> --}}

        </div>
        <table class="table table-bordered table-hover table-light ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($tests as $key => $test)
                    <tr>
                        <th scope="row">{{ $tests->firstItem() + $key }}</th>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->duration / 60 }}</td>
                        <td>{{ date('d-m-Y', strtotime($test->created_at)) }} </td>
                        {{-- <td>{{ $test->specific_questions->count()  }} </td> --}}
                        <td>
                            <div class="d-flex gap-3 ">
                                {{-- <div class="">
                                    <a href="{{ route('tests.show', $test->id) }} " class="btn btn-primary">View</a>
                                </div> --}}
                                <div>
                                    <form class="dropdown-item text-center" action="{{ route('storeTest') }}"
                                        method="post">
                                        @csrf

                                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                                        <input type="hidden" name="drive_id" value="{{ $drive_id }}">
                                        <button type="submit"
                                            class="btn btn-success fw-bold w-100 text-decoration-none ">Select</button>

                                    </form>

                                </div>

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $tests->links() }}

    </x-panel>
</x-layout>
