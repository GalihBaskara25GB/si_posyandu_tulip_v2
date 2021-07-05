<?php

namespace App\Http\Controllers;

use NumPHP\Core\NumArray;
use App\Models\Kriteria;
use App\Models\Rangking;

class PerhitunganController extends Controller
{
    public function ahp()
    {
        // $matrix = Kriteria::all();
        //Matriks Perbandingan Berpasangan
        $matrix = array(
            '0' => (object) array(
                'pendidikan' => 1,
                'penyakit_berat' => 5,
                'pengetahuan_kesehatan' => 0.2,
                'keaktifan_sosial' => 0.1111,
                'keahlian_komputer' => 7,
                'kepribadian' => 0.1429,
                'mempunyai_hp' => 1,
                'avg' => null,
                'matrix_aw' => null
            ),
            '1' => (object) array(
                'pendidikan' => 0.2,
                'penyakit_berat' => 1,
                'pengetahuan_kesehatan' => 5,
                'keaktifan_sosial' => 0.1429,
                'keahlian_komputer' => 5,
                'kepribadian' => 3,
                'mempunyai_hp' => 5,
                'avg' => null,
                'matrix_aw' => null
            ),
            '2' => (object) array(
                'pendidikan' => 5,
                'penyakit_berat' => 0.2,
                'pengetahuan_kesehatan' => 1,
                'keaktifan_sosial' => 0.1429,
                'keahlian_komputer' => 5,
                'kepribadian' => 0.1429,
                'mempunyai_hp' => 5,
                'avg' => null,
                'matrix_aw' => null
            ),
            '3' => (object) array(
                'pendidikan' => 9,
                'penyakit_berat' => 7,
                'pengetahuan_kesehatan' => 7,
                'keaktifan_sosial' => 1,
                'keahlian_komputer' => 7,
                'kepribadian' => 0.2,
                'mempunyai_hp' => 3,
                'avg' => null,
                'matrix_aw' => null
            ),
            '4' => (object) array(
                'pendidikan' => 0.1429,
                'penyakit_berat' => 0.2,
                'pengetahuan_kesehatan' => 0.2,
                'keaktifan_sosial' => 0.1429,
                'keahlian_komputer' => 1,
                'kepribadian' => 0.1429,
                'mempunyai_hp' => 0.1429,
                'avg' => null,
                'matrix_aw' => null
            ),
            '5' => (object) array(
                'pendidikan' => 7,
                'penyakit_berat' => 0.3333,
                'pengetahuan_kesehatan' => 7,
                'keaktifan_sosial' => 5,
                'keahlian_komputer' => 7,
                'kepribadian' => 1,
                'mempunyai_hp' => 7,
                'avg' => null,
                'matrix_aw' => null
            ),
            '6' => (object) array(
                'pendidikan' => 1,
                'penyakit_berat' => 0.2,
                'pengetahuan_kesehatan' => 1,
                'keaktifan_sosial' => 0.3333,
                'keahlian_komputer' => 7,
                'kepribadian' => 0.1429,
                'mempunyai_hp' => 1,
                'avg' => null,
                'matrix_aw' => null
            ),
        );

        $sumPendidikan = 0;
        $sumPenyakitBerat = 0;
        $sumPengetahuanKesehatan = 0;
        $sumKeaktifanSosial = 0;
        $sumKeahlianKomputer = 0;
        $sumKepribadian = 0;
        $sumMempunyaiHp = 0;

        foreach ($matrix as $key) {
            $sumPendidikan += $key->pendidikan;
            $sumPenyakitBerat += $key->penyakit_berat;
            $sumPengetahuanKesehatan += $key->pengetahuan_kesehatan;
            $sumKeaktifanSosial += $key->keaktifan_sosial;
            $sumKeahlianKomputer += $key->keahlian_komputer;
            $sumKepribadian += $key->kepribadian;
            $sumMempunyaiHp += $key->mempunyai_hp;
        }

        $kriteria = ['Pendidikan', 'Penyakit Berat', 'Pengetahuan Kesehatan', 'Keaktifan Sosial', 'Keahlian Komputer', 'Kepribadian', 'Mempunyai HP'];
        $tempBobot = $matrix;
        for ($i = 0; $i < 7; $i++) {
            // $tempBobot[$i]->kriteria = $kriteria[$i];
            $tempBobot[$i]->pendidikan = (($matrix[$i]->pendidikan / $sumPendidikan));
            $tempBobot[$i]->penyakit_berat = (($matrix[$i]->penyakit_berat / $sumPenyakitBerat));
            $tempBobot[$i]->pengetahuan_kesehatan = (($matrix[$i]->pengetahuan_kesehatan / $sumPengetahuanKesehatan));
            $tempBobot[$i]->keaktifan_sosial = (($matrix[$i]->keaktifan_sosial / $sumKeaktifanSosial));
            $tempBobot[$i]->keahlian_komputer = (($matrix[$i]->keahlian_komputer / $sumKeahlianKomputer));
            $tempBobot[$i]->kepribadian = (($matrix[$i]->kepribadian / $sumKepribadian));
            $tempBobot[$i]->mempunyai_hp = (($matrix[$i]->mempunyai_hp / $sumMempunyaiHp));
        }

        $mKriteria = $tempBobot;
        foreach ($mKriteria as $key) {
            $sum = $key->pendidikan + $key->penyakit_berat + $key->pengetahuan_kesehatan + $key->keaktifan_sosial + $key->keahlian_komputer + $key->kepribadian + $key->mempunyai_hp;
            $avg = $sum / 7;
            $key->avg = ($avg);
            // $key->update();
        }


        //Hitung Konsistensi Bobot
        
        $tempA = $matrix;
        $tempW = $mKriteria;
        $matrixA = [[]];

        $i = 0;
        foreach ($tempA as $key) {
            $matrixA[$i][0] = $key->pendidikan;
            $matrixA[$i][1] = $key->penyakit_berat;
            $matrixA[$i][2] = $key->pengetahuan_kesehatan;
            $matrixA[$i][3] = $key->keaktifan_sosial;
            $matrixA[$i][4] = $key->keahlian_komputer;
            $matrixA[$i][5] = $key->kepribadian;
            $matrixA[$i][6] = $key->mempunyai_hp;
            $i++;
        }

        $matrixW = [[]];
        $i = 0;
        foreach ($tempW as $key) {
            $matrixW[$i][0] = $key->avg;
            $i++;
        }

        $matA = new NumArray($matrixA);
        $matW = new NumArray($matrixW);
        $matA->dot($matW);

        $final = $matA->getData();

        for ($i = 0; $i < 7; $i++) {
            $tempW[$i]->matrix_aw = $final[$i][0];
            // $tempW[$i]->save();
        }

        $lambda = 0;
        foreach ($tempW as $key) {
            $lambda += ($key->matrix_aw / $key->avg);
        }
        // $lambda /= 7;

        $ci = (($lambda - 7) / (7 - 1));
        $cr = ($ci / 1.32);

        ($cr <= 0.1) ? $status = 'KONSISTEN' : $status = 'TIDAK KONSISTEN';;
        
        $res = (object) array(
            'status' => $status,
            'lambda' => $lambda,
            'ci'     => $ci,
            'cr'     => $cr,
            'matrix' => $tempW,
        );
        return $res;
    }

    public function topsis()
    {
        $dataAHP = $this->ahp();
        $kriteria = $dataAHP->matrix;
        $bobot = [];

        for ($i=0; $i < 7; $i++) { 
            $bobot[$i] = $kriteria[$i]->avg;
        }

        $matrix = Kriteria::all();

        //merubah nilai dari tabel kriteria menjadi nilai skalar, bukan varchar atau boolean
        for($i = 0; $i < count($matrix); $i++) {
            $matrix[$i]->pendidikan = $this->convertToScalar('pendidikan', $matrix[$i]->pendidikan);    
            $matrix[$i]->penyakit_berat = $this->convertToScalar('penyakit_berat', $matrix[$i]->penyakit_berat);    
            $matrix[$i]->pengetahuan_kesehatan = $this->convertToScalar('pengetahuan_kesehatan', $matrix[$i]->pengetahuan_kesehatan);    
            $matrix[$i]->keaktifan_sosial = $this->convertToScalar('keaktifan_sosial', $matrix[$i]->keaktifan_sosial);    
            $matrix[$i]->keahlian_komputer = $this->convertToScalar('keahlian_komputer', $matrix[$i]->keahlian_komputer);    
            $matrix[$i]->kepribadian = $this->convertToScalar('kepribadian', $matrix[$i]->kepribadian);    
            $matrix[$i]->mempunyai_hp = $this->convertToScalar('mempunyai_hp', $matrix[$i]->mempunyai_hp);
        }

        $sumPendidikan = 0;
        $sumPenyakitBerat = 0;
        $sumPengetahuanKesehatan = 0;
        $sumKeaktifanSosial = 0;
        $sumKeahlianKomputer = 0;
        $sumKepribadian = 0;
        $sumMempunyaiHp = 0;

        foreach ($matrix as $key) {
            $sumPendidikan += pow($key->pendidikan, 2);
            $sumPenyakitBerat += pow($key->penyakit_berat, 2);
            $sumPengetahuanKesehatan += pow($key->pengetahuan_kesehatan, 2);
            $sumKeaktifanSosial += pow($key->keaktifan_sosial, 2);
            $sumKeahlianKomputer += pow($key->keahlian_komputer, 2);
            $sumKepribadian += pow($key->kepribadian, 2);
            $sumMempunyaiHp += pow($key->mempunyai_hp, 2);
        }

        $matrixNormalisasi = array();

        $i = 0;
        foreach ($matrix as $key) {
            // $temp = new Temp_Normalisasi;
            $matrixNormalisasi[$i] = new \stdClass();
            $matrixNormalisasi[$i]->kader_id = $key->kader_id;
            $matrixNormalisasi[$i]->pendidikan = (($key->pendidikan / sqrt($sumPendidikan) * $bobot[0]));
            $matrixNormalisasi[$i]->penyakit_berat = (($key->penyakit_berat / sqrt($sumPenyakitBerat) * $bobot[1]));
            $matrixNormalisasi[$i]->pengetahuan_kesehatan = (($key->pengetahuan_kesehatan / sqrt($sumPengetahuanKesehatan) * $bobot[2]));
            $matrixNormalisasi[$i]->keaktifan_sosial = (($key->keaktifan_sosial / sqrt( $sumKeaktifanSosial) * $bobot[3]));
            $matrixNormalisasi[$i]->keahlian_komputer = (( $key->keahlian_komputer / sqrt($sumKeahlianKomputer) * $bobot[4]));
            $matrixNormalisasi[$i]->kepribadian = (($key->kepribadian / sqrt($sumKepribadian) * $bobot[5]));
            $matrixNormalisasi[$i]->mempunyai_hp = (($key->mempunyai_hp / sqrt($sumMempunyaiHp) * $bobot[6]));
            $i++;
            // $temp->save();
        }

        // echo '<hr/><h1>MATRIX NORMALISASI TOPSIS</h1>';
        // foreach ($matrixNormalisasi as $key) {
        //     echo json_encode($key);
        // }

        //menghitung solusi ideal positif dan solusi ideal negatif
        $data = $matrixNormalisasi;
        $mKaderId = [];
        $mPendidikan = [];
        $mPenyakitBerat = [];
        $mPengetahuanKesehatan = [];
        $mKeaktifanSosial = [];
        $mKeahlianKomputer = [];
        $mKepribadian = [];
        $mMempunyaiHp = [];

        $i = 0;
        foreach ($data as $key) {
            $mKaderId[$i] = $key->kader_id;
            $mPendidikan[$i] = $key->pendidikan;
            $mPenyakitBerat[$i] = $key->penyakit_berat;
            $mPengetahuanKesehatan[$i] = $key->pengetahuan_kesehatan;
            $mKeaktifanSosial[$i] = $key->keaktifan_sosial;
            $mKeahlianKomputer[$i] = $key->keahlian_komputer;
            $mKepribadian[$i] = $key->kepribadian;
            $mMempunyaiHp[$i] = $key->mempunyai_hp;
            $i++;
        }

        // matrix ideal positif
        $y1Positif = max($mPendidikan);
        $y2Positif = max($mPenyakitBerat);
        $y3Positif = max($mPengetahuanKesehatan);
        $y4Positif = max($mKeaktifanSosial);
        $y5Positif = max($mKeahlianKomputer);
        $y6Positif = max($mKepribadian);
        $y7Positif = max($mMempunyaiHp);

        // matrix ideal negatif
        $y1Negatif = min($mPendidikan);
        $y2Negatif = min($mPenyakitBerat);
        $y3Negatif = min($mPengetahuanKesehatan);
        $y4Negatif = min($mKeaktifanSosial);
        $y5Negatif = min($mKeahlianKomputer);
        $y6Negatif = min($mKepribadian);
        $y7Negatif = min($mMempunyaiHp);

        //perhitungan ideal positif
        $dPositif = array();
        $dNegatif = array();

        for ($i = 0; $i < count($mKaderId); $i++) {
            // $dPositif = new Temp_D_Pos;
            $dPositif[$i] = new \stdClass();
            $dPositif[$i]->kader_id = $mKaderId[$i];
            $dPositif[$i]->dPositif = sqrt(
                pow(($y1Positif - $mPendidikan[$i]), 2) +
                pow(($y2Positif - $mPenyakitBerat[$i]), 2) +
                pow(($y3Positif - $mPengetahuanKesehatan[$i]), 2) +
                pow(($y4Positif - $mKeaktifanSosial[$i]), 2) +
                pow(($y5Positif - $mKeahlianKomputer[$i]), 2) +
                pow(($y6Positif - $mKepribadian[$i]), 2) +
                pow(($y7Positif - $mMempunyaiHp[$i]), 2)
            );
            // $dPositif->save();
        }
        //perhitungan ideal negatif
        for ($i = 0; $i < count($mKaderId); $i++) {
            // $dNegatif = new Temp_D_Neg;
            $dNegatif[$i] = new \stdClass();
            $dNegatif[$i]->kader_id = $mKaderId[$i];
            $dNegatif[$i]->dNegatif = sqrt(
                pow(($mPendidikan[$i] - $y1Negatif), 2) +
                pow(($mPenyakitBerat[$i] - $y2Negatif), 2) +
                pow(($mPengetahuanKesehatan[$i] - $y3Negatif), 2) +
                pow(($mKeaktifanSosial[$i] - $y4Negatif), 2) +
                pow(($mKeahlianKomputer[$i] - $y5Negatif), 2) +
                pow(($mKepribadian[$i] - $y6Negatif), 2) +
                pow(($mMempunyaiHp[$i] - $y7Negatif), 2)
            );
            // $dNegatif->save();
        }

        // echo '<hr/><h1>Solusi Ideal</h1>';
        // echo 'POSITIF<br/>';print_r($dPositif);
        // echo '<br/>NEGATIF<br/>';print_r($dNegatif);

        //hitung nilai preferensi
        $positif = $dPositif;
        $negatif = $dNegatif;

        for ($i = 0; $i < count($negatif); $i++) {
            $pref = new Rangking;
            $pref->kader_id = $negatif[$i]->kader_id;
            $pref->nilai_preferensi = $negatif[$i]->dNegatif / ($negatif[$i]->dNegatif + $positif[$i]->dPositif);
            $pref->save();
        }

        $res = (object) array(
            'dNegatif' => $positif,
            'dPositif' => $negatif,
        );
        return $res;
    }

    private function convertToScalar($key, $value)
    {
        $convertedValue = null;
        switch (strtolower($key)) {
            case 'pendidikan':
                $value = strtolower($value);
                if($value=='strata-1') $convertedValue = 5;
                elseif($value=='d3') $convertedValue = 4;
                elseif($value=='sma') $convertedValue = 3;
                elseif($value=='smp') $convertedValue = 2;
                else $convertedValue = 1;
                break;
            
            case 'penyakit_berat':
                ($value=='1') ? $convertedValue = 1 : $convertedValue = 5; 
                break;

            case 'mempunyai_hp':
            case 'keahlian_komputer':
                ($value=='1') ? $convertedValue = 5 : $convertedValue = 1;
                break;

            case 'pengetahuan_kesehatan':
            case 'keaktifan_sosial':
            case 'kepribadian':
                $value = strtolower($value);
                if($value=='baik') $convertedValue = 5;
                elseif($value=='cukup') $convertedValue = 3;
                else $convertedValue = 1;
                break;
                
            default:
            
                break;
        }
        
        return $convertedValue;
    }
}
