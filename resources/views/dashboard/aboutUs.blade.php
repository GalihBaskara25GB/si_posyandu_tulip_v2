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
        <hr>
        <h4><center>Posyandu Tulip</center></h4>
        <div class="table-responsive">
        <table class="table table-no-border">
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

  <div class="col-md-12 grid-margin stretch-card mt-3">
    <div class="card">
      <div class="card-body performane-indicator-card">
        <div class="d-sm-flex">
          <h4 class="card-title flex-shrink-1">Kontak Pengembang</h4>
        </div>

        <div class="table-responsive">
        <table class="table table-no-border">
          <tr>
          <td>Nama</td>
          <td>Galih Aditya Baskara</td>
          </tr>
          <tr>
          <td>Email</td>
          <td>galihbaskara25.gb@gmail.com</td>
          </tr>
          <tr>
          <td>Whatsapp</td>
          <td><a href="https://api.whatsapp.com/send?phone=+6282257934698">+6282257934698</a></td>
          </tr>
          <td>Instagram</td>
          <td><a href="https://www.instagram.com/baskara.galih/">@baskara.galih</a></td>
          </tr>
          </tr>
          <td>Bahasa Dikuasai</td>
          <td>NodeJs, PHP, Python, Javascript, Java</td>
          </tr>
          </tr>
          <td>Framework Dikuasai</td>
          <td>Express Js, React Js, Vue Js, Django, Laravel, Codeigniter, Bootstrap, Jquery</td>
          </tr>
          <td>Database Dikuasai</td>
          <td>MongoDB, MySQL, SQLite, SQL Server</td>
          </tr>
        </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection