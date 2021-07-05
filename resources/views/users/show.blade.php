@extends('templateContent')

@section('content')

@include('partials.quickaction')

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ ucfirst(Request::segment(3).' '.substr(Request::segment(1), 0, -1)) }}</h4>
        <form class="form-sample">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input 
                  name="username" 
                  type="text" 
                  class="form-control" 
                  placeholder="Username"
                  value="{{ $user->username }}" 
                  readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Role</label>
              <div class="col-sm-9">
                <input 
                  name="role" 
                  type="text" 
                  class="form-control" 
                  placeholder="Username"
                  value="{{ ucfirst($user->role) }}" 
                  readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kader</label>
              <div class="col-sm-9"> 
                <input 
                  name="kader_nama"
                  id="kader_nama" 
                  type="text" 
                  class="form-control" 
                  placeholder="Pilih Kader"
                  value="{{ $user->kader->nama }}" 
                  readonly 
                  readonly>
              </div>
            </div>
          </div>
        </div>
        <p class="card-description"> Data Kader dengan User ini </p>

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
                    value="{{$user->kader->nama}}" 
                    readonly>
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
                    value="{{$user->kader->jenis_kelamin}}" 
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
                    value="{{$user->kader->tempat_lahir}}"
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
                    value="{{$user->kader->tanggal_lahir}}"
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
                    value="{{$user->kader->alamat}}"
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
                    value="{{$user->kader->nomor_telepon}}"
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
                    value="{{ ($user->kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi"
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