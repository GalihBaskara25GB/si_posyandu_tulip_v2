@extends('templateContent')

@section('content')

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="d-sm-flex align-items-baseline report-summary-header">
              <h5 class="font-weight-semibold">Info Bar</h5>
            </div>
          </div>
        </div>
        <div class="row report-inner-cards-wrapper">
          <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Total Kader</span>
              <h4>{{ $kader }}</h4>
              <span class="report-count"> Kader</span>
            </div>
            <div class="inner-card-icon bg-success">
              <i class="icon-people"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Total Kriteria</span>
              <h4>{{ $kriteria }}</h4>
              <span class="report-count">Kriteria</span>
            </div>
            <div class="inner-card-icon bg-danger">
              <i class="icon-layers"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Total User</span>
              <h4>{{ $user }}</h4>
              <span class="report-count"> User</span>
            </div>
            <div class="inner-card-icon bg-warning">
              <i class="icon-credit-card"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection