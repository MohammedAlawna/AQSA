<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('upload_appointment')}}" method="POST">
        @csrf

        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="patientname" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="info" class="form-control" placeholder="Address">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="adate" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="department" id="departement" class="custom-select">
              <option >--Select Doctor--</option>
              @foreach($doctor as $doctors)
            <option value="GeneralSurgery">General Surgery.</option>
               <option value="{{$doctors->name}}">{{$doctors->name}} --Speciality-- 
                 {{$doctors->speciality}}</option>
              
               @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="patientnumber" class="form-control" placeholder="Number..">
          </div>
          <!-- <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div> -->
        </div>
        <div>
        <button style="background-color:#00D9A5;" type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </div>
      </form>
    </div>
  </div> <!-- .page-section -->
