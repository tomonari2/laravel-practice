<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 投稿一覧
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * 新規投稿画面
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('posts.create', compact('categories'));
    }

    /**
     * 投稿保存
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        // 認証実装後は auth()->id() を使用する
        // 現在は仮でユーザーIDを指定する必要があります
        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', '投稿しました。');
    }

    /**
     * 投稿詳細
     */
    public function show(Post $post)
    {
        $post->load([
            'user',
            'category',
            'comments.user',
        ]);

        return view('posts.show', compact('post'));
    }

    /**
     * 投稿編集画面
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * 投稿更新
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', '投稿を更新しました。');
    }

    /**
     * 投稿削除
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', '投稿を削除しました。');
    }
}
