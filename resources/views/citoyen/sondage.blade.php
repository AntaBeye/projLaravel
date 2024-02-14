    

<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Sondages</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="/backoffice/css/style-starter.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.html">Collective</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    < //image logo -->

    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="/backoffice/images/logo.png" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="{{ route('home') }}"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>
        <li class="menu-list">
          <a href="#"><i class="fa fa-user"></i>
            <span>Profils <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('candidatListe') }}">Candidats</a> </li>
          </ul>
        </li>
        <li><a href="/sondage"><i class="fa fa-th"></i> <span>Sondages</span></a></li>
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        
        <div class="user-dropdown-details d-flex">
          <div class="profile_details_left">
            <ul class="nofitications-dropdown">
                  
                </ul>
              </li>
            </ul>
          </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="/backoffice/images/adminlogo.jpg" class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">{{ auth()->user()->name }}</h5>
                  </li>
                  <li> <a href="#"><i class="lnr lnr-user"></i>Mon Profil</a> </li>
                  <li class="logout"> <form id="logout-form" action="{{ route('logout') }}" method="POST"> <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                    <i class="fa fa-power-off"> </i>{{ __('Logout') }} </a>
                    @csrf 
                </form>
            </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
  

   <h1>SONDAGES</h1>

<table class="table" style="width: 70%; margin: 0 auto;" >
  <thead>
    <tr>
      <th scope="col">Nom Candidat</th>
      <th scope="col">Parti Politique</th>
      <th scope="col">Programme Politique</th>
      <th scope="col">Avis</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($candidats as $candidat)
    <tr>
      <td >{{ $candidat->name }}</td>
      <td>{{ $candidat->parti }}</td>
      <td>
        <textarea rows="3" cols="30" readonly>{{ $candidat->programme_politique }}</textarea>
    </td>
    <td> 
      @if(auth()->user()->hasVotedForCandidat($candidat->id))
    @if($candidat->sondages->where('user_id', auth()->user()->id)->isNotEmpty())
        {{ $candidat->sondages->where('user_id', auth()->user()->id)->first()->rating_text}}
    @else
        Avis non disponible
    @endif
    @else
      <form action="{{ route('sondages.store') }}" method="POST">
          @csrf
          <input type="hidden" name="programme_politique_id" value="{{ $candidat->id }}">
          <label for="rating"></label>
          <select name="rating" id="rating">
              <option value="" disabled selected>Choisissez un avis</option>
              <option value="1">Satisfait</option>
              <option value="2">Peu Satisfait</option>
              <!-- ... autres options ... -->
              <option value="3">Pas Satisfait</option>
          </select>
          <button type="submit">Soumettre</button>
      </form>
  @endif
</td>

    </tr>
    @endforeach
  </tbody>
</table> 
<!-- Formulaire de sondage -->




  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 Collective. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank"
      class="text-primary">W3layouts.</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="/backoffice/js/jquery-3.3.1.min.js"></script>
<script src="/backoffice/js/jquery-1.10.2.min.js"></script>

<!-- chart js -->
<script src="/backoffice/js/Chart.min.js"></script>
<script src="/backoffice/js/utils.js"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="/backoffice/js/bar.js"></script>
<script src="/backoffice/js/linechart.js"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


<script src="/backoffice/js/jquery.nicescroll.js"></script>
<script src="/backoffice/js/scripts.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="/backoffice/js/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="/backoffice/js/bootstrap.min.js"></script>

</body>

</html>
  
{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
    
                <div class="card-body">
                    Tu es admin.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}