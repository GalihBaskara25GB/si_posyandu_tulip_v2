<?php

namespace App\Imports;

use App\Models\Kader;
use App\Models\Kriteria;
// use Maatwebsite\Excel\Concerns\ToModel;
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

            Kriteria::create([
                'pendidikan' => $row[6],
                'penyakit_berat' => $this->convertToScalar('penyakit_berat', $row[9]),
                'pengetahuan_kesehatan' => $row[10],
                'keaktifan_sosial' => $row[11],
                'keahlian_komputer' => $this->convertToScalar('keahlian_komputer', $row[13]),
                'kepribadian' => $row[14],
                'mempunyai_hp' => $this->convertToScalar('mempunyai_hp', $row[15]),
                'kader_id' => $kader->id
            ]);
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
        $string = explode(',', $val);
        $placeOfBirth = $string[0];
        $date = explode('-', $string[1]);
        $dateOfBirth = $date[2].'-'.$date[1].'-'.substr($date[0], -2);

        return ($option=='place') ? $placeOfBirth : $dateOfBirth;
    }
}
