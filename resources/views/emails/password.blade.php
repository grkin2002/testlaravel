@extends('home.layout')

@section('contents')

Click here to reset your password: {{ url('password/reset/'.$token) }}

@stop