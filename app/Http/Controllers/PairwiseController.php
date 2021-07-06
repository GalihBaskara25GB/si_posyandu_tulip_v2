<?php

namespace App\Http\Controllers;

use App\Models\ObjekKriteria;
use App\Models\Pairwise;

use Illuminate\Http\Request;

class PairwiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pairwiseMatrix = Pairwise::getPairwiseMatrixes();
        $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->get();
        $pairwises = Pairwise::all();
        $message = null;
        return view('pairwises.index',compact('pairwises', 'objekKriterias', 'message', 'pairwiseMatrix'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pairwise::truncate();

        foreach ($request->pairwise as $key => $values) {
            foreach ($values as $key2 => $val) {
                $newPairwise = new Pairwise;
                $newPairwise->from_kriteria = $key;
                $newPairwise->to_kriteria = $key2;
                $newPairwise->bobot = $val;
                $newPairwise->save();
            }
        }

        return redirect()->route('kriterias.pairwise')
            ->with('success','Pairwise created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
