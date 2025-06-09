<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/src/img/DEV Panther Short Logo.png">
    <title>Inventory</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/src/css/login.css">

    <!-- Optional JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row login-main" style="margin-top: 80px;">
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
                <section class="login-sec">
                    <div class="main-card text-center">
                        <img src="{{ asset('img/glitz.png') }}" alt="Logo" width="50%" style="padding-top: 25px">

                        <div class="card"
                            style="padding: 30px 20px; border-radius: 5px; border: 1px solid rgb(216, 216, 216);">

                            <form class="login-form" name="login-form" action="/initlogin" method="POST">
                                @csrf
                                <h4 class="text-center" style="font-weight: 700">Admin Login</h4>

                                <div class="form-group email-input text-left">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" id="email-login"
                                        placeholder="Enter your email">
                                    <span id="email-err" class="err text-danger"></span>
                                    <span id="email-err-formate" class="err text-danger"></span>
                                </div>

                                <div class="form-group password-input text-left">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password-login"
                                            placeholder="Enter your password">
                                        <span class="input-group-addon" style="cursor: pointer;"
                                            onclick="passwordView()">
                                            <i class="fa fa-eye-slash" id="view"></i>
                                            <i class="fa fa-eye" id="no-view" style="display: none;"></i>
                                        </span>
                                    </div>
                                    <span id="pass-err" class="err text-danger"></span>
                                </div>

                                @if (session('msg'))
                                <div class="alert alert-danger text-center" style="margin-top: 10px;">
                                    {!! session('msg') !!}
                                </div>
                                @endif

                                <div class="login-btn text-center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn btn-block"
                                        style="background-color: rgb(218, 216, 216)">Login</button>
                                </div>

                                <div class="text-center" style="margin-top: 10px;">
                                    <a href="/forgot-password" class="forgot-password">Forgotten password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12"></div>
        </div>

        <p class="gpit text-center" style="margin-top: 13%;">Powered by <a href="#">GPiT</a></p>
    </div>

    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script>
        function passwordView() {
            var input = document.getElementById("password-login");
            var eye = document.getElementById("view");
            var eyeOpen = document.getElementById("no-view");

            if (input.type === "password") {
                input.type = "text";
                eye.style.display = "none";
                eyeOpen.style.display = "inline";
            } else {
                input.type = "password";
                eye.style.display = "inline";
                eyeOpen.style.display = "none";
            }
        }
    </script>
</body>

</html>