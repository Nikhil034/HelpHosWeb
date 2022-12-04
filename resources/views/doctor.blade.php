<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>HelpHos-Doctors</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <div class="topbar">
    
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">Help</span>-HosWeb</a>

      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/Doctor">Doctors</a>
            </li>
            <li class="nav-item">
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
            <li class="breadcrumb-item active" aria-current="page">Doctor</li>
          </ol>
        </nav>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div>

  <div class="page-section">
    <div class="container">
      <h5 class="text-center wow fadeInUp">Patient(today):-{{date('Y-m-d')}}</h5>
        <hr>
      <form class="contact-form mt-5" method="post" action="/Doctordetailsadd">
        @csrf
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName">Patient Name</label>
            <input type="text" id="pat_name" name="pt_nm" class="form-control" placeholder="Name">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Patient Token</label>
            <select class="form-control" id="token_select" name="pt_token">
            @foreach ($data1 as $key => $value)
             <option>
                 {{$value['Token']}}
            </option>
          @endforeach    
            </select>  
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Description of patient problem</label>
            <textarea id="pat_problem" name="pt_prblm" class="form-control" rows="4" placeholder="Ex:-suffer from mental pain"></textarea>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Select Medicines</label>
            <select class="form-control" id="md_for_pt" name="pt_drug">
            @foreach ($data2 as $key => $value)
             <option>
                 {{$value['drug_name']}}
            </option>
          @endforeach    
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Medicines added by doctor</label>
            <textarea id="lst_of_md" class="form-control" name="pt_drug_lst" rows="4" placeholder="Ex:-medicine1,medicine2"></textarea>
          </div>

          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Check by doctor</label>
            <input type="text" id="" name="pt_ck_dct" class="form-control" placeholder="Name">    
          </div>
        </div>
        <button type="submit" class="btn btn-success wow zoomIn">Submit</button>

        </div>
       
      </form>
    </div>
  </div>

  @if(Session::has('Message'))
      <script>
              swal('Done',"{{Session::get('Message')}}",'success');
      </script>
  @endif

  

  

  <footer class="page-footer">
    <hr>
    <p id="copyright" style="text-align: center;">Copyright &copy; 2022 <a href="#" target="_blank">HelpHosWeb</a>. All right reserved</p>
  </div>
</footer>


<!-- script for dynamically retrive token and based on token make ajax call to retrive select token data -->
<script>
  const tkn=document.querySelector('#token_select');
  const pn=document.querySelector('#pat_name');
  const pp=document.querySelector('#pat_problem');
  const md=document.querySelector("#md_for_pt");
  const lst_md=document.querySelector("#lst_of_md");
  
  //when medicine select add to list of medicine textarea
  md.addEventListener('change',function(){
    lst_md.value+=md.value+",";
  });

  const FireFunction=function(typeofevent)
  {
    //make an ajax call on token is change by doctor to know patient description and name
    tkn.addEventListener(typeofevent,function(){
            $.ajax({
              url: '/FetchPatient',
              type: "Get",
              dataType: 'json',//this will expect a json response
              data:{id:tkn.value}, 
               success: function(response){ 
                     pn.value=response[0]["Patient_name"];
                     pp.value=response[0]["Patient_description"];

                }
            });      

      });
  }

  

  if(tkn.length>1)
  {
     FireFunction('change');
  }
  else
  {
    FireFunction('click');
  }


 
</script>  
  
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/wow/wow.min.js')}}"></script>

<script src="{{asset('js/theme.js')}}"></script>
  
</body>
</html>