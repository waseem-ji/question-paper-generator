<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Login</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="bg-primary bg-opacity-10">
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

</body>

</html>
