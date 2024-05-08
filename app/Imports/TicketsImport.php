<?php

namespace App\Imports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\ToModel;

class TicketsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ticket([
            'number'     => $row[1], // Assuming the number column is at index 1
            'created_at' => $row[2], // Assuming the created_at column is at index 2
            'status'     => $row[3], // Assuming the status column is at index 3
            // Map other columns to their respective attributes
        ]);
    }
}


//Adjust the column indexes and mapping according to your table structure.
