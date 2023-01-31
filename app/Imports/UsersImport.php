<?php

namespace App\Imports;

use App\Models\Classes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

// https://codelapan.com/post/how-to-import-or-export-csv-data-in-laravel-8
class UsersImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return $row[0];

        $checkIfVendorExists = Classes::where('number', $row[0])->first();
        // return $checkIfVendorExists;

        if ($checkIfVendorExists !== null) {

            Student::create([
                'name' =>  $row[1],
                'class' =>  $checkIfVendorExists->id,
                'password' => Hash::make("abc123"),
                'school_id' => Auth::user()->school_id,
                    ]);

        }

        // return new Student([
        //     // if ($row[0]) {
        //     //     # code...
        //     // }


        //     'class' => $row[0],
        //     // 'name' =>  $row[0],
        //     // 'id_number' =>  $row[1],
        //     // 'class' => $row[2],

        //     'name' =>  $row[1],
        //     // 'id_number' =>  $row[1],


        //     'password' => Hash::make("abc123"),
        //     'school_id' => Auth::user()->school_id,
        // ]);

  }
}
