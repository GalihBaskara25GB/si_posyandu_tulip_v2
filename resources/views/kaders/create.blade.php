@extends('templateContent')

@section('content')

  @if (Session::get('success') || Session::get('errors'))
    @include('partials.alert')
  @endif

  @include('partials.quickaction')

  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ ucfirst(Request::segment(2).' '.substr(Request::segment(1), 0, -1)) }}</h4>
          <form class="form-sample" action="{{ route('kaders.store') }}" method="POST">
            @csrf
            <p class="card-description"> Personal info </p>
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
                      required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Gender</label>
                  <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control text-dark" required>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
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
                      placeholder="Kota Dilahirkan" 
                      required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input name="tanggal_lahir" type="date" class="form-control" required>
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
                      required>
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
                      required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <select name="is_verified" class="form-control text-dark" required>
                      <option 
                        value="1">
                        Sudah Diverifikasi
                      </option>
                      <option 
                        value="0" selected>
                        Belum Diverifikasi
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 ml-auto text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-outline-danger">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

