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
          <h4 class="card-title">{{ ucfirst(Request::segment(3).' '.substr(Request::segment(1), 0, -1)) }}</h4>
          <form class="form-sample" action="{{ route('objekKriterias.update', $objekKriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <p class="card-description"> Personal info </p>
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
                      value="{{ $objekKriteria->name }}" 
                      required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tipe Jawaban</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control text-dark" required>
                      <option 
                        value="baik_cukup_kurang"
                        {{ ($objekKriteria->type == "baik_cukup_kurang") ? 'selected' : ''}}>
                        Opsi: Baik - Cukup - Kurang
                      </option>
                      <option
                        value="strata-1_d3_sma_smp_sd"
                        {{ ($objekKriteria->type == "strata-1_d3_sma_smp_sd") ? 'selected' : ''}}>
                        Opsi: Pendidikan
                      </option>
                      <option 
                        value="ya_tidak"
                        {{ ($objekKriteria->type == "ya_tidak") ? 'selected' : ''}}>
                        Opsi: Ya / Tidak
                      </option>
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
                      value="{{ $objekKriteria->keterangan }}" 
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