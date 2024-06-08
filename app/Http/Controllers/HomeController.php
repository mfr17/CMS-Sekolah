<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Home;
use App\Models\Media;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $hero = Hero::where('is_active', 1)
            ->latest()
            ->get();
        $post = Post::with('category')
            ->orderBy('publish_at', 'desc')
            ->paginate(4);
        $information = Media::where('group', 'information')
            ->where('is_active', true)
            ->get();
        $profile = Media::where('group', 'profile')
            ->where('is_active', true)
            ->get();
        $galleryWithImages = Media::where('group', 'gallery')
            ->where('type', 'image')
            ->where('is_active', true)
            ->get();
        $galleryWithVideos = Media::where('group', 'gallery')
            ->where('type', 'video')
            ->where('is_active', true)
            ->get();
        $gallery = $galleryWithImages->merge($galleryWithVideos);
        return view('pages.home.home', [
            'heros' => $hero,
            'posts' => $post,
            'informations' => $information,
            'profiles' => $profile,
            'galleries' => $gallery,
        ]);
    }
}
