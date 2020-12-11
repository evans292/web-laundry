@extends('layouts.admin-master')

@section('title')
Edit Outlet ({{ $outlet->nama }})
@endsection

@section('css')
  <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }

    textarea {
      padding: 10px;
      background-color: #fff;
      padding: 0.375rem 0.75rem;
      background-clip: padding-box;
      border: 1px solid #ced4da;
    }

    @media (prefers-reduced-motion: reduce) {
      textarea {
        transition: none;
      }
    }

    textarea:focus {
      color: #495057;
      background-color: #fff;
      border-color: #a1cbef;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    }
  </style>
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Outlet</h1>
  </div>
  <div class="section-body">
      <editoutlet-component outlet='{!! $outlet->toJson() !!}'></editoutlet-component>
  </div>
</section>
@endsection
