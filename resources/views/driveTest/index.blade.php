<x-drive-layout>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link active px-5" aria-current="page" href="{{ route('driveTest', $driveTest->id) }}">Question Paper</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{route('driveTest.tokens',$driveTest->id)}}">Tokens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="#">Candidates</a>
        </li>
    </x-slot:navItem>
    {{-- Can include the test paper here in the info page --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <x-panel class="mt-2 mb-5 border-0  bg-white">
                    <x-panel class="bg-white">
                        <h3> Test Name: {{ $driveTest->test->name }} </h3>
                        <h4 class="mb-0">Drive Name: <a class="text-decoration-none" href="{{route('showDriveTests',$driveTest->drive->id)}} ">{{ $driveTest->drive->name }}</a> </h4>
                        <p class="mb-0">Drive Date: {{ date('d-m-Y', strtotime($driveTest->drive->created_at)) }} </p>
                        <p class="">Drive Type: {{ $driveTest->drive->drive_type }} </p>
                    </x-panel>

                    <div class="d-flex justify-content-between mb-5">

                    </div>

                    @php
                        $questions = $driveTest->test->specific_questions;
                        $random = $driveTest->test->random_questions;
                    @endphp

                    {{-- asdasd --}}
                    @foreach ($questions as $question)
                        <div class="card w-75 mx-auto m-5 rounded-2">
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

                        </div>
                    @endforeach

                    <div class="row">
                        @foreach ($random as $item)
                            <div class="col-sm-6 col-lg-3 p-4 mb-3">
                                <div class="card bg-success-subtle  rounded-3 border-success">
                                    <div class="card-body">
                                        <h5 class="card-title">Category : {{ $item->category->name }}</h5>
                                        <p class="card-text fs-5">Difficulty : {{ $item->difficulty }} </p>
                                        <p class="card-text">Number of questions : {{ $item->number_of_questions }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-panel>
            </div>
        </div>
    </div>
</x-drive-layout>
