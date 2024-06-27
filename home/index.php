<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>Home - MorganServer Career Hub</title>

    <style>
        .nav-link:hover {
            color: white !important;
        }
        .active {
            color: white !important;
        }
        .download_btn:hover {
            background-color: #994E4E !important;
        }
        .contact_btn:hover {
            color: rgb(59,59,59) !important;
            background-color: rgb(213,213,213) !important;
        }
    </style>
</head>
<body style="background-color: rgb(34,34,34);">
    
    <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 120px 70px;">
            <div class="left">
                <a href="/home" class="text-white text-decoration-none">
                    <img src="../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
                    &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
                </a>
            </div>
            <div class="right">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" href="/home">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/resume">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    <!-- End Navbar -->

    <div class="container">
        <div class="row flex-v-align" style="margin-top: 100px;">
            <div class="col-sm-12 col-md-5 col-lg-5">
                <img src="../assets/images/home-image.png" alt="">
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7 d-flex flex-column justify-content-center">
                <p class="text-secondary">
                    Cybersecurity Enthusiast
                </p>
                <h2 class="text-white" style="font-size: 48px;">
                    Garrett Morgan
                </h2>
                <p class="pt-3" style="color: #d5d5d5; width: 85%;">
                Experienced in IT Audit with a strong foundation in cybersecurity, I am actively working to transition back into the technical cybersecurity field. Currently, I am pursuing multiple CompTIA certifications to enhance my expertise and skills.
                </p>
                <div class="pt-4 buttons">
                    <a href="../assets/files/garrett-morgan-resume.pdf" download="garrett-morgan-resume" id="" class="download_btn" style="background-color: rgb(51,51,51); border-radius: 50px; border: 2px solid #994E4E; padding: 15px 25px; text-decoration: none; color: white;">Download Résumé</a>
                    &nbsp;&nbsp;
                    <a href="/home/contact" target="_blank" id="" class="contact_btn" style="background-color: rgb(51,51,51); border-radius: 50px; border: 2px solid rgb(213,213,213); padding: 15px 25px;; text-decoration: none; color: white;">Contact me</a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>