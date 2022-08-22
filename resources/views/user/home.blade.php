<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="copyright" content="MACode ID, https://macodeid.com/" />

    <title>Home Page</title>

    <link rel="stylesheet" href="../assets/css/maicons.css" />

    <link rel="stylesheet" href="../assets/css/bootstrap.css" />

    <link
      rel="stylesheet"
      href="../assets/vendor/owl-carousel/css/owl.carousel.css"
    />

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css" />

    <link rel="stylesheet" href="../assets/css/theme.css" />
  </head>
  <body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 text-sm">
              <div class="site-info">
                <a href="#"
                  ><span class="mai-call text-primary"></span> +00 123 4455
                  6666</a
                >
                <span class="divider">|</span>
                <a href="#"
                  ><span class="mai-mail text-primary"></span>
                  mail@example.com</a
                >
              </div>
            </div>
            <div class="col-sm-4 text-right text-sm">
              <div class="social-mini-button">
                <a href="#"><span class="mai-logo-facebook-f"></span></a>
                <a href="#"><span class="mai-logo-twitter"></span></a>
                <a href="#"><span class="mai-logo-dribbble"></span></a>
                <a href="#"><span class="mai-logo-instagram"></span></a>
              </div>
            </div>
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .topbar -->

      <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#"
            ><span class="text-success">AQ</span>-SA</a
          >

         

          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupport"
            aria-controls="navbarSupport"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href={{url('myappointment')}}>My Appointment.</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-success ml-lg-3" href="{{route('login')}}">Login</a>
              </li>
  
              <li class="nav-item">
                <a class="btn btn-success ml-lg-3" href="{{route('register')}}">Register</a>
              </li>
            </ul>
          </div>
          <!-- .navbar-collapse -->
        </div>
        <!-- .container -->
      </nav>
    </header>

    <div
      class="page-hero bg-image overlay-dark"
      style="background-image: url(https://tegarchitects.com/wp-content/uploads/2021/04/1654-072-scaled.jpg)"
    >
      <div class="hero-section">
        <div class="container text-center wow zoomIn">
          <span class="subhead">A place where healing matters!</span>
          <h1 class="display-4">Passion for caring!</h1>
          <a href="#" class="btn btn-success">Let's Consult</a>
        </div>
      </div>
    </div>

    <!-- .page-section -->

    <!-- .page-section -->

    <div id="appoint-bg">
    <div class="page-section">
      <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form">
          <div class="row mt-5">
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="text" class="form-control" placeholder="Full name" />
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
              <input
                type="text"
                class="form-control"
                placeholder="Email address.."
              />
            </div>
            <div
              class="col-12 col-sm-6 py-2 wow fadeInLeft"
              data-wow-delay="300ms"
            >
              <input type="date" class="form-control" />
            </div>
            <div
              class="col-12 col-sm-6 py-2 wow fadeInRight"
              data-wow-delay="300ms"
            >
              <select name="departement" id="departement" class="custom-select">
                <option value="general">General Health</option>
                <option value="cardiology">Cardiology</option>
                <option value="dental">Dental</option>
                <option value="neurology">Neurology</option>
                <option value="orthopaedics">Orthopaedics</option>
              </select>
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <input type="text" class="form-control" placeholder="Number.." />
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <textarea
                name="message"
                id="message"
                class="form-control"
                rows="6"
                placeholder="Enter message.."
              ></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-success mt-3 wow zoomIn">
            Submit Request
          </button>
        </form>
      </div>
    </div>
  </div>
    <!-- .page-section -->

    <div
      class="page-section banner-home bg-image"
      style="background-image: url(../assets/img/banner-pattern.svg)"
    >
      
    <!-- .banner-home -->

    <footer class="page-footer">
      <div class="container">
        <div class="row px-md-3">
          <div class="col-sm-6">
            <h5>Company</h5>
            <ul class="footer-menu">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact</a></li>
              
            </ul>
          </div>
          
          
          <div class="col-sm-6">
            <h5>Contact</h5>
            <p class="footer-link mt-2">Dummy Address</p>
            <br>
            <a href="#" class="footer-link">+00 123 4455 6666</a>
            <br>
            <a href="#" class="footer-link">mail@example.com</a>
            <br>

            <h5 class="mt-3">Social Media</h5>
            <div class="footer-sosmed mt-3">
              <a href="#" target="_blank"
                ><span class="mai-logo-facebook-f"></span
              ></a>
              <a href="#" target="_blank"
                ><span class="mai-logo-twitter"></span
              ></a>
              <a href="#" target="_blank"
                ><span class="mai-logo-google-plus-g"></span
              ></a>
              <a href="#" target="_blank"
                ><span class="mai-logo-instagram"></span
              ></a>
              <a href="#" target="_blank"
                ><span class="mai-logo-linkedin"></span
              ></a>
            </div>
          </div>
        </div>

        <hr />

        
      </div>
    </footer>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>
  </body>
</html>
