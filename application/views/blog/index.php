<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#007bff">
    <title>PWA Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="manifest" crossorigin="use-credentials" href="./manifest.json">
    <!-- iOS Support -->
<!--    <link rel="apple-touch-icon" href="#path_to_icon">-->
<!--    <meta name="apple-mobile-web-app-status-bar" content="c">-->
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><b>PWA Blogs</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-3">
        <?php foreach($blog_list as $blog) { ?>
            <div class="card mt-2" style="border-radius: 10px;">
                <div class="card-body">
                    <h6><b><?php echo $blog['title']; ?></b></h6>
                    <?php echo substr($blog['content'], 0, 40); ?>...
                </div>
            </div>
        <?php } ?>
    </div>

    <small class="mt-auto text-center mb-3 text-muted">&copy 2020 PWA Blogs - <a href="https://github.com/nocturaf">nocturaf</a></small>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- The core Firebase JS SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-messaging.js"></script>
    <script type="text/javascript" src="./public/js/app.js"></script>
    <script type="text/javascript" src="./public/js/index.js"></script>
</body>
</html>
