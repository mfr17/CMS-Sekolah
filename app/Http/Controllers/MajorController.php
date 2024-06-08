<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function __invoke()
    {
        $major = Major::all();

        // dd($major);
        return view('pages.major.index', [
            'majors' => $major
        ]);
    }
}
