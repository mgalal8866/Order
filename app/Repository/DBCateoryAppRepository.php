<?php

namespace App\Repository;

use App\Models\CateoryApp;
use App\Repositoryinterface\CateoryAppRepositoryinterface;

class DBCateoryAppRepository implements CateoryAppRepositoryinterface
{
     public function getcategoryapp(){
       return CateoryApp::get();
     }
}
