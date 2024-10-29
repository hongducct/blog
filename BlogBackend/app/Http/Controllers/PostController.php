<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'string|max:50', // Xác thực mỗi tag
        ]);

        // Tạo bài đăng mới
        $post = Post::create([
            'user_id' => $validatedData['user_id'],
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        // Tạo tags mới nếu chưa tồn tại và gán cho bài đăng
        $tagIds = [];
        foreach ($validatedData['tags'] as $tagName) {
            $tag = Tag::firstOrCreate(['tag_name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        // Gán tags cho bài đăng
        $post->tags()->attach($tagIds);

        return response()->json([
            'message' => 'Post created successfully!',
            'post' => $post,
        ], 201);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}
