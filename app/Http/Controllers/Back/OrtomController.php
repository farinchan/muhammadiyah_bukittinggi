<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\OrganisasiOtonom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class OrtomController extends Controller
{
    public function index()
   {
        $data = [
            'title' => 'Organisasi Otonom',
            'menu' => 'Ortom',
            'sub_menu' => '',
            'list_ortom' => OrganisasiOtonom::all()
        ];

        return view('back.pages.ortom.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        OrganisasiOtonom::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->name,
            'meta_keywords' => $request->name,
            'content' => "",
            'meta_description' => "",
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.ortom.index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Organisasi Otonom',
            'menu' => 'Ortom',
            'sub_menu' => '',
            'ortom' => OrganisasiOtonom::find($id)
        ];

        return view('back.pages.ortom.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'content.required' => 'Konten harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        OrganisasiOtonom::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->name,
            'meta_keywords' => $request->name,
            'meta_description' => strip_tags(substr($request->content, 0, 150)),
            'content' => $request->content,
        ]);

        Alert::success('Success', 'Data berhasil diupdate');
        return redirect()->route('admin.ortom.index');

    }

    public function destroy($id)
    {
        OrganisasiOtonom::find($id)->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('admin.ortom.index');
    }
}
