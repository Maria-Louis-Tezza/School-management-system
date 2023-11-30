

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\demo.css">
    <title>Dashboard</title>
</head>
<body>
    
<aside class="love-text"> Inspired from <a href="https://dribbble.com/shots/5538143-Project-management-tool-Projects-Card-view" target="_blank"> this </a> Dribbble Shot. <br/> <br/> <span class="desc">With <i class="fa fa-heart" aria-hidden="true"></i> from </span><br/> Nathan5x <br/>
</aside>

<div class="container">
	<div class="content">
		<section class="sidebar">
			<div class="logo">
				<i class="fa fa-instagram icon" aria-hidden="true"></i>
			</div>

			<nav>
				<ul class="menu-options">
					<li> <i class="fa fa-home icon" aria-hidden="true"></i> </li>
					<li class="selected"> <i class="fa fa-th-large icon" aria-hidden="true"></i> </li>
					<li> <i class="fa fa-calendar icon" aria-hidden="true"></i> </li>
					<li> <i class="fa fa-comment-o icon" aria-hidden="true"></i> </li>
					<li> <i class="fa fa-clock-o icon" aria-hidden="true"></i> </li>
					<li> <i class="fa fa-user-o icon" aria-hidden="true"></i> </li>
					<li> <i class="fa fa-wrench icon" aria-hidden="true"></i> </li>
				</ul>
			</nav>

			<div class="more-options">
				<i class="fa fa-ellipsis-h icon" aria-hidden="true"></i>
			</div>
		</section>

		<section class="main-content">
			<div class="app">
				<div class="fab-icon"> + </div>
				<header class="sub-menu">
					<div class="title"> Projects </div>
					<ul class="menu">
						<li> All
							<div class="badge"> 87 </div>
						</li>
						<li class="selected"> Current
							<div class="badge"> 6 </div>
						</li>
						<li> Pending
							<div class="badge"> 2 </div>
						</li>
						<li> Completed
							<div class="badge"> 79 </div>
						</li>
						<li> Failed </li>
					</ul>

					<div class="user-options">
						<div class="icon"> <i class="fa fa-search" aria-hidden="true"></i> </div>
						<div class="icon"> <i class="fa fa-bell-o" aria-hidden="true"></i>
							<div class="badge"> 3 </div>
						</div>
						<div class="icon user-img"> <img src="https://source.unsplash.com/36x36/?human" alt="Image 001" /> </div>
					</div>
				</header>

				<section class="app-content">

					<header>
						<div class="searchbox">
							<div class="icon"> <i class="fa fa-search" aria-hidden="true"></i> </div>
							<input type="text" name="search" placeholder="Search a project" class="search-text"> </input>
						</div>

						<div class="app-list-options">
							<div class="sort-dropdown"> Sort by <span class="by"> Project progress </span> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
								<div class="drop"> <i class="fa fa-caret-down" aria-hidden="true"></i> </div>
							</div>
							<div class="icon"> <i class="fa fa-filter" aria-hidden="true"></i> </div>
							<div class="display-group">
								<div class="icon"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
								<div class="icon selected"> <i class="fa fa-th" aria-hidden="true"></i> </div>
							</div>
						</div>

					</header>

					<ul class="projects">
						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brands" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Sports Interactive </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> sportsinteractive.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:94%" data-value="94"></p>
								<progress max="100" value="94" data-value="94"> 94% </progress>
							</div>
							<div class="footer-row">
								<div class="days danger"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 2 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brand" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Homechoice </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> homchoice.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:64%" data-value="64"></p>
								<progress max="100" value="64" data-value="64"> 64% </progress>
							</div>
							<div class="footer-row">
								<div class="days warning"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 4 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?icon" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Big Money Real Estate </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> bigmoneyrealestate.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:59%" data-value="59"></p>
								<progress max="100" value="59" data-value="59"> 59% </progress>
							</div>
							<div class="footer-row">
								<div class="days warning"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 5 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?adventure" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Springfield media </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> springfieldmedia.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:94%" data-value="94"></p>
								<progress max="100" value="94" data-value="94"> 94% </progress>
							</div>
							<div class="footer-row">
								<div class="days"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 7 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?flower" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Regular Logistics </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> regularlogistics.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:44%" data-value="44"></p>
								<progress max="100" value="44" data-value="44"> 94% </progress>
							</div>
							<div class="footer-row">
								<div class="days"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 9 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brands" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Foursquare Agency </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> foursquareagency.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:39%" data-value="39"></p>
								<progress max="100" value="39" data-value="39"> 39% </progress>
							</div>
							<div class="footer-row">
								<div class="days danger"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 11 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?r" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Piece Studio </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> piecestudio.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:34%" data-value="34"></p>
								<progress max="100" value="34" data-value="34" class="low"> 34% </progress>
							</div>
							<div class="footer-row">
								<div class="days"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 12 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?sanfrancisco" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Legacy Foundation </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> legacyfoundation.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:32%" data-value="32"></p>
								<progress max="100" value="32" data-value="94"> 32% </progress>
							</div>
							<div class="footer-row">
								<div class="days"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 12 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brands" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Sports Interactive </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> sportsinteractive.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:94%" data-value="94"></p>
								<progress max="100" value="94" data-value="94"> 94% </progress>
							</div>
							<div class="footer-row">
								<div class="days danger"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 2 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brands" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Sports Interactive </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> sportsinteractive.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:94%" data-value="94"></p>
								<progress max="100" value="94" data-value="94"> 94% </progress>
							</div>
							<div class="footer-row">
								<div class="days danger"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 2 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

						<li class="project-item">
							<div class="logo-row"> <img src="https://source.unsplash.com/48x48/?brands" alt="Image 001" />
								<div class="icon"> <i class="fa fa-ellipsis-h icon" aria-hidden="true"></i> </div>
							</div>
							<div class="title-row">
								<h3> Legacy Foundation </h3>
								<div class="links"> <i class="fa fa-external-link icon" aria-hidden="true"></i> <a href="#"> legacyfoundation.com </a> </div>
							</div>
							<div class="desc-row">
								<p> Web resource which contains all about transfer in the world of sports. </div>
							<div class="progress-row">
								<p class="value-label" style="width:32%" data-value="32"></p>
								<progress max="100" value="32" data-value="32"> 32% </progress>
							</div>
							<div class="footer-row">
								<div class="days danger"> <i class="fa fa-clock-o icon" aria-hidden="true"></i> 2 days left </div>
								<div class="users">
									<img src="https://source.unsplash.com/24x24/?human" alt="Image 001" />
									<img src="https://source.unsplash.com/24x24/?humans" alt="Image 001" />
								</div>
							</div>
						</li>

					</ul>
				</section>
			</div>
		</section>
	</div>
</div>

</body>
</html>