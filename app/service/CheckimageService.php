<?php

namespace App\service;

use App\Facade\Tenants;
use App\Models\Tenant;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class CheckimageService
{
    public function checkimg( $model, $faild ,$folder)
    {
        $tenantname  = Tenants::getname();
        $files = File::allFiles(public_path('asset/images/' . $folder));
        $topath = public_path('asset/images/'.$tenantname.'/'.$folder.'/');
        foreach ($files as $file) {
            $slider = $model::where($faild, $file->getFilename())->first();
            if ($slider == true) {
                 if (!File::exists($topath)) {
                    File::makeDirectory($topath, 0777, true, true);
                }
                // File::move(public_path('asset/images/' . $tenantfolder . '/' . $file->getFilename()),   $topath . $file->getFilename());
                File::copy(public_path('asset/images/' . $folder . '/' . $file->getFilename()),   $topath . $file->getFilename());
            }
        }
    }
}
