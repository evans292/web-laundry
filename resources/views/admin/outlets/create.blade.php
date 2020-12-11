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
    <h1>Add Outlet</h1>
  </div>
  <div class="section-body">
    <createoutlet-component />
  </div>
</section>
@endsection

@section('scripts')

@endsection
