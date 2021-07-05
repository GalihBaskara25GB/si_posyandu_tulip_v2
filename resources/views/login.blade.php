@include('templateHeader')

<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-dark text-left p-5">
                <div class="brand-logo text-center">
                  <img src="{{asset('assets/images/logo.png')}}">
                </div>
                <h4>Selamat Datang di Aplikasi Seleksi Calon Kader Posyandu Tulip</h4>
                <h6 class="font-weight-light">Sign in untuk melanjutkan.</h6>
                <form class="pt-3" action="{{ route('login') }}" method="post">
                @csrf
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
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
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button 
                        type="submit" 
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        SIGN IN
                    </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> 
                      Belum punya akun? 
                      <a href="{{ route('register') }}" class="text-primary">Register</a> sekarang!
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