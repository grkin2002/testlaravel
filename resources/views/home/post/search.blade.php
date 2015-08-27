@extends('home.layout')
@section('content')

  <div ng-app="huiqiaoApp">

      <div ng-view></div>
  </div>



@stop

@section('footer')
<script src="js/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="angular/app.js"></script>
<script src="angular/controller.js"></script>
@stop