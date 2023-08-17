<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Client implements ToCollection, SkipsEmptyRows, WithHeadingRow
{

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $data = [
                'client_name'       => $row['name'],
                'client_fhonewhats' =>  $row['phone'],
                'client_state'      => $row['address'],
                'default_Sael'      => $row['sale'] == 'Cash'?'كاش':'اجل',
                'store_name'        => $row['store'],
            ];
            User::create($data);
        }
    }
    public function rules(): array
    {
        return [
            // 'phone' => Rule::unique('users', 'client_fhonewhats'),
            // 'name' => 'required',
            '*.client_fhonewhats.unique' => 'required|unique:users,client_fhonewhats'
        ];
    }
    public function customValidationMessages()
    {
        return [
            'client_fhonewhats.unique' => 'الرقم مكرر',
        ];
    }
}
