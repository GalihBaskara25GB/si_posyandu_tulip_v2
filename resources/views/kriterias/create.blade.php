@extends('templateContent')

@section('content')

  @if (Session::get('success') || Session::get('errors'))
    @include('partials.alert')
  @endif

  @include('partials.quickaction')
  @include('modals.kader')

  <!-- <div class="row">
    <div class="col-12">
    <a href="" button type="buttons" class="btn btn-success">Import Exel</a> -->
        <!-- <form action="{{ route('kaders.import') }}" method="POST" enctype="multipart/form-data"> -->
        <!-- @csrf -->
        <!-- <label for="file">Pilih File Excel</label> -->
        <!-- <input type="file" class="form-control" id="file" name="file"> -->
        <!-- <button type="submit" class="btn btn-outline-info">Import</button> -->
        <!-- </form> -->
    <!-- </div> -->
  <!-- </div> -->
  
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ ucfirst(Request::segment(2).' '.substr(Request::segment(1), 0, -1)) }}</h4>
          <form class="form-sample" action="{{ route('kriterias.store') }}" method="POST" name="formData" id="formData">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Kader</label>
                  <div class="col-sm-6">
                    <input type="hidden" name="kader_id" id="kader_id">
                    <input 
                      name="kader_nama"
                      id="kader_nama" 
                      type="text" 
                      class="form-control" 
                      placeholder="Pilih Kader"
                      readonly 
                      required>
                  </div>
                  <div class="col-sm-3">
                    <button 
                      class="btn btn-sm btn-primary form-control" 
                      type="button"
                      data-toggle="modal" 
                      data-target="#kaderModal">
                      Pilih Kader
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              @foreach ($objekKriterias as $objekKriteria)
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">{{ $objekKriteria->name }}</label>
                  <div class="col-sm-9">
                    <select name="objek_kriteria_id[{{$objekKriteria->id}}]" class="form-control text-dark" required>
                      @php
                        $optionTypes = explode('_', $objekKriteria->type);
                        foreach($optionTypes as $key => $value) {
                          echo '<option value="'.strtoupper($value).'">'.strtoupper($value).'</option>';
                        }
                      @endphp
                    </select>
                  </div>
                </div>
              </div>
              @endforeach

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

