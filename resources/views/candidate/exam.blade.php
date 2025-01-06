<x-candidate-layout>
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
                                        <button class="clear-selection-btn btn fw-lighter"
                                            onclick="removeSelection({{ $question->id }})"> Clear Selection <span><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="#000000" width="25px"
                                                    height="25px" viewBox="0 0 32 32">
                                                    <path
                                                        d="M7.004 23.087l7.08-7.081-7.07-7.071L8.929 7.02l7.067 7.069L23.084 7l1.912 1.913-7.089 7.093 7.075 7.077-1.912 1.913-7.074-7.073L8.917 25z" />
                                                </svg></span> </button>
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
                                                <input type="radio" id="question-{{ $question->id }}{{ $key }}"
                                                    {{-- id="option{{ $key }}" --}} name="answer-{{ $question->id }}"
                                                    value="{{ $key }}"
                                                    onclick="saveAnswer({{ $question->id }},{{ $key }},'{{ $item }}')"
                                                    class="answerOption selectedOption{{ $question->id }}">
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
            @foreach ($questions as $question)
                <button class="questionButton btn btn-outline-dark ms-3 selectedButton-{{ $question->id }}"
                    id="button-{{ $loop->iteration }}" onclick="showQuestion({{ $loop->iteration }})">
                    {{ $loop->iteration }}</button>
            @endforeach
        </div>
    </footer>

    <script>
        var currentQuestion = 1;
        var candidateTestId = {{ $candidateTest->id }}
        const timerVariableName = 'timer';

        let existingTimerValue = localStorage.getItem(timerVariableName);

        if (existingTimerValue) {
            duration = parseInt(existingTimerValue);
            var display = document.querySelector('#timer');
            updateTimer(duration, display);
        } else {
            localStorage.setItem(timerVariableName, {{ $candidateTest->test->duration }});
            duration = parseInt(localStorage.getItem(timerVariableName));
            var display = document.querySelector('#timer');
            updateTimer(duration, display);
        }
        // Retriving old reponse and selecting them
        var responseStr = <?php echo json_encode($candidateTest->response); ?>;
        var oldResponse = JSON.parse(responseStr);
        for (var questionID in oldResponse) {

            if (oldResponse.hasOwnProperty(questionID)) {


                var response = JSON.parse(localStorage.getItem('response')) || {};
                response[questionID] = oldResponse[questionID];

                localStorage.setItem('response', JSON.stringify(response));

                var radioElement = document.getElementById('question-' + questionID + oldResponse[questionID]);

                if (radioElement) {
                    radioElement.checked = true;
                    $('.selectedButton-' + questionID).removeClass("btn-outline-dark");
                    $('.selectedButton-' + questionID).addClass("btn-success");

                }
            }
        }



        $(function() {

            var totalQuestions = $('.question').length;

            $('.question').hide();
            $('#question-1').show();
            $('#button-1').addClass("active");

            $('#next-btn').click(function() {
                if (currentQuestion < totalQuestions) {
                    currentQuestion++;
                    $('.question').hide();
                    $('#question-' +
                        currentQuestion).show();
                    $('.questionButton').removeClass("active");
                    $('#button-' + currentQuestion).addClass("active");
                }
            });
            $('#prev-btn').click(function() {
                if (currentQuestion > 1) {
                    currentQuestion--;
                    $('.question').hide();
                    $('#question-' + currentQuestion).show();

                    $('.questionButton').removeClass("active");

                    $('#button-' + currentQuestion).addClass("active");
                }
            });

        });

        function removeSelection(questionID) {
            var response = JSON.parse(localStorage.getItem('response')) || {};

            delete response[questionID];
            localStorage.setItem('response', JSON.stringify(response));

            $('.selectedOption' + questionID).prop('checked', false);
            $.ajax({
                url: "/candidate/save-answer",
                type: "POST",
                data: {
                    'response': response,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {


                }
            });

            $('.selectedButton-' + questionID).removeClass("btn-success");
            $('.selectedButton-' + questionID).addClass("btn-outline-dark");

        }

        function showQuestion(questionNumber) {
            $('.question').hide();
            $('#question-' + questionNumber).show();

            $('.questionButton').removeClass("active");
            $('#button-' + questionNumber).addClass("active");
            currentQuestion = questionNumber;

        }

        function saveAnswer(questionId, option) {

            var response = JSON.parse(localStorage.getItem('response')) || {};
            response[questionId] = option;

            $('#button-' + currentQuestion).removeClass("btn-outline-dark");
            $('#button-' + currentQuestion).addClass("btn-success");

            localStorage.setItem('response', JSON.stringify(response));



            $.ajax({
                url: "/candidate/save-answer",
                type: "POST",
                data: {
                    'response': response,
                    _token: '{{ csrf_token() }}'
                },
            });
        }

        function updateTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
                remaining = minutes * 60 + seconds;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;
                localStorage.setItem(timerVariableName, remaining);
                if (--timer < 0) {
                    submitExam();
                }
            }, 1000);
        }

        function
        submitExam() {
            localStorage.removeItem('response');
            localStorage.removeItem('timer');
            window.location.href = "/candidate/submit/" + candidateTestId;
        }
    </script>
</x-candidate-layout>
