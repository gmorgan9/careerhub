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
        .form-group {
            position: relative;
            margin: 0 0 21.5px;
        }
        .form-input {
            color: #eee;
            background-color: transparent;
            border-color: #555;
        }
        .controls .left-column {
            width: 47%;
            float: left;
            margin-right: 3%;   
        }
        .controls .right-column {
            width: 50%;
            float: right;
        }
        /* Footer */
        .site-footer {
            position: absolute;
            margin: 60px 0 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-color: #252525;
            border-color: #333333;
            display: block;
            /* position: relative; */
            /* margin: 60px -70px -60px; */
            padding: 15px 45px;
            /* background-color: #fdfdfd; */
            border-top: 2px solid #f2f2f2;
            /* border-bottom-left-radius: 40px; */
            /* border-bottom-right-radius: 40px; */
        }
        .footer-socials {
            float: left;
        }
        .footer-social-links {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .site-footer .footer-social-links li {
            display: inline-block;
            margin-right: 25px;
        }
        .site-footer .footer-social-links li a {
            color: #dddddd;
            text-decoration: none;
            line-height: 21px;
            font-size: 13px;
            opacity: .6;
        }
        .site-footer .footer-social-links li a:hover {
            color: rgb(221,221,221);
        }
        .footer-copyright {
            float: right;
        }
        .footer-copyright p {
            color: #dddddd;
            line-height: 21px;
            font-size: 13px;
            margin: 0;
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
                             <div class="controls two-columns">
                                <div class="left-column">
                                    <div class="form-group">
                                        <input id="full_name" type="text" name="name" class="form-input" placeholder="Full Name" required="required" data-error="Name is required.">
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="text" name="name" class="form-input" placeholder="Email Address" required="required" data-error="Email Address is required.">
                                    </div>
                                    <div class="form-group">
                                        <input id="subject" type="text" name="name" class="form-input" placeholder="Subject" required="required" data-error="Subject is required.">
                                    </div>
                                </div>
                                <div class="right-column">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-input" placeholder="Message" rows="7" required="required" data-error="Please, leave me a message."></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="form-btn" value="Send message">
                             </div>
                             
                            
                            <!-- ------ -->
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <footer class="site-footer">
            <div class="footer-socials">
                <ul class="footer-social-links">
                    <li><a href="#" target="_blank">Twitter</a></li>
                    <li><a href="#" target="_blank">Facebook</a></li>
                    <li><a href="#" target="_blank">Instagram</a></li>
                </ul>

            </div>
            <div class="footer-copyright">
                <p>© 2024 All rights reserved.</p>
            </div>
        </footer>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>