<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DispatchsExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $task_id;

    public function __construct(string $task_id){
        $this->task_id = $task_id;

        // dump($task_id);
        // die();
    }

    public function collection()
    {
        // join awb a on d.task_id = a.task_id
        $response = DB::select('select * from dispatchs d
            where d.task_id = ?', [$this->task_id]);
        $awb = DB::select('select * from awb where task_id = ?', [$this->task_id]);
        $response[0]->awb = $awb;
        // dump($response);
        // die();

        return collect($response);
    }
}
