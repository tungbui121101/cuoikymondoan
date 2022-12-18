<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportFile implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        return ['Id', 'Id user', 'User name', 'Phone', 'Email', 'Total', 'Amount', 'Date', 'Address', 'Status'];
    }
}