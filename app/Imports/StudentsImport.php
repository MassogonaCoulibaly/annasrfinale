<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'firstname' => $row[0],
            'lastname'  => $row[1],
            'phone'     => $row[2],
            'group_id'  => $row[3],
            'user_id'   => auth()->id(),
        ]);
    }
}
