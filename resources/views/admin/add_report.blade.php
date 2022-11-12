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
  

        <div class="container-fluid page-body-wrapper row" style="margin-top: 25px;">


        
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert"></button>
                {{session()->get('message')}}
            </div>

            @endif

        <form action="{{url('upload_report')}}" method="POST">
            @csrf
            <div style="padding: 15px">
            <label for="patientname">Select Patient</label>
        <select class="custom-select" name="patientname" id="patientname" style="text-color: black;">
              <option>--Select Patient Name--</option>
              @foreach($user as $users)
              <option value="{{$users->name}}">{{$users->name}}</option>
              @endforeach
            </select>
    </div>

    <div style="padding: 15px">
    <label for="age">Age</label>
    <input name="age" type="number">
    </div>

    <div style="padding: 15px">
  <label for="gender">Gender</label>
  <select name="gender" id="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  
  </div>
    <div style="padding: 15px">
    <label>Prescription</label>
        <textarea id="form7" name="prescription" class="md-textarea form-control" rows="3" cols="7"
         style="background-color:white;color:black" placeholder="Prescription..."></textarea>

    </div>

   

    <div style="padding: 15px">
    <label>Details</label>
            <textarea id="form7" name="details" class="md-textarea form-control" rows="8"
         style="background-color:white;color:black" placeholder="Details..."></textarea>
        

    </div>
 
    
    
    <div style="padding: 15px">
   
    <label>Symptoms</label>
            <textarea id="form7" name="symptoms" class="md-textarea form-control" rows="3"
         style="background-color:white;color:black" placeholder="Symptoms..."></textarea>
          </div>
    
          <div style="padding: 15px" >

          <div id="labForm" style="display: none;">
          <label>Lab Test</label>
            <textarea name="symptoms" class="md-textarea form-control" rows="3"
         style="background-color:white;color:black" placeholder="Please Write Your LAb Test Here.. (Also write any additional comments her)"></textarea>
    </div>  
        </div>
    
          <div style="padding: 15px">
   
    <button class="btn btn-danger" type="submit">Save Report To DB</button>
    <a class="btn btn-primary" href="{{ route('upload_report') }}">Download DOC</a>
    <button class="btn btn-warning">Generate Patient View Report</button>
    <button class="btn btn-info">Push Data To Lab</button>

  </div>
    </div>


            </form>

</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>