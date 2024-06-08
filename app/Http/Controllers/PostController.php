<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
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
        $post = Post::paginate(10);
        return view('pages.post.index', [
            'posts' => $post,
            'informations' => $information,
            'profiles' => $profile,
            'galleries' => $gallery,
        ]);
    }

    public function show($slug)
    {
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
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.post.show', [
            'posts' => $post,
            'informations' => $information,
            'profiles' => $profile,
            'galleries' => $gallery,
        ]);
    }

    public function showByCategory(Category $category)
    {
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
        $post = $category->posts()->paginate(10);
        return view('pages.post.category', [
            'posts' => $post,
            'categoryName' => $category->name,
            'informations' => $information,
            'profiles' => $profile,
            'galleries' => $gallery,
        ]);
    }
}
