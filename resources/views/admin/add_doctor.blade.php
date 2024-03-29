<!DOCTYPE html>
<html lang="en">
  <head>

  <style type="text/css">
      label {
          display: inline-block;
          width: 200px;
      }
  </style>

  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
  

        <div class="container-fluid page-body-wrapper">
           
        <div class="container" align="center" style="padding-top: 100px">

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert"></button>
                {{session()->get('message')}}
            </div>

            @endif

        <form action="{{url('upload_doctor')}}" method="POST">
            @csrf

      
        <div style="padding: 15px">
            <label>Full Name</label>
            <input type="text" name="name" style="color:black" placeholder="write dotcor name" required="">
        </div>

        <div style="padding: 15px">
            <label>Phone Number</label>
            <input type="number" name="number" style="color:black" placeholder="write phone number" required="">
        </div>

        <div style="padding: 15px">
            <label>Email</label>
            <input type="text" name="email" style="color:black" placeholder="write email" required="">
        </div>

      

        <div style="padding: 15px">
            <label>Speciality</label>
           <select name="speciality" style="color:black; width:200px" required="">
               <option>--Select--</option>
               <option value="GeneralSurgery">General Surgery.</option>
               <option value="GeneralMedicine">General Medicine.</option>
               <option value="Radiology">Radiology.</option>
               <option value="GynecologyObstetrics">Gynecology and Obstetrics.</option>
               <option value="Endocrinology">Endocrinology.</option>
               <option value="Cardiology">Cardiology.</option>
               <option value="Pediatrics">Pediatrics.</option>
               <option value="Dentist">Dentist.</option>
               <option value="LabStaff">Lab Staff.</option>
               <option value="Internal Medicine">Internal Medicine.</option>

           </select>
        </div>

        <div style="padding: 15px">
           
          <input type="submit" class="btn btn-success">
        </div>


        </form>

        </div>

</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>