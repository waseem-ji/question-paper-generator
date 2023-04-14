<x-layout>
    <x-slot:title>
        <h3>Test: {{ $test->name }}</h3>
    </x-slot:title>
    <x-panel class="mt-5 border-2 border-dark-subtle mb-4">
        <div class="d-flex justify-content-between mb-5">

            <a class="btn btn-primary me-3" href="{{ route('tests.index') }}">Go Back</a>
            <a class="btn btn-success me-3" href="{{ route('addQuestion', $test->id) }}"> Add Questions</a>

        </div>
        <h4>Questions</h4>
        <table class="table table-bordered table-hover table-light py-3">
            @php
                $questions = $test->specific_questions;
                $random = $test->random_questions;
            @endphp
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Choice</th>
                    <th scope="col">Category</th>
                    <th scope="col">Difficulty</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider border-1">
                @foreach ($questions as $key => $question)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td style="width:60%;">{{ $question->question->question }}</td>
                        @isset($question->question->choice)
                            <div class="list-group">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>

                                        @php
                                            $choice = json_decode($question->question->choice);
                                        @endphp
                                        <td>

                                            @foreach ($choice as $key => $item)
                                                <div>
                                                    <p> {{ $key }}: {{ $item }} </p>

                                                </div>
                                            @endforeach
                                        </td>
                                    </div>

                                </div>

                            </div>
                        @endisset
                        <td>{{ $question->question->category->name }}</td>
                        <td>{{ $question->question->difficulty }}</td>
                        <td>{{ $question->question->type }}</td>
                        <td>
                            <form class="dropdown-item text-center"
                                action="{{ route('removeSpecific', $question->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this question from {{ $test->name }} exam?');"
                                    class="badge  bg-danger border-0 py-2 fs-6 fw-bold w-100 text-decoration-none ">Remove
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="col mt-5">
            <h4>Random Questions</h4>
            <table class=" table table-bordered table-hover table-light">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Difficulty</th>
                        <th>Number of questions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider border-1">
                    @foreach ($random as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->difficulty }}</td>
                            <td>{{ $item->number_of_questions }}</td>
                            <td>
                                <form class="" action="{{ route('removeRandom', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this random combination?');"
                                        class="badge  bg-danger border-danger fs-6 fw-bold text-decoration-none ">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-panel>
    <x-flash />
</x-layout>
