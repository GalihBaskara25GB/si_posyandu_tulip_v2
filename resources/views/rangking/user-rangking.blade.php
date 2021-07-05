@extends('templateContent')

@section('content')
  <div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
      <div class="card card-info">
        <span class="card-body d-lg-flex align-items-center">
          <p class="mb-lg-0">
            @php
              if(is_null($currentUserRank)) {
                $message = 'Data anda belum dilakukan perangkingan ! Silahkan lakukan verifikasi data terlebih dahulu.';
              } else {
                $message = 'Anda berada pada rangking <b>'.$currentUserRank->getRank().'</b> !
                            Pastikan Nomor Anda Dapat Dihubungi Via Whatsapp Untuk Instruksi Selanjutnya !
                            Atau Datangi Kantor Posyandu Untuk Mendapatkan Instruksi Selanjutnya';
              }

              echo $message;
            @endphp
          </p>
          <button class="close popup-dismiss ml-2">
            <span aria-hidden="true">&times;</span>
          </button>
        </span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Rangking Calon Kader</h4>
            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0 text-decoration-none disabled">  
              Total Data : {{ $numRecords }}
            </a>
          </div>
          <div class="col-12">
            <form class="form-sample" action="{{route('rangking')}}" method="GET">
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
                </tr>
              </thead>
              @php
                $currentPage = Request::__get('page');
                (is_null($currentPage)) ? $i = 1 : $i = (($currentPage-1)*5)+1;
              @endphp
              @foreach ($rangkings as $rangking)
                <tr>
                  <td>{{(is_null(Request::__get('field'))) ? $i++ : $rangking->getRank()}}</td>
                  <td>{{$rangking->nilai_preferensi}}</td>
                  <td>{{$rangking->kader->nama}}</td>
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
          <div class="d-flex mt-4 flex-wrap">
            <nav class="ml-auto">
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
      