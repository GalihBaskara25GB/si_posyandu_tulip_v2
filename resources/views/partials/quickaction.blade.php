  <!-- Quick Action Toolbar Starts-->
  <div class="row quick-action-toolbar">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-header d-block d-md-flex">
          <h5 class="mb-0">Quick Actions</h5>
        </div>
        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
          <div class="col-sm-12 col-md-4 p-3 text-center btn-wrapper">
            <a href="{{ route(Request::segment(1).'.index') }}" class="btn px-0">
              <i class="icon-people mr-2"></i> Data {{ ucfirst(substr(Request::segment(1),0,-1)) }}
            </a>
          </div>
          <div class="col-sm-12 col-md-4 p-3 text-center btn-wrapper">
            <a href="{{ route(Request::segment(1).'.create') }}" class="btn px-0"> 
              <i class="icon-user mr-2"></i> Tambah {{ ucfirst(substr(Request::segment(1),0,-1)) }}
            </a>
          </div>
          <div class="col-sm-12 col-md-4 p-3 text-center btn-wrapper">
            <a href="{{ Request::segment(1).'/print_pdf' }}" target="_blank" class="btn px-0">
              <i class="icon-doc mr-2"></i> Laporan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Quick Action Toolbar Ends-->