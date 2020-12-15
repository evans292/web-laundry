@extends('layouts.admin-master')

@section('title')
Edit Package ({{ $package->nama_paket }})
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
    <h1>Edit Package</h1>
  </div>
  <div class="section-body">
      <editpackage-component package='{!! $package->toJson() !!}'></editpackage-component>
  </div>
</section>
@endsection
