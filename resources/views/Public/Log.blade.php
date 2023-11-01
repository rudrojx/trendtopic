<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Trend Topics</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .social-btn {
            width: 100%;
        }

        .social-btn button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Trend Topics</h2>

                        <!-- Google Sign Up Button -->
                        <div class="social-btn">
                            <a class="btn btn-danger btn-block" style="color: #f8f9fa" href="{{url('/auth/google')}}">
                                <i class="fab fa-google"></i> Sign Up with Google
                            </a>
                        </div>
                        <br>
                        <!-- GitHub Sign Up Button -->
                        <div class="social-btn">
                            <a class="btn btn-dark btn-block" style="color: #f8f9fa" href="{{url('/auth/github')}}">
                                <i class="fab fa-github"></i> Sign Up with GitHub
                            </a>
                        </div>

                        <!-- Or Separator -->
                        <hr>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"
        integrity="sha384-z9zepzg/mWj8HLoJ5S46CKsiU9HLOOi2K5CQoD3/JHEzIweM+H9I5I44oBqkgbh7"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
