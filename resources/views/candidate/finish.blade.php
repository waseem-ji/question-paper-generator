<x-candidate-layout>

    <body class="bg-primary bg-opacity-10">
        <div class="container-fluid" style="margin-top:180px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                        <div class="text-center">
                            <h3 class="text-primary">You have successfully completed your exam</h3>
                            <small class="text-muted">Please enter give us your feedback about the exam</small>
                        </div>
                        <form action="{{ route('candidate.feedback', $candidateTest->id) }}" method="POST">
                            @csrf
                            <div class="p-4">
                                <input type="hidden" name="id" value="{{ $candidateTest->id }}">
                                {{-- Cant we pass position as Hidden input with value taken from test database  --}}
                                <div class="input-group mb-3">

                                    <textarea class="form-control" rows="3" id="feedback" name="feedback" placeholder="Enter feedback"></textarea>
                                </div>
                                @error('feedback')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary text-center mt-4 w-25" type="submit">
                                        Exit Exam
                                    </button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <x-flash />
    <script>
        // Disable the browser's back button
        window.history.replaceState(null, null, window.location.href);
        document.addEventListener("keydown", function(event) {
            if (event.keyCode === 8) {
                event.preventDefault();
                return false;
            }
        });
    </script>

</x-candidate-layout>
