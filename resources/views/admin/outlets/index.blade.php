@extends('layouts.admin-master')

@section('title')
Outlets
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Outlets</h1>
  </div>
  <div class="section-body">
      <tableoutlet-component />
  </div>
</section>
@endsection
