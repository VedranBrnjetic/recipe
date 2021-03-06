<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('htmlHeadSeo')
    
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <main id="main" data-user="<?php echo csrf_token(); ?>"></main>  <!-- user id into data-user -->
    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >myBBC Recipes</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >Recipes</a>
            </li>
            
        </ul>
    </nav>

    <!-- Header -->
    @yield('header')
    
    <!-- Content -->
    <section id="services" role="main" class="services">
        <div class="container">
            <div class="row text-center">
                <div id="starredRecipes" class="col-xs-12 col-sm-12 col-md-2">
					
					<div class="starred-recipes" data-example-id="panel-without-body-with-table">
						<div class="panel panel-default">
						  <!-- Default panel contents -->
						  <div class="panel-heading">Your starred recipes</div>

						  <!-- Table -->
						  <table class="table">
							<thead>
							  <tr>
								<th>Recipe</th>
								<th>Cooking time</th>							
							  </tr>
							</thead>
							<tbody>
							<tr>
								<td><a href="recipes/"></a></td> 
								<td></td>
							</tr>
						
							 </tbody>
						  </table>
						 
						  
						  	<p>Sorry, you don't currently have any starred recipes, get started by starring recipes you like</p>
						  
					</div>
				  </div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-8">
				  <div class="thumbnail">
				 	
					<img id="recipe-photo" src="/images/recipes/{{{ $recipe->image_url }}}" title="{{{ $recipe->name }}} photo" alt="{{{ $recipe->name }}} photo">
				  	
					  <div class="caption">
						@yield('content')
					<p><a href="/" class="btn btn-info btn-xs" role="button">Back to homepage</a></p>
						
					</div>
				  </div>
				</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
 <!-- Recipes -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our featured recipes</h2>
                    <hr class="small">                
                    <div id="recipe-list" class="row">
                       
                    </div>
                    <!-- /.row (nested) -->
                    
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

  

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>BBC Recipe</strong>
                    </h4>
                    <p>53A Plashet Road<br>London, E13 0QA</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> +44 7928 076 812</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:vedran.brnjetic@gmail.com">vedran.brnjetic@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="http://facebook.com/drvce"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Vedran Brnjetic 2015, All images are under creative commons license and therefore free to use and reuse without attribution</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
