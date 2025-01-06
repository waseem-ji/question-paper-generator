<x-drive-layout>
    <x-slot:details>
        <div class="py-2 px-0">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-auto fw-bold p-0">Drive Name:</div>
                    <div class="col p-0 ms-2"><a class="text-decoration-none"
                            href="{{ route('drives.show', $driveTest->drive->id) }}">{{ $driveTest->drive->name }}</a>
                    </div>
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
            <a class="nav-link px-5" href="{{ route('driveTest.candidates', $driveTest->id) }}">Candidates</a>
        </li>
    </x-slot:navItem>
    {{-- Can include the test paper here in the info page --}}
    <div class="container-fluid">
        <div class="row mt-2 mb-5 border-0  bg-light mx-2 p-3">

            <div class="col">
                <h3>Specific Questions</h3>
                <table id="questionTable" class="table table-bordered table-hover table-light py-3">
                    @php
                        $questions = $driveTest->test->specific_questions;
                        $random = $driveTest->test->random_questions;
                    @endphp
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Choice</th>
                            <th scope="col">Category</th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider border-1">
                        @foreach ($questions as $key => $question)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $question->question->question }}</td>
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

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="row mt-4 mx-auto">
                <h3>Random Questions</h3>
                <table class=" table table-bordered table-hover table-light ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Number of questions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
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
        </div>
    </div>
</x-drive-layout>
