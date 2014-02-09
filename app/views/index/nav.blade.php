<nav class="navbar navbar-theme" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Philippine Disaster Information Service</a>
	</div>
	<div class="collapse navbar-collapse" id="main-nav">
		<ul class="navbar-nav nav navbar-right">
			@if(!Sentry::check())
				<li>
					<a href="/login">
						<i class="glyphicon glyphicon-user"></i>&nbsp;Login
					</a>
				</li>
			@else
				<li>
					<a href="#">
						<span class="glyphicon glyphicon-user"></span>&nbsp;{{ Sentry::getUser()->last_name }}, {{ Sentry::getUser()->first_name }}
					</a>
				</li>
				<li><a href="/login/signout"><span class="glyphicon-log-out glyphicon"></span>&nbsp;Logout</a></li>
			@endif
		</ul>
	</div>
</nav>