
	<div class='col-md-12 col-lg-12'>
		<nav role="navigation">
			<div class="container">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-header">
					<a href='http://turing.plymouth.edu/~jwong/Webstore/index.html'><img src='http://turing.plymouth.edu/~jwong/Webstore/logo3.gif' width='160' height='130'></a>

					<ul class="nav navbar-nav pull-right">
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Services</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
						<li>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<?php						
										if(isset($_SESSION['username']) && isset($_SESSION['admin'])){
											print("<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/GNinventory.php'>View Graphic Novel Inventory</a></li>
												<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/CBinventory.php'>View Comic Book Inventory</a></li>
												<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/MVinventory.php'>View Movie Inventory</a></li>
												<li class='divider'></li>
												<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/add_Inventory.php?category=' >+Add item to inventory</a></li>
												<li class='divider'></li>
												<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/logout.php'>Logout</a></li>");
										}
										else if(isset($_SESSION['username']) && !isset($_SESSION['admin'])){
											print("<li><a href='http://turing.plymouth.edu/~jwong/Webstore/profile.php'>My Profile</a></li>
											<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/logout.php'>Logout</a></li>");
										}
										else{
											print("<li><a href='http://turing.plymouth.edu/~jwong/Webstore/login.php'>Log in</a></li>
											<li><a href='http://turing.plymouth.edu/~jwong/Webstore/store/'>Log in as admin</a></li>
											<li><a href='http://turing.plymouth.edu/~jwong/Webstore/signup.php'>Sign-up for an account</a></li>");
										}?>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<div class='col-md-3 pull-right'>
								<?php
									if(isset($_SESSION['username']) && isset($_SESSION['admin'])){
										$username = $_SESSION['admin'];
										print("<h3>Welcome $username!</h3>");
									}
									else if(isset($_SESSION['username']) && !isset($_SESSION['admin'])){
										$username = $_SESSION['username'];
										print("<h3>Welcome $username!</h3>");
									}
									else{
										$username = 'Guest';
										print("<h3>Welcome $username</h3>");
									}
								?>
							</div>
						</li>
					</ul>
					
					</div>
					
				</div>
				
			</div>
		</nav>
		<nav class="navbar navbar-inverse">
			<div class="row">
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				  <li><a href='http://turing.plymouth.edu/~jwong/Webstore/index.html'>Home</a></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Comic Books<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/ComicBooks.html">Shop All Comic Books</a></li>
					  <li class="divider"></li>
					  <li class="dropdown-header">Shop by Company</li>
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/Marvel_Comics.html">Marvel</a></li>
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/DC_Comics.html">DC Comics</a></li>
					</ul></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Graphic Novels<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/GraphicNovels.html">Shop All Graphic Novels</a></li>
					  <li class="divider"></li>
					  <li class="dropdown-header">Shop by Company</li>
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/Marvel_ComicsGN.html">Marvel</a></li>
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/DC_ComicsGN.html">DC Comics</a></li>
					</ul>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Movies<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="http://turing.plymouth.edu/~jwong/Webstore/Movies.html">Shop All Movies</a></li>
					  <li class="divider"></li>
					  <li class="dropdown-header">Shop by Studio</li>
					  <li><a href="#">Marvel Studios</a></li>
					  <li><a href="#">Warner Bros.</a></li>
					</ul>
				  </li>
				  
				</ul>
				<div class="col-sm-5 col-md-5 pull-right">
					<form class='navbar-form' role='search' method='GET' action='http://turing.plymouth.edu/~jwong/Webstore/results.php'>
						<div class='input-group'>
							<input type='search' name='search' class="form-control" size='50' placeholder='Search' />
							<div class="input-group-btn">
								<button class="btn btn-primary" type="submit" value="Search" /><i class='glyphicon glyphicon-search'></i></button>
							</div>
						</div>
					</form>
				</div>      
			  </div>
			  
			</div>
		</nav>	
	</div>