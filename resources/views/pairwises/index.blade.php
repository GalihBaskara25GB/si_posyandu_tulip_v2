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
          </div>
          
          <form class="form-sample" action="{{ route('pairwises.store') }}" method="POST">
          <div class="table-responsive border rounded p-1">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="font-weight-bold">#</th>
                  @foreach ($objekKriterias as $objekKriteria)
                    <th class="font-weight-bold">{{ $objekKriteria->name }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
              @csrf
              @foreach ($objekKriterias as $objekKriteria)
              <tr>
                  <td>{{ $objekKriteria->name }}</td>
                  @php $readonly = 'readonly'; @endphp
                  @foreach ($objekKriterias as $objekKriteria2)
                    @php
                      if($objekKriteria->id == $objekKriteria2->id) $readonly = '';
                    @endphp
                    <td class="px-1">
                      <input type="number" min="0" max="9" step="any" class="form-control" 
                        name="pairwise[{{ $objekKriteria->id }}][{{ $objekKriteria2->id }}]"
                        id="pairwise[{{ $objekKriteria->id }}][{{ $objekKriteria2->id }}]"
                        onChange="getElementWeight('{{$objekKriteria->id}}', '{{$objekKriteria2->id }}');" 
                        {{ ($objekKriteria->id == $objekKriteria2->id) ? 'value=1 readonly' : '' }}
                        {{ isset($pairwiseMatrix[$objekKriteria->id][$objekKriteria2->id]) ? 
                            'value='.$pairwiseMatrix[$objekKriteria->id][$objekKriteria2->id].'' : ''}}
                        {{ $readonly }} required>
                    </td>
                  @endforeach
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-6 ml-auto text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-outline-danger">Reset</button>
            </div>
          </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>

  <script>
    function getElementWeight(row, col) {
      let currentElement = document.getElementById('pairwise['+row+']['+col+']');
      let targetElement = document.getElementById('pairwise['+col+']['+row+']');
      let divisedValue = 1 / currentElement.value;
      if(divisedValue >= 1) divisedValue = Math.round(divisedValue);
      targetElement.value = divisedValue;
    }
  </script>
@endsection
      