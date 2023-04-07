<x-candidate-layout>


    <body class="bg-primary bg-opacity-10">
        <div class="container-fluid" style="margin-top:150px">
            <div class="" style="margin-top:100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-6 col-sm-10 shadow-sm p-5 bg-light rounded-4">
                        <div class="text-center">
                            <h3 class="text-primary">Verify Your Details</h3>
                            <small class="text-muted">Please verify your personal details </small>
                        </div>
                        <x-panel>

                            <div class="container">
                                <div class="row">
                                    <div class="col-auto h4 fw-bold w-25">Name:</div>
                                    <div class="col h4 ">{{Str::ucfirst($candidate['name'])}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-auto h4 fw-bold  w-25">Email:</div>
                                    <div class="col h4 ">{{$candidate['email']}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-auto h4 fw-bold w-25">Phone:</div>
                                    <div class="col h4 ">{{Str::ucfirst($candidate['phone'])}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-auto h4 fw-bold w-25">Position:</div>
                                    <div class="col h4 ">{{Str::ucfirst($candidate['position'])}}</div>
                                </div>
                                <div class="d-flex justify-content-between row">
                                    <a href="{{route('candidate.edit',$candidate['id'])}}" class="btn btn-primary text-center mt-4 col-auto px-5" type="button">
                                        Edit
                                    </a>
                                    <a class="btn btn-success text-center mt-4 col-auto px-3" type="button">
                                        Proceed to Test
                                    </a>

                                </div>

                            </div>
                      </x-panel>
                    </div>
                </div>
            </div>
        </div>

    </body>


</x-candidate-layout>
