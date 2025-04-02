<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::with('category')->get();
        return view('news.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::where('an_hien', 0)->get();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'mo_ta' => 'required',
            'category_id' => 'required|exists:categories,id',
            'luot_xem' => 'nullable|integer|min:0',
            'an_hien' => 'boolean',
            'noi_bat' => 'boolean',
        ]);

        News::create($validated);
        return redirect()->route('news.index')->with('success', 'Thêm tin thành công!');
    }
    public function show($id)
    {
        $news = News::with('category')->findOrFail($id);
        return view('news.show', compact('news'));
    }
    
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::where('an_hien', 0)->get();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $validated = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'mo_ta' => 'required',
            'category_id' => 'required|exists:categories,id',
            'luot_xem' => 'nullable|integer|min:0',
            'an_hien' => 'boolean',
            'noi_bat' => 'boolean',
        ]);

        $news->update($validated);
        return redirect()->route('news.index')->with('success', 'Cập nhật tin thành công!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Xóa tin thành công!');
    }
}