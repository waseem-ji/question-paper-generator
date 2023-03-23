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
</head>

<body class="bg-warning-subtle">
    <div class="container-fluid" style="margin-top:280px">
        <div class="" style="margin-top:100px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-6 col-sm-10 shadow p-5 bg-light rounded-4">
                    <div class="text-center">
                        <h3 class="text-primary">Sign In</h3>
                        <small class="text-muted">Only for authorized internal staff</small>
                    </div>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i
                                        class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Email">
                            </div>
                            @error('email')
                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" class="form-control   form-control-lg"
                                    placeholder="password">
                            </div>
                            @error('password')
                                <p class="blockquote-footer text-danger">{{ $message }} </p>
                            @enderror

                            <div class="d-flex">
                                <button class="btn btn-primary text-center mt-4 w-25" type="submit">
                                    Login
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
