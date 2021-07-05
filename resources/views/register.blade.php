@include('templateHeader')

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-6 mx-auto">
              <div class="auth-form-dark text-left p-5">
                <div class="brand-logo text-center">
                  <img src="{{asset('assets/images/logo.png')}}">
                </div>
                <h4>Belum daftar?</h4>
                <h6 class="font-weight-light">Daftar itu mudah. Hanya beberapa langkah dan akun anda akan aktif.</h6>
                <form class="pt-3" action="{{ route('register') }}" method="post">
                    @csrf
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something went wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                      <label for=""><strong>Nama Lengkap</strong></label>
                      <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Alamat</strong></label>
                      <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Tempat Lahir</strong></label>
                      <input type="text" name="tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Tanggal Lahir</strong></label>
                      <input type="date" name="tanggal_lahir" class="form-control form-control-lg" placeholder="Tanggal Lahir">
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Jenis Kelamin</strong></label>
                      <select name="jenis_kelamin" class="form-control form-control-lg" required>
                        <option value="Laki-Laki" class="bg-dark">Laki-Laki</option>
                        <option value="Perempuan" class="bg-dark">Perempuan</option>
                    </select>    
                  </div>
                  <div class="form-group">
                      <label for=""><strong>Nomor Telepon</strong></label>
                      <input type="text" name="nomor_telepon" class="form-control form-control-lg" placeholder="Nomor Telepon">
                  </div>
                      <input type="hidden" name="is_verified" value="0">
                  <div class="form-group">
                        <label for=""><strong>Username</strong></label>
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"  autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Password">
                    </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-light">
                        <input type="checkbox" class="form-check-input" required> Data yang saya inputkan telah benar dan saya siap mempertanggungjawabkannya </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button 
                        type="submit" 
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        Daftar
                    </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a> sekarang!
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@include('templateFooter')
