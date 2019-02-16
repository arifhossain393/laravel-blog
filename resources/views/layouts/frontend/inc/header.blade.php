<!-- Main Header -->
<header class="main-header">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo-outer">
                        <div class="logo"><a href="index.php"><img src="assets/images/logo.png" alt="" /></a></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="header-search">
                        <form method="get" action="search.php">
                            <div class="form-group">
                                <input type="search" name="search" value="" placeholder="Find more articles, type your search..." required>
                                <button type="submit" class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!--End Header Upper-->
    
    <!--Header Lower-->
    <div class="header-lower">
        <div class="auto-container">
                <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contacts.php">Contacts</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <div class="outer-box">
                    <nav class="main-menu">
                        <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
                            <ul class="navigation clearfix">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
               
                <!-- Hidden Nav Toggler -->
                 <div class="nav-toggler">
                     <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                 </div>
                
            </div>
        </div>
    </div>
    <!--End Header Lower-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.php" title=""><img src="assets/images/logo-small.png" alt="" /></a>
            </div>
            
            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="current"><a href="{{route('home')}}">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contacts</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
            
        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Header Style Two -->

<!-- Hidden Navigation Bar -->
<section class="hidden-bar left-align">
    
    <div class="hidden-bar-closer">
        <button><span class="qb-close-button"></span></button>
    </div>
    
    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">
        <div class="logo">
            <a href="index.php"><img src="{{ asset('assets/images/mobile-logo.png') }}" alt="" /></a>
        </div>
        <!-- .Side-menu -->
        <div class="side-menu">
            <!--navigation-->
            <ul class="navigation clearfix">
                <li class="current"><a href="{{route('home')}}">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contacts</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>
        <!-- /.Side-menu -->
        
        <!--Options Box-->
        <div class="options-box">
            <!--Sidebar Search-->
            <div class="sidebar-search">
                <form method="get" action="search.php">
                    <div class="form-group">
                        <input type="search" name="search" value="" placeholder="Search ..." required="">
                        <button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
                    </div>
                </form>
            </div>
            
            <!--Social Links-->
            <ul class="social-links clearfix">
                <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                <li><a href="#"><span class="fa fa-pinterest"></span></a></li>            
            </ul>
        </div>
    </div><!-- / Hidden Bar Wrapper -->
</section>
<!-- End / Hidden Bar -->