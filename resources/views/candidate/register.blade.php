<x-candidate-layout>

    <body class="bg-primary bg-opacity-10">
        <div class="container-fluid" style="margin-top:150px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                        <div class="text-center">
                            <h3 class="text-primary">Enter Details</h3>
                            <small class="text-muted">Please enter your personal details correctly</small>
                        </div>
                        <form action="{{ route('candidate.register', $candidate->id) }}" method="POST">
                            @csrf
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-success-subtle"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="name" class="form-control form-control-lg"
                                        placeholder="Enter name" value="{{ $candidate->name ?? '' }}">
                                </div>
                                @error('name')
                                    <p class="blockquote-footer text-danger mt-2">{{ $message }} </p>
                                @enderror

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-success-subtle"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="phone_number" class="form-control form-control-lg"
                                        placeholder="Enter Phone number" value="{{ $candidate->phone ?? '' }}">
                                </div>
                                @error('phone_number')
                                    <p class="blockquote-footer text-danger mt-2">{{ $message }} </p>
                                @enderror

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-success-subtle"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="position" class="form-control form-control-lg"
                                        placeholder="Enter Position" value="{{ $candidate->position ?? '' }}">
                                </div>
                                @error('position')
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
