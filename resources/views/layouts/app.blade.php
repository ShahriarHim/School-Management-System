<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Management')</title>
    <!-- Link to your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
</head>

<body>
    <!-- Header Section with conditional class -->
    <header class="header @yield('header-class')">
        <img src="{{ asset('images/logo-light.png') }}" alt="Logo">
        <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
        <nav class="navbar">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/noticeboard">Noticeboard</a></li>
                <li><a href="/events">Events</a></li>
                <li><a href="/coaches">Coaches</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>

    </header>
<!-- 
    <div class="header-next">
        @yield('headerNext')
    </div> -->


    <!-- Main Content -->
    <div class="main">
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <select class="dropdown">
                <option>University of Michigan</option>
                <option>Granite Hills School</option>
                <option>Golden Sierra Academy</option>
                <!-- Add more options as needed -->
            </select>

            <img src="{{ asset('images/logo-dark.png') }}" alt="Logo">
            <p class="footer-bottom">© All rights reserved to Creativeitem</p>

            <div class="footer-social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-right">
            <div class="footer-section">
                <h4>Contact</h4>
                <a href="tel:677492151">677492151</a>
                <a href="mailto:ekattor@example.com">ekattor@example.com</a>
                <p>4333 Factoria Blvd SE,<br>Bellevue, WA 98006</p>
            </div>

            <div class="footer-section">
                <h4>About</h4>
                <a href="#">About</a>
                <a href="#">Teachers</a>
                <a href="#">Gallery</a>
            </div>

            <div class="footer-section">
                <h4>Resources</h4>
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Login</a>
            </div>

            <div class="footer-section">
                <h4>Alumni</h4>
                <a href="#">Alumni events</a>
                <a href="#">Alumni gallery</a>
            </div>
        </div>
    </footer>


    <!-- Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navToggle = document.querySelector('.nav-toggle');
            const navbar = document.querySelector('.navbar');

            navToggle.addEventListener('click', function () {
                navbar.classList.toggle('active');
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/2d7883494f.js" crossorigin="anonymous"></script>
</body>

</html>