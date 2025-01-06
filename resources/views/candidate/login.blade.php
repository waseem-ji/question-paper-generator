
<x-candidate-layout>
    <div class="container-fluid" style="margin-top:180px">
        <div class="" style="margin-top:100px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                    <div class="text-center">
                        <h3 class="text-primary">Enter Code</h3>
                        <small class="text-muted">Please Enter your 6 digit Access Code</small>
                    </div>
                    <form action="{{ route('candidate.verifyToken') }}" method="POST">
                        @csrf
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-success-subtle"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="number" name="token" class="form-control form-control-lg"
                                    placeholder="Enter Access Code">
                            </div>
                            @error('token')
                                <p class="blockquote-footer text-danger mt-2">{{ $message }} </p>
                            @enderror
                            @error('error')
                                <p class="blockquote-footer text-danger mt-2"> {{ $message }}</p>
                            @enderror

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary text-center mt-4 px-4" type="submit">
                                    Enter to test
                                </button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-candidate-layout>
