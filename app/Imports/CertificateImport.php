<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Certificate;

class CertificateImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data=[
                'cert_id' => $row['certificate_id'],
                'name'=>$row['fullname'],
                'department'=>$row['organization'],
                'date'=>$row['verification_date'],
                'status'=>$row['verification_status'],
            ];
            Cert::create($data);
        }
    }
}
