<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Attendance;

class AppointmentImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data=[
                'PepID'=>$row['pepid'],
                'name' => $row['name'],
                'PhoneNo'=>$row['phoneno'],
                'FacultyName'=>$row['facultyname'],
                'date'=>$row['date'],
                'status'=>$row['attendance'],
            ];
            Attendance::create($data);
        }
    }
}
