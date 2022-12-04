<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
      <h1 class="text-center wow fadeInUp">View medicines details</h1>
       
      <form class="contact-form mt-5" method="get">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <b>Patient Record(today):-{{date("Y-m-d")}}</b>
              <br>
              <th scope="col">Token</th>
              <th scope="col">Name</th>
              <!-- <th scope="col">View</th> -->
              <th scope="col">Drug</th>
              <th scope="col">Check by</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach($data as $patient)
              @php
              $blog = get_object_vars($patient);
              @endphp
              <td>{{$blog['Token']}}</td>
              <td>{{$blog['Patient_name']}}</td>
              <td>{{$blog['Patient_medicines']}}</td>
              <td>{{$blog['Check_by']}}</td>
              
              <td>
                 <a href="/Updatedrug/{{$blog['Token']}}"><button style="border:none;background-color:cyan" id="editbtn" type="button" value="{{$blog['Token']}}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                   </svg> 
                   </button>
                  </a>
              </td>            
            </tr>
            @endforeach
          </tbody>
        </table>
        
       
      </form>
    </div>
  </div>


 
  

  

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