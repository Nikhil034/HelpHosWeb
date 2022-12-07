<style>
  .error
  {
    color:red;
  }
  .none
  {
    display:none;
  }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>HelpHos-Web</title>

  
  <link rel="stylesheet" href="{{asset('css/maicons.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
      <div class="container">
       
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">Help</span>-HosWeb</a>

      

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
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

  <div class="page-hero bg-image overlay-dark" style="background-color:purple;">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make things easy</span>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
               <span>01</span>
              </div>
              <p><span>Easy way connect </span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span>02</span>
              </div>
              <p><span>Quick </span>register</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                 <span>03</span>
              </div>
              <p><span>Collect medicines</span></p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

  
 

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Register Patient</h1>

      <form class="main-form" method="post" action="/SaveRegister">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="pat_name" id="ptname"  required="">
            <span id="msg1" class="error">*Invalid details of field!<span>
            <input type="hidden" class="form-control" placeholder="Token" value="" id="patient_token" name="pat_token"  >
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="number" class="form-control" placeholder="Phone" id="mb"  name="pat_phone"required="" >
            <span id="msg2" class="error">*10 Digit require!<span>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms" >
            <input type="date" class="form-control" name="reg_date" required="">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms" required="">
            <input type="text" class="form-control" placeholder="Address" name="pat_address" required="">
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="number" class="form-control" placeholder="Register fees" name="pay_fees"  id="fees" required="">
            <span id="msg3" class="error">*Invalid fees amount!<span>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea  id="message" class="form-control" rows="3" name="pat_description" placeholder="Enter description of patient problem" required="" ></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit</button>
      </form>
    </div>
  </div> <!-- .page-section -->



   <!---script for generate random token-->
   <script>

    const token_tx=document.getElementById('patient_token');
    let ran = Math.floor(1000+Math.random()*9000);
    token_tx.value=ran;

    const ptn=document.getElementById('ptname');
    const mb=document.getElementById('mb');
    const fs=document.getElementById('fees');

    const ms1=document.querySelector('#msg1');
    const ms2=document.querySelector('#msg2');
    const ms3=document.querySelector('#msg3');
    ms1.classList.add('none');
    ms2.classList.add('none');
    ms3.classList.add('none');
    
    const form = document.querySelector('form');
    form.addEventListener('submit',(e)=>{
      
      if(!isNaN(ptn.value))
        {
          e.preventDefault();
          ms1.classList.remove('none');
        }
        else
        {
          ms1.classList.add('none');
          
        }

        

        if(mb.value.toString().length<10 || mb.value.toString().length>10)
        {
          e.preventDefault();
          ms2.classList.remove('none');
        }
        else
        {
          ms2.classList.add('none');
          
        }

        if(fs.value==0 || fs.value<0)
        {
          e.preventDefault();
          ms3.classList.remove('none');
        }
        else
        {
          ms3.classList.add('none');
        }
      

    });
  
    

   </script>

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

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/wow/wow.min.js')}}"></script>

<script src="{{asset('js/theme.js')}}"></script>



</body>
</html>