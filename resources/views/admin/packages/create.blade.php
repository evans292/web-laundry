@extends('layouts.admin-master')

@section('title')
Create Outlets
@endsection

@section('css')
  <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
  </style>
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Add Package</h1>
  </div>
  <div class="section-body">
    <createpackage-component />
  </div>
</section>
@endsection

@section('scripts')

@endsection
