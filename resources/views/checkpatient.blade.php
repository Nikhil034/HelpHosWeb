<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  

  <title>HelpHos-Medicine</title>

  
  
  <link rel="stylesheet" href="{{asset('css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('js/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('js/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
   
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">Help</span>-HosWeb</a>

      

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Doctor">Doctors</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/Medical">Medical</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="/Checkpatient">Check Patient</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-color:purple;">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Check Patient</li>
          </ol>
        </nav>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h2 class="text-center wow fadeInUp">Activity of patient</h2>

      <form class="contact-form mt-5" action="/Printreport" method="post">
        @csrf
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Select Token</label>
            <select class="form-control" name="tkn" id="select_token">
              @foreach($data as $item)
               <option>{{$item['Token']}}</option>
              @endforeach 
            </select>
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient Name</label>
            <input type="text"  class="form-control" placeholder="Name" id="pn">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient Phone</label>
            <input type="text"  class="form-control" placeholder="Phone" id="pp">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient Address</label>
            <input type="text" class="form-control" placeholder="Address" id="pa">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient date</label>
            <input type="text" id="ptd" class="form-control" placeholder="Date">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient Register fees</label>
            <input type="text" id="ptregpay" class="form-control" placeholder="Register fees">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient drug pay</label>
            <input type="text" id="ptdrgpay" class="form-control" placeholder="Drug pay">
        </div>  
        <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient check by</label>
            <input type="text" id="ptck" class="form-control" placeholder="Check by">
        </div> 
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Description of patient problem</label>
            <textarea id="pdes" class="form-control" rows="4" placeholder="Ex:-suffer from mental pain"></textarea>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Medicines added by doctor</label>
            <textarea id="pdrugs" class="form-control" rows="4" placeholder="Ex:-medicine1,medicine2"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Take Print</button>
        <a href="/ViewHistory"><button type="button" class="btn btn-warning wow zoomIn">View history</button></a>
      </form>
     
    </div>
  </div>

  <script>

  const tk=document.querySelector('#select_token');
  const pt_name=document.querySelector('#pn');
  const pt_phone=document.querySelector('#pp');
  const pt_add=document.querySelector('#pa');
  const pt_dt=document.querySelector('#ptd');
  const pt_reg=document.querySelector('#ptregpay');
  const pt_drug=document.querySelector('#ptdrgpay');
  const pt_check=document.querySelector('#ptck');
  const pt_desc=document.querySelector('#pdes');
  const pt_drlist=document.querySelector('#pdrugs');

  //Apply DRY principle
  const FireFunction=function(typeofevent)
  {
    tk.addEventListener(typeofevent,function(){ 
    $.ajax({
          url: '/FetchPatientData',
          type: "Get",
          dataType: 'json',//this will expect a json response
          data:{id:tk.value}, 
           success: function(response){ 
                 pt_name.value=response[0]["Patient_name"];
                 pt_phone.value=response[0]["Patient_phone"];
                 pt_add.value=response[0]["Patient_address"];
                 pt_dt.value=response[0]["Register_date"];
                 pt_reg.value=response[0]["Patient_pay"];
                 pt_drug.value=response[0]["Medicine_pay"];
                 pt_check.value=response[0]["Check_by"];
                 pt_desc.value=response[0]["Patient_description"];
                 pt_drlist.value=response[0]["Patient_medicines"];
                 
                 

            }
        });     
    });
  }  
  if(tk.length>1)
  {
     FireFunction('change');
  }
  else
  {
    FireFunction('click');
  }
  </script>  

  

  <footer class="page-footer">
    <hr>
    <p id="copyright" style="text-align: center;">Copyright &copy; 2022 <a href="#" target="_blank">HelpHosWeb</a>. All right reserved</p>
  </div>
</footer>
  

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/wow/wow.min.js')}}"></script>

<script src="{{asset('js/theme.js')}}"></script>
</body>
</html>