@extends('template')

@section('content')
{{ View::make('index.nav') }}
<div class="wrapper">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<span class="glyphicon glyphicon-search"></span>&nbsp;Search<span class="glyphicon glyphicon-chevron-down pull-right"></span>
					</div>
				</div>
				<div class="panel-body">
					{{ View::make('index.search') }}
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<span class="glyphicon glyphicon-facetime-video"></span>&nbsp;Public Concerns
						<span class="glyphicon glyphicon-chevron-down pull-right"></span>
					</div>
				</div>
				<div class="panel-body">
					{{ View::make('index.concerns') }}
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<span class="glyphicon glyphicon-list-alt"></span>&nbsp;
						Latest Reports
					</div>
				</div>
				<div class="panel-body">
					{{ View::make('api.reports') }}
				</div>
			</div>
		</div>
	</div>
</div>	
@stop

@section('scripts')
	<script type="text/javascript" src="/js/front.js"></script>
@stop