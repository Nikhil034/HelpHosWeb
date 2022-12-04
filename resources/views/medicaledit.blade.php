<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  

  <title>HelpHos-Medicine</title>

    
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
            <li class="breadcrumb-item" aria-current="page">Medicines</li>
          </ol>
        </nav>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Edit medicines details</h1>
       
      <form class="contact-form mt-5" method="post" action="/Updatedrugsave">
        @csrf
       
       <label>Token of patient</label>
       <input type="number"  class="form-control" name="tk" value="{{$id}}"  readonly="">
       <br>
       <label>Pay for drug</label>
       <input type="number" class="form-control" name="pd" value="" id="txpay">

       <br>
       <input type="submit" value="Save"  class="btn btn-primary">
       <a href="/Medical"><button type="button" class="btn btn-warning">Tap to back</button></a>
       
      </form>
    </div>
  </div>



   @if(Session::has('Message'))
      <script>
              const tx=document.getElementById('txpay').readOnly=true;
              swal('Done',"{{Session::get('Message')}}",'success');
      </script>
  @endif
     


 
  

  

  <footer class="page-footer">
    <hr>
    <p id="copyright" style="text-align: center;">Copyright &copy; 2022 <a href="/" target="_blank">HelpHosWeb</a>. All right reserved</p>
  </div>
</footer>
  

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/wow/wow.min.js')}}"></script>

<script src="{{asset('js/theme.js')}}"></script>


  
</body>
</html>