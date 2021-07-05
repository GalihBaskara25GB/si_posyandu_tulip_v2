@extends('templateContent')

@section('content')

@if(!(Auth::user()->is_verified))
<div class="row purchace-popup">
  <div class="col-12 stretch-card grid-margin">
    <div class="card card-danger">
      <span class="card-body d-lg-flex align-items-center">
        <p class="mb-lg-0">
          Data Anda belum diverifikasi, untuk melakukan verifikasi silahkan datang ke 
          Posyandu dengan membawa <b>fotokopi atau Ijazah asli</b> pendidikan terakhir.
        </p>
        <button class="close popup-dismiss ml-2">
          <span aria-hidden="true">&times;</span>
        </button>
      </span>
    </div>
  </div>
</div>
@endif

@php
  $kader = Auth::user()->kader;
@endphp
<div class="row">
  
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body performane-indicator-card">
        <div class="d-sm-flex">
          <h4 class="card-title flex-shrink-1">Data Diri Anda</h4>
        </div>
        <form class="form-sample">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input 
                    name="nama" 
                    type="text" 
                    class="form-control" 
                    placeholder="Nama Lengkap"
                    value="{{$kader->nama}}" 
                    readonly>
                  <input 
                    type="hidden" 
                    value="{{$kader->is_verified}}" 
                    name="is_verified">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <input 
                    name="kader" 
                    type="text" 
                    class="form-control" 
                    placeholder="Nama Lengkap"
                    value="{{$kader->jenis_kelamin}}" 
                    readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input 
                    name="tempat_lahir" 
                    type="text" 
                    class="form-control" 
                    placeholder="Kota DIlahirkan"
                    value="{{$kader->tempat_lahir}}"
                    readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <input 
                    name="tanggal_lahir" 
                    type="date" 
                    class="form-control"
                    value="{{$kader->tanggal_lahir}}"
                    readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input 
                    name="alamat" 
                    type="text" 
                    class="form-control" 
                    placeholder="Alamat Lengkap"
                    value="{{$kader->alamat}}"
                    readonly>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                  <input 
                    name="nomor_telepon" 
                    type="text" 
                    class="form-control" 
                    placeholder="Nomor Telepon Yang Dapat Dihubungi"
                    maxLength="16"
                    value="{{$kader->nomor_telepon}}"
                    readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                  <input 
                    name="is_verified" 
                    type="text" 
                    class="form-control" 
                    placeholder="Status Verifikasi"
                    maxLength="16"
                    value="{{ ($kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi"
                    readonly>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection