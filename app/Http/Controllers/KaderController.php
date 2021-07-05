<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kader;
use App\Http\Requests\KaderRequest;

use App\Imports\KaderImport;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kaders = Kader::paginate(5);
        $numRecords = Kader::count();
        $message = null;

        if(isset($request->field) && isset($request->keyword)) {
            $kaders = Kader::where($request->field, 'LIKE', '%'.$request->keyword.'%');
            $numRecords = $kaders->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$request->keyword\"";
            if($numRecords > 0) $kaders = $kaders->paginate(5);        
        }  
         
        return view('kaders.index',compact('kaders', 'numRecords', 'message'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('kaders.create');
    }
  
    public function store(KaderRequest $request)
    {   
        Kader::create($request->all());
         
        return redirect()->route('kaders.index')
                        ->with('success','Kader created successfully.');
    }
  
    public function show(Kader $kader)
    {
        return view('kaders.show',compact('kader'));
    }
  
    public function edit(Kader $kader)
    {
        return view('kaders.edit',compact('kader'));
    }
  
    public function update(KaderRequest $request, Kader $kader)
    {
        $kader->update($request->all());
         
        return redirect()->route('kaders.index')
                        ->with('success','Kader updated successfully');
    }
   
    public function destroy(Kader $kader)
    {
        $kader->delete();
  
        return redirect()->route('kaders.index')
                        ->with('success','Kader deleted successfully');
    }

    public function generatePdf() {
        $kaders = Kader::all();
        $pdf = PDF::loadview('laporan.kader', ['kaders' => $kaders]);
        return $pdf->download('laporan-kader');
    } 

    public function import() 
    {
        Excel::import(new KaderImport, request()->file('file'));
             
        return back();
    }
}
