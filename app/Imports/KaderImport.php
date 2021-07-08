<?php

namespace App\Imports;

use App\Models\Kader;
use App\Models\Kriteria;
use App\Models\ObjekKriteria;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class KaderImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $kader = Kader::create([
                'nama' => $row[1],
                'alamat' => $row[5],
                'tempat_lahir' => $this->getDateOrPlace('place', $row[2]),
                'tanggal_lahir' => $this->getDateOrPlace('date', $row[2]),
                'jenis_kelamin' => $row[4],
                'nomor_telepon' => '08292926726723',
                'is_verified' => 0
            ]);

            $objekKriterias = ObjekKriteria::orderBy('created_at', 'asc')->get();

            $i=6;
            foreach ($objekKriterias as $key) {
                Kriteria::create([
                    'objek_kriteria_id' => $key->id,
                    'kader_id' => $kader->id,
                    'nilai' => $row[$i]
                ]);
                $i++;
            }
        }
    }

    function convertToScalar($columnName, $val)
    {
        $convertedValue = null;
        switch ($columnName) {
            case 'mempunyai_hp':
            case 'keahlian_komputer':
                $convertedValue = (strtolower($val)=='ya') ? 1 : 0;
                break;

            case 'penyakit_berat':
                $convertedValue = (strtolower($val)=='punya') ? 0 : 1;
                break;
            
            default:
                # code...
                break;
        }

        return $convertedValue;
    }

    function getDateOrPlace($option, $val)
    {
        // dd($val);
        $string = explode(',', $val);
        $placeOfBirth = $string[0];
        $date = explode('-', $string[1]);
        $dateOfBirth = $date[2].'-'.$date[1].'-'.substr($date[0], -2);

        return ($option=='place') ? $placeOfBirth : $dateOfBirth;
    }
}
