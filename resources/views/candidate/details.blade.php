<x-candidate-layout>

    <body class="bg-primary bg-opacity-10">
        <div class="container-fluid" style="margin-top:150px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                        <div class="text-center">
                            <h3 class="text-primary">Verify Your Details</h3>
                            <small class="text-muted">Please make sure there are no mistakes before you proceed for the
                                test </small>
                        </div>
                        <div class="mt-3">
                            <table class="table table-bordered table-hover table-light ">

                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Name</th>
                                    <td>{{ $candidate['name'] }}</td>

                                </tr>

                                <tr>
                                    <th scope="col">Email</th>
                                    <td>{{ $candidate['email'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Phone</th>
                                    <td>{{ $candidate['phone'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Position</th>
                                    <td>{{ $candidate['position'] }}</td>
                                </tr>

                            </table>

                        </div>
                        <div class="d-flex justify-content-between row">
                            <a href="{{ route('candidate.edit', $candidate['id']) }}"
                                class="btn btn-primary text-center mt-4 col-auto px-5" type="button">
                                Edit
                            </a>
                            <a href="{{route('candidate.loadExam',$candidate['id'])}}"
                            class="btn btn-success text-center mt-4 col-auto px-3" type="button">
                                Proceed to Test
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</x-candidate-layout>
