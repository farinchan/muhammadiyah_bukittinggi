<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function category()
    {
        $data = [
            'title' => 'Kategori Berita',
            'menu' => 'Berita',
            'sub_menu' => 'Kategori',
            'categories' => NewsCategory::all()
        ];

        return view('back.pages.news.category', $data);
    }

    public function categoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:news_category,name',
            'description' => 'nullable',
        ],[
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'meta_title' => $request->name,
            'meta_description' => $request->description,
            'meta_keywords' => implode(", ", explode(" ", $request->name)),
        ]);

        Alert::success('Sukses', 'Kategori Berita berhasil ditambahkan');
        return redirect()->route('admin.news.category');
        
    }

    public function categoryUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:news_category,name,'.$id,
            'description' => 'nullable',
        ],[
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = NewsCategory::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'meta_title' => $request->name,
            'meta_description' => $request->description,
            'meta_keywords' => implode(", ", explode(" ", $request->name)),
        ]);

        Alert::success('Sukses', 'Kategori Berita berhasil diubah');
        return redirect()->route('admin.news.category');
    }

    public function categoryDestroy($id)
    {
        $category = NewsCategory::find($id);
        $category->delete();

        Alert::success('Sukses', 'Kategori Berita berhasil dihapus');
        return redirect()->route('admin.news.category');
    }
}
