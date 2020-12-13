@extends('layouts.admin-master')

@section('title')
Packages
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Packages</h1>
  </div>
  <div class="section-body">
      <tablepackage-component />
  </div>
</section>
@endsection
