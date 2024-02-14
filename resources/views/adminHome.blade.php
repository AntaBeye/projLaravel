    

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

  <title>Espace Admin</title>

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
        <li class="active"><a href="{{ route('admin.home') }}"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>
        <li class="menu-list">
          <a href="#"><i class="fa fa-cogs"></i>
            <span>Profils <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('listeCitoyen') }}">Citoyens</a> </li>
            <li><a href="{{ route('listeCandidat') }}">Candidats</a> </li>
          </ul>
        </li>
        <li><a href="{{ route('programPol') }}"><i class="fa fa-table"></i> <span>Programmes Politiques</span></a></li>
        <li><a href="/adminSondage"><i class="fa fa-th"></i> <span>Sondages</span></a></li>
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
                    <h5 class="user-name">ADMIN</h5>
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
    <div class="welcome-msg pt-3 pb-4">
      <h1>Bonjour <span class="text-primary">Admin</span>, Bon retour !</h1>
    </div>

    <!-- statistics data -->
    <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-primary number">{{$nombreCitoyens}}</h3>
                <p class="stat-text">Nombre de Citoyens</p>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-users"> </i>
                <h3 class="text-secondary number">{{ \App\Models\User::where('type', 2)->count() }}</h3>
                <p class="stat-text">Nombre de Candidats</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
          <div class="row">
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <i class="lnr lnr-cloud-download"> </i>
                <h3 class="text-success number">{{ \App\Models\Sondage::count() }}</h3>
                <p class="stat-text">Votes</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- //statistics data -->

    <!-- charts -->
    <div id="chart-container">
      <canvas id="my-chart"></canvas>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script>
      // Récupérer les données depuis l'API
      fetch('/api/data-for-chart')
          .then(response => response.json())
          .then(data => {
              // Préparer les données pour le diagramme
              const candidats = Object.keys(data);
              const categories = Object.keys(data[candidats[0]]); // Supposons que toutes les catégories sont les mêmes pour tous les candidats
              const datasets = categories.map(cat => ({
                  label: cat,
                  data: candidats.map(candidat => data[candidat][cat] || 0),
                  backgroundColor: getCategoryColor(cat), // Fonction pour attribuer une couleur à chaque catégorie
              }));
  
              // Créer le diagramme
              const ctx = document.getElementById('my-chart').getContext('2d');
              new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: candidats,
                      datasets: datasets
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
              });
          });
  
      // Fonction pour attribuer une couleur à chaque catégorie
      function getCategoryColor(category) {
          switch (category) {
              case 'Peu Satisfait':
                  return 'rgba(255, 99, 132, 0.2)';
              case 'Satisfait':
                  return 'rgba(54, 162, 235, 0.2)';
              case 'Tres Satisfait':
                  return 'rgba(75, 192, 192, 0.2)';
              default:
                  return 'rgba(0, 0, 0, 0.2)';
          }
      }
  </script>
  
  
    <!-- //charts -->

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