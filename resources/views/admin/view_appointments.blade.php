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
  

        <div class="container-fluid page-body-wrapper col-md">
           
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Phone</th>
      <th scope="col">ID</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Department</th>
      <th scope="col">Doctor</th>
      <th scope="col">Address</th>
      <th scope="col">Cancel Appointment</th>
    </tr>
  </thead>
  <tbody>

  @foreach($appointment as $appointments)
    <tr>
      <th scope="row">1</th>
      <td>{{$appointments->patientname}}</td>
      <td>{{$appointments->patientnumber}}</td>
      <td>{{$appointments->idcard}}</td>
      <td>{{$appointments->dob}}</td>
      <td>{{$appointments->adate}}</td>
      <td>{{$appointments->appt}}</td>
      <td>{{$appointments->department}}</td>
      <td>{{$appointments->_doctor}}</td>
      <td>{{$appointments->info}}</td>
      <div>
          <form action="{{url('/delete-appointment/'.$appointments->id)}}" method="post">
              {{ method_field('DELETE') }}
              {{  csrf_field()  }}
          <td>
              <button class="btn btn-danger" type="submit">Delete</button>
          </td>
          </form>
        </div>
    </tr>
    @endforeach
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
     -->
  </tbody>
</table>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>