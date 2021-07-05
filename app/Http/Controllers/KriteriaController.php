<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Kader;
use App\Models\ObjekKriteria;
use App\Http\Requests\KriteriaRequest;

use PDF;
use Hash;
use DB;


class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataPerPage = 5;
        
        $objekKriterias = ObjekKriteria::orderBy('created_at')->get();
        $kriterias = Kriteria::select('kader_id')->groupBy('kader_id')->paginate($dataPerPage);
        $rowByKaderId = Kriteria::getRowByKaderId();

        $numRecords = Kriteria::count();
        $message = null;

        if(isset($request->field) && isset($request->keyword)) {
            $field = $request->field;
            $keyword = $request->keyword;

            if($field == 'nama') {
                $kriterias = Kriteria::select('kader_id')->whereHas('kader', function($query) use($field, $keyword) {
                    $query->where($field, 'LIKE', '%'.$keyword.'%');
                 })->groupBy('kader_id');
            
            } else {
                $kriterias = Kriteria::select('kader_id')
                                        ->where([
                                            ['objek_kriteria_id', '=', $field],
                                            ['nilai', 'LIKE', '%'.$keyword.'%']
                                        ])
                                        ->groupBy('kader_id');
            }
            
            $numRecords = $kriterias->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$keyword\"";
            if($numRecords > 0) $kriterias = $kriterias->paginate($dataPerPage);        
        }  
         
        return view('kriterias.index',compact('kriterias', 'numRecords', 'objekKriterias', 'rowByKaderId', 'message'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        $kaders = Kader::doesnthave('kriteria')->get();
        $objekKriterias = ObjekKriteria::orderBy('created_at')->get();
        return view('kriterias.create', compact('kaders', 'objekKriterias'));
    }
  
    public function store(Request $request)
    {   
        foreach ($request->objek_kriteria_id as $key => $values) {
            $newKriteria = new Kriteria;
            $newKriteria->objek_kriteria_id = $key;
            $newKriteria->kader_id = $request->kader_id;
            $newKriteria->nilai = $values;
            $newKriteria->save();
        }
        
        return redirect()->route('kriterias.index')
                        ->with('success','Kriteria created successfully.');
    }
  
    public function show($kader_id)
    {
        $kriteria = Kriteria::where('kader_id', '=', $kader_id)->first();
        $objekKriterias = ObjekKriteria::orderBy('created_at')->get();
        $rowByKaderId = Kriteria::getRowByKaderId($kader_id);
        
        return view('kriterias.show',compact('kriteria', 'objekKriterias', 'rowByKaderId'));
    }
  
    public function edit($kader_id)
    {
        $kaders = Kader::doesnthave('kriteria')->get();
        
        $kriteria = Kriteria::where('kader_id', '=', $kader_id)->first();
        $objekKriterias = ObjekKriteria::orderBy('created_at')->get();
        $rowByKaderId = Kriteria::getRowByKaderId($kader_id);

        return view('kriterias.edit',compact('kriteria', 'kaders', 'rowByKaderId', 'objekKriterias'));
    }
  
    public function update(Request $request, $kader_id)
    {

        foreach ($request->objek_kriteria_id as $key => $values) {
            $kriteria = Kriteria::where([['kader_id' , '=', $kader_id], ['objek_kriteria_id', '=', $key]])->first();
            $kriteria->nilai = $values;
            $kriteria->save();
        }
         
        return redirect()->route('kriterias.index')
                        ->with('success','Kriteria updated successfully');
    }
   
    public function destroy($ader_id)
    {
        Kriteria::where('kader_id', '=', $kader_id)->delete();
  
        return redirect()->route('kriterias.index')
                        ->with('success','Kriteria deleted successfully');
    }

    public function generatePdf() {
        $kriterias = Kriteria::select('kader_id')->groupBy('kader_id')->get();
        $rowByKaderId = Kriteria::getRowByKaderId();
        $objekKriterias = ObjekKriteria::orderBy('created_at')->get();

        $pdf = PDF::loadview('laporan.kriteria', [  'kriterias' => $kriterias, 
                                                    'rowByKaderId' => $rowByKaderId,
                                                    'objekKriterias' => $objekKriterias]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-kriteria');
    } 
}
