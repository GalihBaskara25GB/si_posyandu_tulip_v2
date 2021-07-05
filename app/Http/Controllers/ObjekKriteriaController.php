<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjekKriteria;
use App\Http\Requests\ObjekKriteriaRequest;


use PDF;

class ObjekKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->paginate(10);
        $numRecords = ObjekKriteria::count();
        $message = null;

        if(isset($request->field) && isset($request->keyword)) {
            $objekKriterias = ObjekKriteria::where($request->field, 'LIKE', '%'.$request->keyword.'%');
            $numRecords = $objekKriterias->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$request->keyword\"";
            if($numRecords > 0) $objekKriterias = $objekKriterias->paginate(5);        
        }  
         
        return view('objekKriterias.index',compact('objekKriterias', 'numRecords', 'message'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
  
    public function create()
    {
        return view('objekKriterias.create');
    }
  
    public function store(ObjekKriteriaRequest $request)
    {   
        ObjekKriteria::create($request->all());
         
        return redirect()->route('objekKriterias.index')
                        ->with('success','Objek Kriteria created successfully.');
    }
  
    public function show(ObjekKriteria $objekKriteria)
    {
        return view('objekKriterias.show',compact('objekKriteria'));
    }
  
    public function edit(ObjekKriteria $objekKriteria)
    {
        return view('objekKriterias.edit',compact('objekKriteria'));
    }
  
    public function update(ObjekKriteriaRequest $request, ObjekKriteria $objekKriteria)
    {
        $objekKriteria->update($request->all());
         
        return redirect()->route('objekKriterias.index')
                        ->with('success','Objek Kriteria updated successfully');
    }
   
    public function destroy(ObjekKriteria $objekKriteria)
    {
        $objekKriteria->delete();
  
        return redirect()->route('objekKriterias.index')
                        ->with('success','Objek Kriteria deleted successfully');
    }

    public function generatePdf() {
        $objekKriterias = ObjekKriteria::all();
        $pdf = PDF::loadview('laporan.objekKriteria', ['objekKriterias' => $objekKriterias]);
        return $pdf->download('laporan-objekKriteria');
    } 
}
