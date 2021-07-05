@extends('templateContent')

@section('content')

  @if (Session::get('success') || Session::get('errors') || !is_null($message))
    @include('partials.alert')
  @endif

  @include('partials.quickaction')
  
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Data {{ substr(ucfirst(Request::segment(1)), 0,-1) }}</h4>
            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0 text-decoration-none disabled">  
              Total Data : {{ $numRecords }}
            </a>
          </div>
          <div class="col-12">
            <form class="form-sample" action="{{route('kaders.index')}}" method="GET">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-append">
                    <select name="field" class="form-control text-dark" required>
                      <option value="nama">Nama</option>
                      <option value="alamat">Alamat</option>
                    </select>
                  </div>
                  <input 
                    name="keyword"
                    type="text" 
                    class="form-control" 
                    placeholder="Cari Berdasarkan Nama atau Alamat" 
                    aria-label="Cari Berdasarkan Nama atau Alamat" 
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
                  <th class="font-weight-bold">#</th>
                  <th class="font-weight-bold">Nama</th>
                  <th class="font-weight-bold">Alamat</th>
                  <th class="font-weight-bold">Jenis Kelamin</th>
                  <th class="font-weight-bold">Status</th>
                  <th class="font-weight-bold">Opsi</th>
                </tr>
              </thead>
              <tbody>
              @php
                $currentPage = Request::__get('page');
                (is_null($currentPage)) ? $i = 1 : $i = (($currentPage-1)*5)+1;
              @endphp
              @foreach ($kaders as $kader)
              <tr>
                  <th class="font-weight-bold">
                    {{ $i }}</th>
                  <td>{{ $kader->nama }}</td>
                  <td>{{ $kader->alamat }}</td>
                  <td>{{ $kader->jenis_kelamin }}</td>
                  <td>{{ ($kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi</td>
                  <td class="text-center">
                      <form action="{{ route('kaders.destroy',$kader->id) }}" method="POST">
                          <a 
                            class="btn btn-info btn-sm" 
                            href="{{ route('kaders.show',$kader->id) }}">Show</a>
                          <a 
                            class="btn btn-primary btn-sm" 
                            href="{{ route('kaders.edit',$kader->id) }}">Edit</a>
      
                          @csrf
                          @method('DELETE')
                          <button 
                            type="submit" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            Delete
                          </button>
                      </form>
                  </td>
              </tr>
              @php 
                $i++;
              @endphp
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex mt-4 flex-wrap">
            <nav class="ml-auto">
            {!! ($numRecords > 0) ? $kaders->links() : '' !!}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
      