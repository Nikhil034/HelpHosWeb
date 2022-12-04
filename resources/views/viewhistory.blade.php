<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>View history page</title>

    
  <link rel="stylesheet" href="{{asset('css/maicons.css')}}">

<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

<link rel="stylesheet" href="{{asset('js/owl-carousel/css/owl.carousel.css')}}">

<link rel="stylesheet" href="{{asset('js/animate/animate.css')}}">

<link rel="stylesheet" href="{{asset('css/theme.css')}}">
  </head>
  <body>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="card">
  <div class="card-header">
    <form method="post" action="/Filterbydate">
      @csrf
    <b>Filter by date :- <input type="date" id="dt" style="border:none;border-radius:4px;color:purple" name="dd"></b> <button class="btn btn-success btn-sm" type="submit" id="ser" onclick="test()">Search</button>
  </div>
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#Token</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Doctor</th>
      <th scope="col">Print</th>
    </tr>
  </thead>
  <tbody>
    @if($historydata)
    @foreach($historydata as $patient) 
    <tr>
      <td>{{$patient->token}}</td>
      <td>{{$patient->Patient_name}}</td>
      <td>{{$patient->Register_date}}</td>
      <td>{{$patient->Check_by}}</td>
      <td><a href="/viewprint/{{$patient->token}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
           <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
           <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg></a>
       </td>
    </tr>
    @endforeach
    @else
      <b>No data display yet!<b>
    @endif    
  </tbody>
</table>
</form>
   <button class="btn btn-danger" id="exit">Tap to Exit</button>
  </div>
</div>



  </body>

  <script>
    const exitbtn=document.querySelector('#exit');
    exitbtn.addEventListener('click',function(){
      window.location.href="/Checkpatient";
    });
          
    
  </script>  

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('js/wow/wow.min.js')}}"></script>

<script src="{{asset('js/theme.js')}}"></script>
    
</html>