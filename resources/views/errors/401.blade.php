@extends('master')
@section('page_specific_styles')
	<style>
		#errors{
			border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			color: #444444;
			font-size: 13px;
			margin-bottom: 15px;;
			padding: 8px 8px;
		}
	</style>
@stop
@section('content')
	<div class="container">
		<div class="content" id="errors">
			<h1>Sorry, You are not authorized to this action.</h1>
			<br>{!! link_to(url('/user/'.\Illuminate\Support\Facades\Auth::user()->id), "Back") !!}
		</div>
	</div>
@stop

