<?php

namespace App\Imports;

use Throwable;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use PhpParser\ErrorHandler\Throwing;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class Client implements
 ToCollection,
 SkipsEmptyRows,
  WithHeadingRow, SkipsOnError
  ,SkipsOnFailure
  ,WithValidation{


    use Importable, SkipsErrors,SkipsFailures;


    public function Collection(Collection $rows)
    {
        foreach ($rows as $row) {
        $data = [
            'client_name'       => $row['name'],
            'client_fhonewhats' => $row['phone'] ,
            'client_state'      => $row['address'],
            'default_Sael'      => $row['sale'] == 'Cash' ? 'كاش' : 'اجل',
            'store_name'        => $row['store'],
        ];
        return   User::create($data);
        // return  new User($data);
        }
    }
    public function rules(): array
    {
        return [
            '*.phone' => 'required|integer|size:11|unique:users,client_fhonewhats',
            '*.name' =>  'required',
            '*.sale' =>  'required',
        ];
    }
    public function customValidationMessages()
    {
        return [
            '*.phone.unique'  => 'الرقم موجود مسبقا',
            '*.phone.size'  => 'الرقم التليفون غير صحيح ',
            '*.phone.digits'  => 'الرقم التليفون غير صحيح ',
            '*.phone.integer'  => 'الرقم التليفون غير صحيح ',
            '*.name.required' => 'الاسم العميل مطلوب',
            '*.sale.required' => 'نوع التعامل مطلوب',
        ];
    }

    // public function onError(Throwable $error)
    // {

    // }

    // public function onFailure(Failure ...$failur)
    // {

    // }
}
