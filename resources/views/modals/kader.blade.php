<div class="modal fade" tabindex="-1" role="dialog" id="kaderModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Data Kader</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="table-responsive border rounded p-1">
            <table class="table" id="modal-tabel">
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
              @php $i=1 @endphp
              @foreach ($kaders as $kader)
              <tr>
                  <th class="font-weight-bold">
                    {{ $i++ }}</th>
                  <td>{{ $kader->nama }}</td>
                  <td>{{ $kader->alamat }}</td>
                  <td>{{ $kader->jenis_kelamin }}</td>
                  <td>{{ ($kader->is_verified) ? 'Sudah' : 'Belum' }} Diverifikasi</td>
                  <td class="text-center">
                    <button 
                      type="button" 
                      class="btn btn-success btn-sm" 
                      data-toggle="tooltip" 
                      data-placement="top" 
                      title="Pilih Data Ini" 
                      onClick="formData.kader_id.value = '{{ $kader->id }}'; formData.kader_nama.value = '{{ $kader->nama }}';" 
                      data-dismiss="modal">
                      Pilih
                    </button>
                  </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>