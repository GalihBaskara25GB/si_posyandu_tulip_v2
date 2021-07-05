  <!-- Quick Action Toolbar Starts-->
  <div class="row quick-action-toolbar">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-header d-block d-md-flex">
          <h5 class="mb-0">Quick Actions</h5>
        </div>
        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
          <div class="col-sm-12 col-md-4 p-3 text-center btn-wrapper">
            <a href="{{ route(Request::segment(1).'.ahp') }}" class="btn px-0">
              <i class="icon-calculator mr-2"></i> Proses Data
            </a>
          </div>
          <div class="col-sm-12 col-md-4 p-3 text-center btn-wrapper">
            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn px-0"> 
              <i class="icon-graph mr-2"></i> Detail Perhitungan
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