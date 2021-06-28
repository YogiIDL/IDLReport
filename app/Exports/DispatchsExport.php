<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class DispatchsExport implements FromCollection
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
        //
        $response = collect(DB::select('select * from dispatchs where task_id = ?', [$this->task_id]));

        return $response;
    }
}
