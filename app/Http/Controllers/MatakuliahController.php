<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(): View
    {
        $matakuliahs = Matakuliah::paginate(10);
        return view('matakuliahs',['matakuliahs' => $matakuliahs]);
    }
}
