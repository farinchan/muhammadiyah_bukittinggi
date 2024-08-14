<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
   public function index()
   {
        $data = [
            'title' => 'Profile',
            'menu' => 'profile',
            'sub_menu' => '',
            'list_profile' => Profile::all()
        ];

        return view('back.pages.profile.index', $data);
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

        Profile::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.profile.index');


    }

    public function edit($id)
    {
        $data = [
            'title' => 'Profile',
            'menu' => 'profile',
            'sub_menu' => '',
            'profile' => Profile::find($id)
        ];

        return view('back.pages.profile.edit', $data);
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

        Profile::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
        ]);

        Alert::success('Success', 'Data berhasil diubah');
        return redirect()->route('admin.profile.index');
    }
}
