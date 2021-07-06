<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NumPHP\Core\NumArray;
use App\Models\Rangking;
use App\Models\Kriteria;
use App\Models\Pairwise;
use App\Models\Kader;
use App\Models\ObjekKriteria;

use PDF;

class RangkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $dataPerPage = 10;

        $rangkings = Rangking::orderBy('nilai_preferensi', 'desc')->paginate($dataPerPage);
        $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->get();

        $numRecords = Rangking::count();
        $message = null;

        $ahp = $this->ahp();
        $topsis = $this->topsis();

        if(isset($request->field) && isset($request->keyword)) {
            $field = $request->field;
            $keyword = $request->keyword;

            if($field == 'nama') {
                $rangkings = Rangking::whereHas('kader', function($query) use($field, $keyword) {
                    $query->where($field, 'LIKE', '%'.$keyword.'%');
                 });
            
            } else {
                $rangkings = Rangking::where($field, 'LIKE', '%'.$keyword.'%');
            }
                    
            $numRecords = $rangkings->get()->count();
            $message = $numRecords." data ditemukan dengan kata kunci \"$keyword\"";
            if($numRecords > 0) $rangkings = $rangkings->paginate($dataPerPage);        
        }  
         
        return view('rangking.index',compact('rangkings', 'numRecords', 'message', 'ahp', 'topsis', 'objekKriterias'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
        //
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

    public function generatePdf() {
        $rangkings = Rangking::orderBy('nilai_preferensi', 'desc')->get();
        $pdf = PDF::loadview('laporan.rangking', ['rangkings' => $rangkings]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-rangking');
    } 

    public function ahp()
    {
        //Matriks Perbandingan Berpasangan
        $resultView = '';

        $pairwiseMatrix = Pairwise::getPairwiseMatrixes();
        $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->get();
        $numObjekKriteria = count($objekKriterias);

        $i=0;
        foreach ($objekKriterias as $objekKriteria){
            $matrix3[$objekKriteria->id] = new \stdClass();
            $sum[$objekKriteria->id] = 0;
            $eigen[$objekKriteria->id] = 1;
            $sintesa[$objekKriteria->id] = 0;
            $eigenMax[$objekKriteria->id] = 0;
            $kriteriaName[$objekKriteria->id] = $objekKriteria->name;

            foreach ($objekKriterias as $key => $objekKriteria2){
                if(isset($pairwiseMatrix[$objekKriteria->id][$objekKriteria2->id])) { 
                    $matrix3[$objekKriteria->id]->{$objekKriteria2->id} = $pairwiseMatrix[$objekKriteria->id][$objekKriteria2->id];
                }                    
            }
            $matrix3[$objekKriteria->id]->avg = 0;
            $matrix3[$objekKriteria->id]->matrix_aw = 0;
            $i++;
        }
        
        //total tiap kriteria
        foreach ($matrix3 as $key => $value){
            foreach ($value as $key2 => $value2) {
                if(isset($sum[$key2])) $sum[$key2] += $value2;
                if($key2!='avg' && $key2!='matrix_aw') $eigen[$key] *= $value2;
            }
        }

        $sumEigen = 0;
        foreach ($eigen as $key => $value) {
            $eigen[$key] = pow($value, (1/$numObjekKriteria));
            $sumEigen += $eigen[$key];
        }

        $sumBobotPrioritas = 0;
        foreach ($objekKriterias as $objekKriteria) {
            $bobotPrioritas[$objekKriteria->id] = $eigen[$objekKriteria->id] / $sumEigen;
            $sumBobotPrioritas += $bobotPrioritas[$objekKriteria->id];
        }

        foreach ($matrix3 as $key => $value){
            foreach ($value as $key2 => $value2) {
                if($key2!='avg' && $key2!='matrix_aw') $sintesa[$key] += ($value2 / $sum[$key2]);
            }
        }

        $sumEigenMax = 0;
        foreach ($sintesa as $key => $value){
            $eigenMax[$key] = $sintesa[$key] / $bobotPrioritas[$key];
            $sumEigenMax += $eigenMax[$key]; 
        }

        $lambdaMax = $sumEigenMax / $numObjekKriteria;
        $newCI = ($lambdaMax - $numObjekKriteria) / $numObjekKriteria ;
        $indexRatio = 1.32;
        $newCR = $newCI / $indexRatio;

        foreach ($sintesa as $key => $value) {
            $matrix3[$key]->avg = $value;
        }

        $resultView .= '<h3>AHP</h3><h4>Matrix Perbandingan Berpasangan</h4>';
        $resultView .= '<table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr><th><center></center></th>";

        foreach ($objekKriterias as $objekKriteria) {
            $resultView .= "<th><center>$objekKriteria->name</center></th>";
        }

        $resultView .= "<th><center>Eigen Value</center></th>
                            <th><center>Bobot Prioritas</center></th>
                            <th><center>Bobot Sintesa</center></th>
                            <th><center>Eigen Max</center></th>
                        </tr></thead><tbody>";
        $i=0;
        foreach ($matrix3 as $key => $value) {
            $resultView .= "<tr>";
            $resultView .= "<td><center>".$kriteriaName[$key]."</center></td>";
            foreach ($value as $key2 => $value2) {
                if($key2!='avg' && $key2!='matrix_aw') $resultView .= "<td><center>$value2</center></td>";
            }
            $resultView .="
                <td><center>".$eigen[$key]."</center></td>
                <td><center>".$bobotPrioritas[$key]."</center></td>
                <td><center>".$sintesa[$key]."</center></td>
                <td><center>".$eigenMax[$key]."</center></td>
            </tr>";
            $i++;
        }
        $resultView .= "
            <tr>
                <td colspan='8'><center>Total</center></td>
                <td>$sumEigen</td>
                <td>$sumBobotPrioritas</td>
                <td></td>
                <td>$sumEigenMax</td>
            </tr>
        ";
        $resultView .= '</tbody></table>';

        $resultView .= '<h4>Uji Konsistensi</h4>';
        $resultView .= '<table class="table table-responsive table-striped mb-3">';
        $resultView .= "<tbody>
                    <tr>
                    <th>Lambda</th>
                    <td>$lambdaMax</td>
                    </tr>
                    <tr>
                    <th>CI</th>
                    <td>$newCI</td>
                    </tr>
                    <tr>
                    <th>CR</th>
                    <td>$newCR</td>
                    </tr>
                    <tr>
                    <th>Status</th>
                    <td>".(($newCR < 0.1) ? 'KONSISTEN' : 'TIDAK KONSISTEN')."</td>
                    </tr>
                </tbody></table>";

        $res = (object) array(
            'status' => ($newCR < 0.1) ? 'KONSISTEN' : 'TIDAK KONSISTEN',
            'lambda' => $lambdaMax,
            'ci'     => $newCI,
            'cr'     => $newCR,
            'matrix' => $matrix3,
            'resultView' => $resultView
        );
        return $res;
    }

    public function topsis()
    {
        $dataAHP = $this->ahp();
        $kriteria = $dataAHP->matrix;
        $resultView = $dataAHP->resultView;
        $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->get();
        $numObjekKriteria = count($objekKriterias);

        $matrix = Kriteria::all();
        $rowByKaderId = Kriteria::getRowByKaderId();
        $convertedRow = $rowByKaderId;
        foreach ($rowByKaderId as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $convertedRow[$key][$key2] = $this->convertToScalar(
                    ObjekKriteria::where('id','=',$key2)->first()->type, 
                    $value2,
                    (ObjekKriteria::where('id','=',$key2)->first()->name=='Penyakit Berat') ? true : false
                ); 
            }
        }

        $resultView .= '<hr><h3>Proses TOPSIS</h3><h4>Nilai Kriteria Tiap Alternatif</h4>';
        $resultView .= '<table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr><th><center>Nama</center></th>";
        foreach ($objekKriterias as $objekKriteria) {
            $pembagi[$objekKriteria->id] = 0;
            $resultView .= "<th><center>$objekKriteria->name</center></th>";
        }
        $resultView .= "</tr></thead><tbody>";
        foreach ($convertedRow as $key => $value) {
            $resultView .= "<tr><td>".Kader::where('id','=',$key)->first()->nama."</td>";
            foreach ($objekKriterias as $objekKriteria) {
                foreach ($value as $key2 => $value2) {
                    if($key2==$objekKriteria->id) $resultView .= "<td>".$value2."</td>";
                    $pembagi[$key2] += pow($value2,2);
                }
            }
            $resultView .= "</tr>";
        }
        $resultView .= '</tbody></table>';

        foreach ($pembagi as $key => $value) $pembagi[$key] = sqrt($pembagi[$key]);

        $resultView .= "<h4>Mencari Pembagi</h4>";
        $resultView .= '<table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr>";
        foreach ($objekKriterias as $objekKriteria) {
            $resultView .= "<th><center>$objekKriteria->name</center></th>";
        }
        $resultView .= "</tr></thead><tbody>";
        $resultView .= "<tr>";
        foreach ($objekKriterias as $objekKriteria) {
            $resultView .= "<td><center>".$pembagi[$objekKriteria->id]."</center></td>";
        }
        $resultView .= "</tr>";
        $resultView .= '</tbody></table>';

        //menghitung matrix ternormalisasi dan bobot ternormalisasi        
        $matrixNormalisasi = array();
        $bobotNormalisasi = array();

        $i = 0;
        foreach ($convertedRow as $key => $value) {
            $matrixNormalisasi[$i] = new \stdClass();
            $bobotNormalisasi[$i] = new \stdClass();

            $matrixNormalisasi[$i]->kader_id = $key;
            $bobotNormalisasi[$i]->kader_id = $key;
            foreach ($value as $key2 => $value2) {
                $matrixNormalisasi[$i]->$key2 = $value2 / $pembagi[$key2];
                $bobotNormalisasi[$i]->$key2 = $matrixNormalisasi[$i]->$key2 * $kriteria[$key2]->avg;
            } 
            $i++;
        }

        $resultView .= '<h4>Bobot Hasil Perhitungan AHP</h4><table class="table table-responsive table-striped mb-3">';
        foreach ($objekKriterias as $objekKriteria) {
            $resultView .= "<tr>
                    <td>$objekKriteria->name</td>
                    <td><center>".$kriteria[$objekKriteria->id]->avg."</center></td></tr>
                </tr>";
        }
        $resultView .= '</tbody></table>';
        
        $resultView .= '<h4>Matrix Normalisasi</h4><table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr>
                    <th><center>Nama</center></th>";
        foreach ($objekKriterias as $objekKriteria) $resultView .= "<th><center>$objekKriteria->name</center></th>";
        $resultView .= "</tr></thead><tbody>";

        foreach ($matrixNormalisasi as $key) {
            $resultView .= "<tr>
                <td>".Kader::where('id', '=', $key->kader_id)->first()->nama."</td>";
                foreach ($objekKriterias as $objekKriteria) {
                    $resultView .= "<td><center>".$key->{$objekKriteria->id}."</center></td>";
                }
            $resultView .= "</tr>";
        }
        $resultView .= '</tbody></table>';
        
        $resultView .= '<h4>Bobot Normalisasi</h4><table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr>
                    <th><center>Nama</center></th>";
                    foreach ($objekKriterias as $objekKriteria) $resultView .= "<th><center>$objekKriteria->name</center></th>";
        $resultView .= "</tr></thead><tbody>";
        foreach ($bobotNormalisasi as $key) {
            $resultView .= "<tr>
            <td>".Kader::where('id', '=', $key->kader_id)->first()->nama."</td>";
            foreach ($objekKriterias as $objekKriteria) {
                $resultView .= "<td><center>".$key->{$objekKriteria->id}."</center></td>";
            }
            $resultView .= "</tr>";
        }
        $resultView .= '</tbody></table>';


        //menghitung solusi ideal positif dan solusi ideal negatif
        $data = $bobotNormalisasi;
        $matrixIdeal = array();
        
        foreach ($objekKriterias as $objekKriteria) {
            $matrixIdeal['positif'][$objekKriteria->id] = max(array_column($bobotNormalisasi, $objekKriteria->id)); 
            $matrixIdeal['negatif'][$objekKriteria->id] = min(array_column($bobotNormalisasi, $objekKriteria->id)); 
        }

        $resultView .= '<h4>A+ dan A-</h4><table class="table table-responsive table-striped mb-3">';
        $resultView .= "<thead><tr>
                    <th></th>";
                    foreach ($objekKriterias as $objekKriteria) $resultView .= "<th><center>$objekKriteria->name</center></th>";
        $resultView .= "</tr></thead><tbody><tr>
            <td><center>A+</center></td>";
            foreach ($objekKriterias as $objekKriteria) {
                $resultView .= "<td><center>".$matrixIdeal['positif'][$objekKriteria->id]."</center></td>";
            }
        $resultView .= "<tr>
            <td><center>A-</center></td>";
            foreach ($objekKriterias as $objekKriteria) {
                $resultView .= "<td><center>".$matrixIdeal['negatif'][$objekKriteria->id]."</center></td>";
            }
        $resultView .= '</tbody></table>';

        //perhitungan solusi ideal
        $solusiIdeal = array();

        $i=0;
        foreach ($bobotNormalisasi as $key) {
            $solusiIdeal[$i]['kader_id'] = $key->kader_id;
            foreach ($objekKriterias as $objekKriteria) {
                if(!isset($solusiIdeal[$i]['positif'])) 
                    $solusiIdeal[$i]['positif'] = 0;
                    
                if(!isset($solusiIdeal[$i]['negatif'])) 
                    $solusiIdeal[$i]['negatif'] = 0;
                
                $solusiIdeal[$i]['positif'] += 
                    pow(($matrixIdeal['positif'][$objekKriteria->id] - $key->{$objekKriteria->id}), 2); 
                
                $solusiIdeal[$i]['negatif'] += 
                    pow(($key->{$objekKriteria->id} - $matrixIdeal['negatif'][$objekKriteria->id]), 2);
            }
            $solusiIdeal[$i]['positif'] = sqrt($solusiIdeal[$i]['positif']);
            $solusiIdeal[$i]['negatif'] = sqrt($solusiIdeal[$i]['negatif']);
            $i++;
        }

        $resultView .= '<table class="table table-responsive table-striped mb-3">
                <tbody><tr><th>Nama</th><th>D+</th><th>D-</th><th>Nilai Preferensi</th></tr></thead><tbody>';
        $i=0;
        foreach ($solusiIdeal as $key) {
                $resultView .= "<tr>
                    <td>".Kader::where('id', '=', $key['kader_id'])->first()->nama."</td>
                    <td><center>".$key['positif']."</center></td>
                    <td><center>".$key['negatif']."</center></td>
                    <td><center>".($key['negatif'] / ($key['negatif'] + $key['positif']))."</center></td>
                </tr>";
                $i++;
        }
        $resultView .= '</thead></table>';

        Rangking::truncate();
        for ($i = 0; $i < count($solusiIdeal); $i++) {
            $pref = new Rangking;
            $pref->kader_id = $solusiIdeal[$i]['kader_id'];
            $pref->nilai_preferensi = $solusiIdeal[$i]['negatif'] / ($solusiIdeal[$i]['negatif'] + $solusiIdeal[$i]['positif']);
            $pref->save();
        }

        $res = (object) array(
            'resultView' => $resultView
        );
        return $res;
    }

    private function convertToScalar($key, $value, $invert)
    {
        $convertedValue = null;
        switch (strtolower($key)) {
            case 'strata-1_d3_sma_smp_sd':
                $value = strtolower($value);
                if($value=='strata-1') $convertedValue = 5;
                elseif($value=='d3') $convertedValue = 4;
                elseif($value=='sma') $convertedValue = 3;
                elseif($value=='smp') $convertedValue = 2;
                else $convertedValue = 1;
                break;
            
            case 'ya_tidak':
                (strtolower($value)=='ya') ? $convertedValue = 5 : $convertedValue = 1; 
                break;

            case 'baik_cukup_kurang':
                $value = strtolower($value);
                if($value=='baik') $convertedValue = 5;
                elseif($value=='cukup') $convertedValue = 3;
                else $convertedValue = 1;
                break;
                
            default:
            
                break;
        }
        
        $invertedValues = array(5,4,3,2,1);
        $convertedValue = ($invert) ? $invertedValues[$convertedValue-1] : $convertedValue;
        
        return $convertedValue;
    }
}
