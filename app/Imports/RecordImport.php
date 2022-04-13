<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Record;

class RecordImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data=[
                'IP'=>$row['ip'],
                'State'=>$row['state'],
                'LGA'=>$row['lga'],
                'Datim_Code'=>$row['datim_code'],
                'FacilityName'=>$row['facilityname'],
                'PepID'=>$row['pepid'],
                'Sex'=>$row['sex'],
                'ARTStartDate'=>$row['artstartdate'],
                'DaysOnART'=>$row['daysonart'],
                'LastPickupdate'=>$row['lastpickupdate'],
                'Clinic_Visit_Lastdate'=>$row['clinic_visit_lastdate'],
                'DaysofARVRefill'=>$row['daysofarvrefill'],
                'RegimenLineAtARTStart'=>$row['regimenlineatartstart'],
                'RegimenAtARTStart'=>$row['regimenatartstart'],
                'CurrentRegimenLine'=>$row['currentregimenline'],
                'CurrentARTRegimen'=>$row['currentartregimen'],
                'CurrentPregnancyStatus'=>$row['currentpregnancystatus'],
                'CurrentViralLoad'=>$row['currentviralload'],
                'DateofCurrentViralLoad'=>$row['dateofcurrentviralload'],
                'DateResultReceivedFacility'=>$row['dateresultreceivedfacility'],
                'LastDateOfSampleCollection'=>$row['lastdateofsamplecollection'],
                'ViralLoadIndication'=>$row['viralloadindication'],
                'CurrentARTStatus'=>$row['currentartstatus'],
                'CurrentARTStatus_Visit'=>$row['currentartstatus_visit'],
                'DOB'=>$row['dob'],
                'Current_Age'=>$row['current_age'],
                'Current_AgeMonths'=>$row['current_agemonths'],
                'TI'=>$row['ti'],
                'Date_Transfered_In'=>$row['date_transfered_in'],
                'PhoneNo'=>$row['phoneno'],
                'Address'=>$row['address'],
                'NextAppointment_Filled'=>$row['nextappointment_filled'],
                'NextAppointment'=>$row['nextappointment'],
                'PBS'=>$row['pbs'],
                'PBSDateCreated'=>$row['pbsdatecreated']
            ];

            Record::create($data);
        }
    }
}
