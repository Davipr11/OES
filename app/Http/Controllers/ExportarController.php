<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users_inscription;
use App\Exports\UserInscriptionExport;
use Excel;
class ExportarController extends Controller
{
    public function exportar(){
        return Excel::download(new UserInscriptionExport, 'users_inscription.xlsx');
    }
}
