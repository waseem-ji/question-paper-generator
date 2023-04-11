<x-drive-layout>
    <x-slot:details>
        <div class="py-2 px-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Name:</div>
                    <div class="col p-0 ms-2"><a class="text-decoration-none" href="{{route('drives.show',$driveTest->drive->id)}}">{{$driveTest->drive->name}}</a> </div>
                </div>
                <div class="row">
                    <div class="col-auto fw-bold p-0">Test Name:</div>
                    <div class="col  p-0 ms-2">{{ $driveTest->test->name }}</div>
                </div>
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Date:</div>
                    <div class="col p-0 ms-2">{{ date('d-m-Y', strtotime($driveTest->drive->created_at)) }}</div>
                </div>
                <div class="row ">
                    <div class="col-auto fw-bold p-0">Drive Type:</div>
                    <div class="col p-0 ms-2">{{ $driveTest->drive->drive_type }}</div>
                </div>
                <div class="row align-middle">

                </div>
            </div>
        </div>
    </x-slot:details>
    <x-slot:navItem>
        <li class="nav-item ">
            <a class="nav-link active px-5" aria-current="page" href="{{ route('driveTest', $driveTest->id) }}">Question
                Paper</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{ route('driveTest.tokens', $driveTest->id) }}">Tokens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-5" href="{{route('driveTest.candidates',$driveTest->id)}}">Candidates</a>
        </li>
    </x-slot:navItem>
    {{-- Can include the test paper here in the info page --}}
    <div class="container">
        <x-panel class="mt-2 mb-5 border-0  bg-light">
        <div class="row">
            <div class="col">

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

                </div>
            </div>
            <div class="row">
                <table class=" table table-bordered table-hover table-light ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Number of questions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider border-2">
                        @foreach ($random as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->difficulty }}</td>
                                <td>{{ $item->number_of_questions }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </x-panel>
    </div>
</x-drive-layout>
