<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PWA Blogs - Admin Login</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            /**
            Custom login css
             */
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                max-width: 420px;
                padding: 15px;
                margin: auto;
            }

            .form-label-group {
                position: relative;
                margin-bottom: 1rem;
            }

            .form-label-group input,
            .form-label-group label {
                height: 3.125rem;
                padding: .75rem;
            }

            .form-label-group label {
                position: absolute;
                top: 0;
                left: 0;
                display: block;
                width: 100%;
                margin-bottom: 0; /* Override default `<label>` margin */
                line-height: 1.5;
                color: #495057;
                pointer-events: none;
                cursor: text; /* Match the input under the label */
                border: 1px solid transparent;
                border-radius: .25rem;
                transition: all .1s ease-in-out;
            }

            .form-label-group input::-webkit-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-moz-placeholder {
                color: transparent;
            }

            .form-label-group input:-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::placeholder {
                color: transparent;
            }

            .form-label-group input:not(:-moz-placeholder-shown) {
                padding-top: 1.25rem;
                padding-bottom: .25rem;
            }

            .form-label-group input:not(:-ms-input-placeholder) {
                padding-top: 1.25rem;
                padding-bottom: .25rem;
            }

            .form-label-group input:not(:placeholder-shown) {
                padding-top: 1.25rem;
                padding-bottom: .25rem;
            }

            .form-label-group input:not(:-moz-placeholder-shown) ~ label {
                padding-top: .25rem;
                padding-bottom: .25rem;
                font-size: 12px;
                color: #777;
            }

            .form-label-group input:not(:-ms-input-placeholder) ~ label {
                padding-top: .25rem;
                padding-bottom: .25rem;
                font-size: 12px;
                color: #777;
            }

            .form-label-group input:not(:placeholder-shown) ~ label {
                padding-top: .25rem;
                padding-bottom: .25rem;
                font-size: 12px;
                color: #777;
            }

            /* Fallback for Edge
            -------------------------------------------------- */
            @supports (-ms-ime-align: auto) {
                .form-label-group {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-direction: column-reverse;
                    flex-direction: column-reverse;
                }

                .form-label-group label {
                    position: static;
                }

                .form-label-group input::-ms-input-placeholder {
                    color: #777;
                }
            }

        </style>
    </head>
    <body>
        <form class="form-signin" method="POST" action="<?php echo site_url('admin/validateLogin'); ?>">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">PWA Blogs - Administrator</h1>
            </div>

            <div class="form-label-group">
                <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <?php if(isset($_SESSION['loginError'])) { ?>
                <div class="alert alert-danger mt-2">Invalid Email/Password</div>
            <?php unset($_SESSION['loginError']); } ?>

            <p class="mt-5 mb-3 text-muted text-center">&copy; nocturaf - PWA Blogs Example</p>
        </form>
    </body>
</html>