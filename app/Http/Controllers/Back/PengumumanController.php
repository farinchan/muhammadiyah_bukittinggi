<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pengumuman',
            'menu' => 'Pengumuman',
            'sub_menu' => 'Pengumuman',
            'list_pengumuman' => Pengumuman::latest()->get()
        ];

        return view('back.pages.pengumuman.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengumuman',
            'menu' => 'Pengumuman',
            'sub_menu' => 'Pengumuman',
        ];

        return view('back.pages.pengumuman.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'content' => 'required',
            'file' => 'nullable|file|mimes:pdf',
            'meta_keywords' => 'nullable',
            'is_active' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'image' => 'File harus berupa gambar',
            'mimes' => 'File harus berupa gambar',
            'max' => 'Ukuran file maksimal 2MB',
            'file' => 'File harus berupa pdf',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengumuman = new Pengumuman();
        $pengumuman->title = $request->title;
        $pengumuman->slug = Str::slug($request->title) . '-' . rand(1000, 9999);
        $pengumuman->content = $request->content;
        $pengumuman->meta_title = $request->title;
        $pengumuman->meta_description = Str::limit(strip_tags($request->content), 150);
        $pengumuman->meta_keywords = implode(", ", array_column(json_decode($request->meta_keywords??"[]"), 'value'));
        $pengumuman->is_active = $request->is_active;
        $pengumuman->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/pengumuman', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension());
            $pengumuman->image = str_replace('public/', '', $imagePath);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs('public/pengumuman', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension());
            $pengumuman->file = str_replace('public/', '', $filePath);
        }

        $pengumuman->save();

        Alert::success('Sukses', 'Pengumuman berhasil ditambahkan');
        return redirect()->route('admin.pengumuman.index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengumuman',
            'menu' => 'Pengumuman',
            'sub_menu' => 'Pengumuman',
            'pengumuman' => Pengumuman::find($id)
        ];

        return view('back.pages.pengumuman.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'content' => 'required',
            'file' => 'nullable|file|mimes:pdf',
            'meta_keywords' => 'nullable',
            'is_active' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'image' => 'File harus berupa gambar',
            'mimes' => 'File harus berupa gambar',
            'max' => 'Ukuran file maksimal 2MB',
            'file' => 'File harus berupa file pdf',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengumuman = Pengumuman::find($id);
        $pengumuman->title = $request->title;
        $pengumuman->slug = Str::slug($request->title) . '-' . rand(1000, 9999);
        $pengumuman->content = $request->content;
        $pengumuman->meta_title = $request->title;
        $pengumuman->meta_description = Str::limit(strip_tags($request->content), 150);
        $pengumuman->meta_keywords = implode(", ", array_column(json_decode($request->meta_keywords??"[]"), 'value'));
        $pengumuman->is_active = $request->is_active;
        $pengumuman->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/pengumuman', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension());
            $pengumuman->image = str_replace('public/', '', $imagePath);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->storeAs('public/pengumuman', date('YmdHis') . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension());
            $pengumuman->file = str_replace('public/', '', $filePath);
        }

        $pengumuman->save();

        Alert::success('Sukses', 'Pengumuman berhasil di update');
        return redirect()->route('admin.pengumuman.index');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        if ($pengumuman->image) {
            Storage::delete('public/' . $pengumuman->image);
        }
        if ($pengumuman->file) {
            Storage::delete('public/' . $pengumuman->file);
        }

        Alert::success('Sukses', 'Pengumuman berhasil dihapus');
        return redirect()->route('admin.pengumuman.index');
    }
}
