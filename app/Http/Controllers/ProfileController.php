<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $profile = SchoolProfile::where('is_active', 1)->get();

        return view(
            'pages.profile.index',
            [
                'profiles' => $profile
            ]
        );
    }
}
