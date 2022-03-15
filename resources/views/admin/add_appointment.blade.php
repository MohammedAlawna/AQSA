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
  

        <div class="container-fluid page-body-wrapper row">
           
    

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert"></button>
                {{session()->get('message')}}
            </div>

            @endif 

            <form action="{{url('upload_appointment')}}" method="POST">
            @csrf
                <div>

        <div class="col-md-6" style="padding:5px">
        <label>Patient Name</label>
            <input type="text" name="patientname" style="color:black" placeholder="Write patient name" required="">
        </div>


            <div class="col-md-6" style="padding:5px">
            <label>Phone Number</label>
            <input type="number" name="patientnumber" style="color:black" placeholder="Write phone number" required="">
            </div>

            <!-- <div class="col-md-6" style="padding:5px">
            <label>Status</label>
            <input type="text" name="status" style="color:black" value="Processing..." required="">
            </div> -->

        <div class="col-md-6" style="padding:5px">
            <label>ID</label>
            <input type="number" name="idcard" style="color:black" placeholder="National ID number.." required="">
        </div>


        <div class="col-md-6" style="padding:5px">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob"
       value="2002-02-22"
       min="1990-01-01" max="3000-12-31" style="color: black">
        </div>

        <div class="col-md-6" style="padding:5px">
        <label for="adate">Appointment Date</label>
        <input type="date" id="adate" name="adate"
       value="2022-02-22"
       min="1990-01-01" max="3000-12-31" style="color: black">
        </div>

        <div class="col-md-6" style="padding:5px">
        <label for="appt">Appointment Time</label>
        <input type="time" id="appt" name="appt"
        min="00:00" max="23:59" style="color: black" required>
        </div>

        <div class="col-md-6" style="padding:5px">
            <label>Department</label>
           <select name="department" style="color:black; width:200px" required="">
               <option>--Select--</option>
               <option value="GeneralSurgery">General Surgery.</option>
               <option value="GeneralMedicine">General Medicine.</option>
               <option value="Radiology">Radiology.</option>
               <option value="GynecologyObstetrics">Gynecology and Obstetrics.</option>
               <option value="Endocrinology">Endocrinology.</option>
               <option value="Cardiology">Cardiology.</option>
               <option value="Pediatrics">Pediatrics.</option>
               <option value="Dentist">Dentist.</option>
               <option value="Laboratory">Laboratory</option>
               <option value="Internal Medicine">Internal Medicine.</option>

           </select>
        </div>

        <div class="col-md-6" style="padding:5px">
            <label>Doctor</label>
           <select name="_doctor" style="color:black; width:200px" required="">
               <option>--Select--</option>
               <option value="JafarAlawna">Dr. Jafar Alawna</option>
               <option value="OmarAlawna">Dr. Omar Alawna.</option>
               <option value="SaadLahham">Dr. Saad Lahham</option>
               <option value="MohammedAlawna">Prof. Mohammed Alawna.</option>
       

           </select>
        </div>


        <div style="padding:5px">
        <div class="md-form" >
        <label for="form7">Full Address</label>
        <textarea id="form7" name="info" class="md-textarea form-control" rows="3"
         style="background-color:white;color:black" placeholder="Enter patient's full address.."></textarea>
        
        </div>

  
    </div>
    <div style="padding: 15px">
           
           <input type="submit" class="btn btn-success">
         </div>
</form>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>