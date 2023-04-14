<x-candidate-layout>
    {{-- @php
    $current_time = time();

@endphp --}}
    <div class="position-relative">
        <div id="timer" class="position-absolute top-0 end-0 px-4 py-3  text-center fs-4 mb-4 bg-danger fw-bold"
            style="margin-right:280px; width:10%; height:70px"></div>

    </div>
    <div>

        <div class="container-fluid">
            <div class="row bg-info-subtle">
                <div class="d-flex justify-content-between pt-3">
                    <div>
                        <h4> Test: {{ $candidateTest->test->name }}</h4>
                    </div>
                    <div>
                        <button id="prev-btn" class="btn btn-primary mb-3">Previous</button>
                        <button id="next-btn" class="btn btn-primary mb-3 ms-4">Next</button>

                    </div>
                    <div>
                        <button id="next-btn" class="btn btn-success mb-3 ms-4 fw-bold" onclick="submitExam()">Submit
                            And End Exam</button>
                    </div>

                </div>

            </div>
        </div>
        @foreach ($questions as $key => $question)
            <div class="question container-fluid" id="question-{{ $loop->iteration }}" style="margin-top:50px">
                <div class="row ">
                    <div class="col">
                        <x-panel class="bg-danger h-100">
                            <div class="row">
                                <div class="col fw-bold">

                                    Question {{ $loop->iteration }}
                                </div>
                            </div>
                            <div class="row">
                                <div class=" mt-5 fs-5">
                                    {{ $question->question }}
                                </div>
                            </div>
                        </x-panel>
                    </div>

                    <div class="col border-start border-1">
                        <x-panel>
                            <div class="container">
                                <div class="row mb-5">
                                    <div class="col d-flex justify-content-between">
                                        <h4>Select an option</h4>
                                    </div>
                                </div>
                                @isset($question->choice)
                                    <div class="row form-check">
                                        @php
                                            $choice = json_decode($question->choice);
                                        @endphp
                                        @foreach ($choice as $key => $item)
                                            <div class="col border border-1 border-secondary-subtle shadow p-3 fs-5 fw-bold my-4 bg-white bg-opacity-100 rounded-3 answerBox"
                                                id="answerBox{{ $question->id }}{{ $key }}">
                                                <input type="radio" id="option{{ $key }}"
                                                    name="answer-{{ $question->id }}" value="{{ $key }}"
                                                    onclick="saveAnswer({{ $question->id }},{{ $key }},'{{ $item }}')"
                                                    class="answerOption">
                                                <label for="option{{ $key }}">{{ $item }}</label>

                                            </div>
                                        @endforeach

                                    </div>
                                @endisset
                            </div>
                        </x-panel>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container d-flex justify-content-center">
            <span class="text-body-secondary me-2">Go to question </span>
            @for ($i = 1; $i <= $questions->count(); $i++)
                <button class="questionButton btn btn-outline-dark ms-3" id="button-{{ $i }}"
                    onclick="showQuestion({{ $i }})"> {{ $i }}</button>
            @endfor
        </div>
    </footer>

    <script>
        var date = new Date();
        expires = 'expires=';
        date.setDate(date.getDate() + 1);
        expires += date.toGMTString();

        var currentQuestion = 1;
        var candidateTestId = {{ $candidateTest->id }}
        const timerVariableName = 'timer';

        let existingTimerValue = sessionStorage.getItem(timerVariableName);
        // let duration;

        if (existingTimerValue) {
            duration = parseInt(existingTimerValue);
            var display = document.querySelector('#timer');
            updateTimer(duration, display);
        } else {
            // duration = 60; // or any other default value you want to use
            sessionStorage.setItem(timerVariableName, {{ $candidateTest->test->duration }});
            duration = parseInt(sessionStorage.getItem(timerVariableName));
            var display = document.querySelector('#timer');
            updateTimer(duration, display);
        }

        $(function() {

            var totalQuestions = $('.question').length;

            // Hide all questions except the first one
            $('.question').hide();
            $('#question-1').show();
            $('#button-1').attr("class", "questionButtton btn btn-outline-dark active ms-3");

            $('.answerList').attr("class",
                "col border border-1 border-secondary-subtle shadow p-3 fs-5 fw-bold my-4 bg-white bg-opacity-100 rounded-3"
            );


            // Show the next question when the "Next" button is clicked
            $('#next-btn').click(function() {
                if (currentQuestion < totalQuestions) {
                    currentQuestion++;
                    $('.question').hide();
                    $('#question-' +
                        currentQuestion).show();
                    $('.questionButtton').attr("class", "questionButtton btn btn-outline-dark ms-3");
                    $('#button-' + currentQuestion).attr("class",
                        "questionButtton btn btn-outline-dark ms-3 active"); //
                    // saveAnswer(currentQuestion, )
                }
            }); // Show the previous question when the "Previous" button is clicked
            $('#prev-btn').click(function() {
                if (currentQuestion > 1) {
                    currentQuestion--;
                    $('.question').hide();
                    $('#question-' + currentQuestion).show();

                    $('.questionButtton').attr("class", "questionButtton btn btn-outline-dark ms-3");
                    $('#button-' + currentQuestion).attr("class",
                        "questionButtton btn btn-outline-dark ms-3 active");
                }
            });

        });
        $(document).ready(function() {
            $('.answerOption').change(function() {
                // Get the parent answer box
                var answerBox = $(this).closest('.answerBox');

                // Remove the green color from all answerBox elements

                $('.answerBox').removeClass('border-success').addClass('border-secondary-subtle');


                // Add the green color to the selected answerBox element
                answerBox.addClass('border-success').removeClass('border-secondary-subtle');

                if (!$("input:radio[class='answerOption']").is(':checked')) {
                    console.log("chekek");
                } else {
                    // alert('NO radio buttons is checked!');
                    console.log("cheked ");
                    $("input:radio[class='answerOption']").addClass('border-success').removeClass(
                        'border-secondary-subtle');
                }
            });
        });




        function showQuestion(questionNumber) {
            // saveAnswer(currentQuestion, )
            $('.question').hide();
            // currentQuestion = pageNumber
            $('#question-' + questionNumber).show();

            $('.questionButtton').attr("class", " questionButtton btn btn-outline-dark ms-3");
            $('#button-' + questionNumber).attr("class", "questionButtton btn btn-outline-dark ms-3 active");

            currentQuestion = questionNumber;

        }

        function saveAnswer(questionId, option) {

            var response = JSON.parse(localStorage.getItem('response')) || {};

            // Add or update the answer for the current question
            response[questionId] = option;

            // Store the updated results in session storage
            localStorage.setItem('response', JSON.stringify(response));

            // $('#answerBox' + questionId + option).attr("class",
            //     "col border border-2 border-success shadow p-3 fs-5 fw-bold my-4 bg-white bg-opacity-100 rounded-3"
            // );


            $.ajax({
                url: "/candidate/save-answer",
                type: "POST",
                data: {
                    'response': response,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    console.log("Answer saved for question " + questionId);
                }
            });
        }

        function updateTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;
                remaining = minutes * 60 + seconds; //
                sessionStorage.setItem(timerVariableName, remaining);
                if (--timer < 0) {
                    submitExam();
                }
            }, 1000);
        }

        function
        submitExam() {
            localStorage.removeItem('response');
            sessionStorage.removeItem('timer');
            window.location.href = "/candidate/submit/" + candidateTestId;
        }
    </script>
</x-candidate-layout>
