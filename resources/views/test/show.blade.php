<x-layout>
    <x-slot:title>
        View Test
    </x-slot:title>
    <x-panel class="border-top-0 border-3 shadow-sm bg-success bg-opacity-10">
        <div class="container">
            <div class="row">
                <div class="col ">
                    <span class="fw-bold fs-4">
                        {{ $test->name }}
                    </span>
                </div>
                <div class="col">

                    <span class="fs-4">

                    </span>
                </div>
                <div class="col text-end">
                    <span class="fs-5">

                        Test Duration

                    </span>
                </div>
            </div>
        </div>
    </x-panel>
    <x-panel class="mt-5 border-2 border-danger-subtle">
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
            <div class="card w-75 mx-auto m-5 rounded-4">
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
                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                    class="badge  bg-danger-subtle text-dark p-3  border-0 fs-6 fw-bold w-100 text-decoration-none ">Remove
                                    question from test</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">
            @foreach ($random as $item)

                <div class="col-sm-3 p-4 mb-3">
                    <div class="card bg-success-subtle shadow rounded-4 border-success">
                        <div class="card-body">
                            <h5 class="card-title">Category : {{ $item->category->name }}</h5>
                            <p class="card-text fs-5">Difficulty : {{ $item->difficulty }} </p>
                            <p class="card-text">Number of questions : {{ $item->number_of_questions }} </p>

                            <form class="dropdown-item text-center"
                                action="{{route('removeRandom',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                    class="badge  bg-danger-subtle text-dark p-3 border-danger fs-6 fw-bold w-100 text-decoration-none ">Remove
                                    question from test</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-panel>
    <x-flash />
</x-layout>
