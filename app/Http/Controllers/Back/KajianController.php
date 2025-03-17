<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use App\Models\KajianComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class KajianController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kajian',
            'menu' => 'kajian',
            'sub_menu' => 'kajian',
            'list_kajian' => Kajian::latest()->get(),
        ];

        return view('back.pages.kajian.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kajian',
            'menu' => 'kajian',
            'sub_menu' => 'kajian',
            'users' => User::all(),
        ];

        return view('back.pages.kajian.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4248',
            'status' => 'required|in:draft,published,archived',
            'user_id' => 'required',
        ], [
            'required' => ':attribute wajib diisi',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
            'max' => ':attribute tidak boleh lebih dari 2MB',
            'in' => ':attribute harus draft, published, atau archived',
            'user_id.required' => 'Penulis wajib diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kajian = new Kajian();
        $kajian->title = $request->title;
        $kajian->content = $request->content;
        $kajian->tags = $request->tags ? implode(", ", array_column(json_decode($request->tags), 'value')) : null;
        $kajian->status = $request->status;
        $kajian->slug = Str::slug($request->title).'-'. rand(1000, 9999);
        $kajian->status = $request->status;
        $kajian->meta_title = $request->title;
        $kajian->meta_description = Str::limit(strip_tags($request->content), 160);
        $kajian->meta_keywords = $request->tags ? implode(", ", array_column(json_decode($request->tags), 'value')) : null;
        $kajian->user_id = $request->user_id;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->storeAs('public/kajian', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $thumbnail->getClientOriginalExtension());
            $kajian->thumbnail = str_replace('public/', '', $thumbnailPath);
        }

        $kajian->save();

        Alert::success('Berhasil', 'Kajian berhasil ditambahkan');
        return redirect()->route('admin.kajian.index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kajian',
            'menu' => 'kajian',
            'sub_menu' => 'kajian',
            'kajian' => Kajian::findOrFail($id),
            'users' => User::all(),
        ];

        return view('back.pages.kajian.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:draft,published,archived',
            'user_id' => 'required|exists:users,id',
        ], [
            'required' => ':attribute wajib diisi',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
            'max' => ':attribute tidak boleh lebih dari 2MB',
            'in' => ':attribute harus draft, published, atau archived',
            'user_id.required' => 'Penulis wajib diisi',
            'user_id.exists' => 'Penulis tidak ditemukan',

        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kajian = Kajian::findOrFail($id);
        $kajian->title = $request->title;
        $kajian->content = $request->content;
        $kajian->tags = $request->tags ? implode(", ", array_column(json_decode($request->tags), 'value')) : null;
        $kajian->status = $request->status;
        $kajian->slug = Str::slug($request->title).'-'. rand(1000, 9999);
        $kajian->status = $request->status;
        $kajian->meta_title = $request->title;
        $kajian->meta_description = Str::limit(strip_tags($request->content), 160);
        $kajian->meta_keywords = $request->tags ? implode(", ", array_column(json_decode($request->tags), 'value')) : null;
        $kajian->user_id = $request->user_id;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->storeAs('public/kajian', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $thumbnail->getClientOriginalExtension());
            $kajian->thumbnail = str_replace('public/', '', $thumbnailPath);
        }

        $kajian->save();

        Alert::success('Berhasil', 'Kajian berhasil di update');
        return redirect()->route('admin.kajian.index');
    }

    public function destroy($id)
    {
        $kajian = Kajian::findOrFail($id);
        Storage::delete('public/' . $kajian->thumbnail);
        $kajian->delete();

        Alert::success('Berhasil', 'Kajian berhasil dihapus');
        return redirect()->route('admin.kajian.index');
    }

    public function comment()
    {
        $data = [
            'title' => 'Komentar Kajian',
            'menu' => 'kajian',
            'sub_menu' => 'comment',
            'comments' => KajianComment::all(),
        ];

        return view('back.pages.kajian.comment', $data);
    }

    public function commentSpam($id)
    {
        $kajian = KajianComment::findOrFail($id);
        $kajian->status = 'spam';
        $kajian->save();

        Alert::success('Berhasil', 'Komentar berhasil di tandai sebagai spam');
        return redirect()->route('admin.kajian.comment');
    }
}
