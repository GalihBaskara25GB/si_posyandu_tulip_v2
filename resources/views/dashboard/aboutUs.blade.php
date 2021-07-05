@extends('templateContent')

@section('content')

@php
  $kader = Auth::user()->kader;
@endphp
<div class="row">
  
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body performane-indicator-card">
        <div class="d-sm-flex">
          <h4 class="card-title flex-shrink-1">Tentang Posyandu Tulip</h4>
        </div>
        <p class="text-justify">
        &emsp;  Posyandu Tulip Desa Kemantrenrejo telah berdiri sejak 1984 untuk melayani masyarakat desa kemantrenrejo.
          Sebagai bentuk upaya membantu pemerintah dalam mewujudkan kesehatan masyarakat yang merata, kami telah 
          memberikan pelayanan dari dan untuk masyarakat Desa Kemantrenrejo.
        </p>
        <p class="text-justify">
        &emsp;  Terdapat agenda bulanan untuk kegiatan Posyandu Balita dan Posyandu Lansia, dimana masing-masing kegiatan
          masyarakat dapat melakukan konsultasi terhadap kondisi kesehatan mereka.
        </p>
        <p class="text-justify">
        &emsp;Untuk membantu lancarnya kegiatan ini, kami merekrut kader Posyandu yang akan bertugas memberikan pelayanan 
        kepada masyarakat. Jika anda tertarik untuk menjadi kader Posyandu anda bisa mendaftar secara online atau
        mendatangi kantor Posyandu Tulip Desa Kemantrenrejo untuk mengetahui instruksi lebih lanjut
        </p>
        <table class="table table-no-border">
          <tr>
          <td colspan="2"><h4><center>Posyandu Tulip</center></h4></td>
          </tr>
          <tr>
          <td>Alamat</td>
          <td>Desa Kemantrenrejo, Kecamatan Rejoso, Kabupaten Pasuruan, 67181</td>
          </tr>
          <tr>
          <td>Jam Operasional</td>
          <td>Senin s/d Sabtu, 08.00 WIB - 14.00 WIB</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection