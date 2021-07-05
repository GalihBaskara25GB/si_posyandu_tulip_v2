@extends('templateContent')

@section('content')

  @if (Session::get('success') || Session::get('errors') || !is_null($message))
    @include('partials.alert')
  @endif

  @include('rangking.quickbar-perhitungan')
 
  <div class="row collapse" id="collapseExample">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php echo $topsis->resultView ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Hasil Perhitungan Bobot Dengan Metode AHP</h4>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th  class="font-weight-bold">Kriteria</th>
                  <th  class="font-weight-bold">Bobot</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Pendidikan</td>
                  <td>{{ $ahp->matrix[$i=0]->avg }}</td>
                </tr>
                <tr>
                  <td>Keaktifan Sosial</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
                <tr>
                  <td>Kepribadian</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
                <tr>
                  <td>Penyakit Berat</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
                <tr>
                  <td>Pengetahuan Kesehatan</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
                <tr>
                  <td>Keahlian Komputer</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
                <tr>
                  <td>Kepemilikan HP</td>
                  <td>{{ $ahp->matrix[++$i]->avg }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex mt-4 flex-wrap">
            <nav class="ml-auto">
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Hasil Perangkingan Dengan Metode TOPSIS</h4>
            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0 text-decoration-none disabled">  
              Total Data : {{ $numRecords }}
            </a>
          </div>
          <div class="col-12">
            <form class="form-sample" action="{{route('rangkings.index')}}" method="GET">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-append">
                    <select name="field" class="form-control text-dark" required>
                      <option value="nama">Nama</option>
                    </select>
                  </div>
                  <input 
                    name="keyword"
                    type="text" 
                    class="form-control" 
                    placeholder="Cari Berdasarkan Nama Kader" 
                    aria-label="Cari Berdasarkan Nama Kader" 
                    aria-describedby="basic-addon2"
                    required>
                  <div class="input-group-append">
                    <button class="btn btn-sm btn-primary" type="submit">Cari</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table">
              <thead>
                <tr>
                  <th class="font-weight-bold">Rangking</th>
                  <th class="font-weight-bold">Nilai Preferensi</th>
                  <th class="font-weight-bold">Nama Kader</th>
                  <th class="font-weight-bold">Nomor Telepon</th>
                  <th class="font-weight-bold">Opsi</th>
                </tr>
              </thead>
              <tbody>
              @php
                $currentPage = Request::__get('page');
                (is_null($currentPage)) ? $i = 1 : $i = (($currentPage-1)*10)+1;
              @endphp
              @foreach ($rangkings as $rangking)
                <tr>
                  <td>{{(is_null(Request::__get('field'))) ? $i++ : $rangking->getRank()}}</td>
                  <td>{{$rangking->nilai_preferensi}}</td>
                  <td>{{$rangking->kader->nama}}</td>
                  <td>{{$rangking->kader->nomor_telepon}}</td>
                  <td>
                    <a 
                      target="_new" 
                      href="https://api.whatsapp.com/send?phone={{substr($rangking->kader->nomor_telepon, 1)}}&text=Hai+{{str_replace(' ', '+', $rangking->kader->nama)}}" class="btn btn-sm btn-success">
                      Hubungi Via Whatsapp
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-info">
                      Masukkan Dalam Daftar Diterima
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex mt-4 flex-wrap">
            <nav class="ml-auto">
              {!! ($numRecords > 0) ? $rangkings->links() : '' !!}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
      