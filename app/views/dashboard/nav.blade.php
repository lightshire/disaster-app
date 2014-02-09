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
		<ul class="navbar-nav nav navbar-let">
			@if(Sentry::getUser()->hasAnyAccess(array('system','system.users')))
			<li class="dropdown">
				<a href="/dashboard/users" class="dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-user"></span>&nbsp;Users&nbsp;<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="/dashboard/users/create"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;New User..</a></li>
					<li><a href="/dashboard/users/"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;All User List..</a></li>
				</ul>
			</li>
			@endif

			@if(Sentry::getUser()->hasAccess('system'))
				<li class="dropdown">
					<a href="/dashboard/settings" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-cog"></span>&nbsp;Settings&nbsp;<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/dashboard/settings/regions"><span class="glyphicon glyphicon-globe"></span>&nbsp;Manage Regions..</a></li>
						<li><a href="/dashboard/settings/disasters"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Manage Disaster Types..</a></li>
					</ul>
				</li>
			@endif

			@if(Sentry::getUser()->hasAccess('system.barangay'))
				<li><a href="/dashboard/concerns"><span class="glyphicon glyphicon-road"></span>&nbsp;Public Concerns</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-folder-open"></span>&nbsp;Reports<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/dashboard/b/reports/create"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Submit Reports</a></li>
						<li><a href="/dashboard/b/reports/"><span class="glyphicon glyphicon-list"></span>&nbsp;All Reports</a></li>
					</ul>
				</li>
			@endif

			@if(Sentry::getUser()->hasAccess('system.provincial'))
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-list"></span>&nbsp;Reports<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/dashboard/p/reports/create"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Create A Report</li>
						<li><a href="/dashboard/p/reports"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;All Reports</a></li>
						<li><a href="/dashboard/p/backtracks"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Barangay Reports</a></li>
					</ul>
				</li>
			@endif

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-user"></span>&nbsp;{{ Sentry::getUser()->last_name }}, {{ Sentry::getUser()->first_name }}
				</a>
			</li>
			<li><a href="/login/signout"><span class="glyphicon-log-out glyphicon"></span>&nbsp;Logout</a></li>
		</ul>
	</div>
</nav>