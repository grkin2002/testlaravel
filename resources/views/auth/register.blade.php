@extends('home.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">
								<canvas id="myCanvas" height="30px" width="100px">Your brower does not support the canvas tag</canvas>
							</label>
							<div class="col-md-6">

								<input id="vtext" type="text" class="form-control" placeholder="please fill in the verification code on the left">
							</div>

						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button id="submit" type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
	<script type="text/javascript">
	var canvas = $("#myCanvas").get(0);
	var _canvas= $("#myCanvas").get(0).getContext("2d");
	return_str="";
	var _ifstart = false;
	var _B_x=0;
	var _B_y=0;


	function pass(e){
		var value= $('#vtext').val();
		if( value == return_str){
			// alert('you pass!');
			return true;
		}else{
			alert('verification not correct!');
			e.preventDefault();
		};
	}

	function start(){
		try{
			function drawscreen(){
				_canvas.fillStyle="#ffffaa";
				_canvas.fillRect(0,0,100,30);
				_canvas.strokeStyle='#000';
				_canvas.strokeRect(5,5,95,25);
			};
			function write_text(_str){
				_canvas.fillStyle="#000000";
				_canvas.font = "20px _sans";
				_canvas.textBaseline ="top";
				_canvas.fillText(_str,19,8);
			};
			function getabc(){
				var _str="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";
				var _str_array=_str.split(",");
				return_str="";
				for(i=0;i<5;i++){
					var _rnd=Math.floor(Math.random()*_str_array.length);
					return_str+=_str_array[_rnd];
				};
			};
			drawscreen();
			getabc();
			write_text(return_str);
		}catch(e){
			alert(e);
		}
	};

	$(function(){
		start();
		$('#submit').click(function(e){
			pass(e);
		});
	});

	</script>

@endsection