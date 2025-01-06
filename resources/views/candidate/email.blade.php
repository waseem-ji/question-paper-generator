<x-candidate-layout>

    <body class="bg-primary bg-opacity-10">
        <div class="container-fluid" style="margin-top:180px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                        <div class="text-center">
                            <h3 class="text-primary">Enter Email</h3>
                            <small class="text-muted">Please enter your personal email correctly</small>
                        </div>
                        <form action="{{ route('candidate.verifyEmail') }}" method="POST">
                            @csrf
                            <div class="p-4">
                                <input type="hidden" name="drive_id" value="{{ $token->driveTest->drive_id }}">
                                {{-- Cant we pass position as Hidden input with value taken from test database  --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-success-subtle"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Enter email">
                                </div>
                                @error('email')
                                    <p class="blockquote-footer text-danger mt-2">{{ $message }} </p>
                                @enderror

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary text-center mt-4 w-25" type="submit">
                                        Submit
                                    </button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</x-candidate-layout>
