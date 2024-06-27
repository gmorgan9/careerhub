<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>Contact - MorganServer Career Hub</title>

    <style>
        .nav-link:hover {
            color: white !important;
        }
        .active {
            color: white !important;
        }
        .form-btn {
            background-color: rgb(51,51,51); 
            border-radius: 50px; 
            border: 2px solid #994E4E; 
            padding: 15px 25px; 
            text-decoration: none; 
            color: white;
        }
        .form-btn:hover {
            background-color: #994E4E !important;
        }
        .contact_btn:hover {
            color: rgb(59,59,59) !important;
            background-color: rgb(213,213,213) !important;
        }
        .page_title {
            background-color: #252525;
            border-top: 1px solid #333333;
            border-bottom: 1px solid #333333;
            padding: 65px 70px;
            margin-left: -210px;
            margin-top: 45px;
            margin-bottom: 65px;
            text-align: left;
            width: 100vw;
        }
        .title {
            font-size: 44px;
        }
        .info-block {
            position: relative;
            text-align: left;
            /* width: 100%; */
            display: table;
            margin: 0;
            padding: 0 10px 30px 0;
        }
        .info-icon {
            position: relative;
            display: table-cell;
            padding: 0 10px 5px 0;
            font-size: 35px;
            color: #994E4E;
        }
        .info-text {
            position: relative;
            display: table-cell;
            padding: 0 0 0 15px;
            vertical-align: middle;
            text-align: left;
        }
        .info-text h4 {
            font-size: 18px;
        }
        .block-title h2 {
            display: inline-block;
            position: relative;
            font-size: 21px;
            margin: 0 0 30px;
            z-index: 1;
            padding-bottom: 7px;
        }
        .block-title h2:before {
            display: block;
            position: absolute;
            content: '';
            width: 100%;
            background-color: rgb(53,53,53);
            height: 2px;
            bottom: 0;
        }
        .block-title h2:after {
            display: block;
            position: absolute;
            content: '';
            width: 30px;
            background-color: #994E4E;
            height: 2px;
            bottom: 0;
        }
        /* form */
        .form-input {
            position: relative;
            border: 2px solid #bfbfbf;
            border-radius: 5px;
            display: block;
            font-size: 1em;
            margin: 0;
            padding: 10px 25px 10px 12px;
            width: 100%;
            min-width: 100%;
            background: 0 0;
            text-align: left;
            color: inherit;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            outline: none;
            font-family: poppins,Helvetica,sans-serif;
        }
        .form-input {
            color: #eee;
            background-color: transparent;
            border-color: #555;
        }
    </style>
</head>
<body style="background-color: rgb(34,34,34);">
    
    <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
            <div class="left">
                <a href="/home" class="text-white text-decoration-none">
                    <img src="../../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
                    &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
                </a>
            </div>
            <div class="right">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/resume">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" href="/home/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    <!-- End Navbar -->

    <div class="container w-100">
        <div class="page_title">
            <h2 class="text-white title">
                Contact
            </h2>
        </div>
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">
            <div class="row">
                <div class=" col-xs-12 col-sm-4 ">
                    <div class="info-block">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-text">
                            <h4>McKinney, TX</h4>
                        </div>
                    </div>
                    <div class="info-block">
                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="info-text">
                            <h4>garrett.morgan.pro@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class=" col-xs-12 col-sm-8 ">
                    <div class="block-title">
                        <h2>
                            How Can I Help You?
                        </h2>
                        <form action="">
                            <!-- ------ -->
                            <div class="mb-3">
                                <input id="full_name" type="text" name="name" class="form-input" placeholder="Full Name" required="required" data-error="Name is required.">
                                    <div pseudo="placeholder">Full Name</div>
                                    <div contenteditable="plaintext-only"></div>
                                </input>
                            </div>
                            <!-- ------ -->
                            <button class="form-btn" style="">Send message</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>