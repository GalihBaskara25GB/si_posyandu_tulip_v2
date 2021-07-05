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
          <form class="form-sample" action="{{ route('objekKriterias.store') }}" method="POST">
            @csrf
            <p class="card-description"> Objek info </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input 
                      name="name" 
                      type="text" 
                      class="form-control" 
                      placeholder="Nama Objek Kriteria" 
                      required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tipe Jawaban</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control text-dark" required>
                      <option value="baik_cukup_kurang">Opsi: Baik - Cukup - Kurang</option>
                      <option value="strata-1_d3_sma_smp_sd">Opsi: Pendidikan</option>
                      <option value="1_0">Opsi: Ya / Tidak</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Keterangan</label>
                  <div class="col-sm-9">
                    <input 
                      name="keterangan" 
                      type="text" 
                      class="form-control" 
                      placeholder="Keterangan"
                      value="-" 
                      required>
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

