<html lang="ar" dir="rtl" class="fontawesome-i2svg-active fontawesome-i2svg-complete"><head>
    <title>المكتبات الالكترونية </title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&amp;display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/fontawesome/js/all.min.js') }}" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer="" src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
	
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/custome.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

</head> 

<body>    
    <header class="header">	    
        <div class="branding">
            <div class="container-fluid position-relative py-3">
                <div class="logo-wrapper">
					<div class="row">
						<div class="site-logo col-md-5 col-sm-4 col-12">
							<a class="navbar-brand" href="{{ URL::to('/') }}">
								<img class="logo-icon me-2" src="{{asset('assets/images/site-logo.svg')}}" alt="logo">
								<span class="logo-text">المكتبات الإلكترونية </span>
							</a>
						</div>   
						<nav class="navbar navbar-expand-lg navbar-light bg-body col-md-7 col-sm-8 col-12">
							<div class="container-fluid">					  
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">المميزات</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">التسعيرة</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">من نحن</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">تواصل معنا</a>
								</li>								
								<li class="nav-item">
									<b><a class="nav-link" href="{{ URL::to('/school') }}">دخول</a></b>
								</li>
								<li class="nav-item">
									<b><a class="nav-link" href="{{ URL::to('/register') }}">تسجيل</a></b>
								</li>
								<!-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Dropdown link
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Another action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
									</ul>
								</li> -->
								</ul>
							</div>
							</div>
						</nav> 
					</div>
                </div><!--//docs-logo-wrapper-->				
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    