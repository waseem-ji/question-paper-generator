<x-layout>
    <x-slot:title>
        <h3>Test: {{ $test->name }}</h3>
    </x-slot:title>
    <x-panel class="mt-5 border-2 border-dark-subtle mb-4">
        <div class="d-flex justify-content-between mb-5">

            <a class="btn btn-primary me-3" href="{{ route('tests.index') }}">Go Back</a>
            <a class="btn btn-success me-3" href="{{ route('addQuestion', $test->id) }}"> Add Questions</a>

        </div>

        @php
            $questions = $test->specific_questions;
            $random = $test->random_questions;
        @endphp

        {{-- asdasd --}}
        @foreach ($questions as $question)
            <div class="card w-75 mx-auto m-5 rounded-3 border-1 border-dark ">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            Question {{ $loop->iteration }}
                        </div>
                        <div class="me-3">
                            {{-- <span class="badge bg-primary ms-3 p-2">
                                {{ $question->category->name }}</span> --}}
                            <span
                                class="badge < class= p-2 '
                                            @php switch ($question->question->difficulty) {
                                                case 'hard':
                                                    echo 'bg-danger';
                                                    break;
                                                case 'medium':
                                                    echo 'bg-warning';
                                                    break;
                                                case 'easy':
                                                    echo 'bg-success';
                                                    break;
                                            } @endphp
                                            ' >
                                        {{ $question->question->text }}
                                    ">
                                {{ $question->question->difficulty }} </span>

                            <span class="badge bg-info p-2 "> {{ $question->question->type }} </span>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $question->question->question }} </p>

                        @isset($question->question->choice)
                            <div class="list-group">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>

                                        @php
                                            $choice = json_decode($question->question->choice);
                                        @endphp
                                        @foreach ($choice as $key => $item)
                                            <div>
                                                <span class="fw-bold me-2"> {{ $key }} </span>
                                                {{ $item }}
                                            </div>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                        @endisset

                    </blockquote>

                </div>

                <div class="card-footer text-body-secondary bg-white  rounded-bottom-4  ">
                    <div class="d-flex justify-content-end gap-3 align-items-center p-2">
                        <div>

                            <form class="dropdown-item text-center"
                                action="{{ route('removeSpecific', $question->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this question from {{$test->name}} exam?');"
                                    class="badge  bg-danger border-0 p-3 fs-6 fw-bold w-100 text-decoration-none ">Remove
                                    question from test</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-10 mx-auto">
            <table class=" table table-bordered table-hover table-light ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Difficulty</th>
                        <th>Number of questions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider border-2">
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
