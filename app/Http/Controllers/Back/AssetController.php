<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function type()
    {
        $data = [
            'title' => 'Asset Type',
            'menu' => 'asset',
            'submenu' => 'type',
            'list_asset' => AssetType::all(),
        ];

        return view('back.pages.asset.type', $data);
    }

    public function typeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'icon' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'description' => 'nullable',
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format jpg, jpeg, png',
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $assetType = new AssetType();
        $assetType->name = $request->name;
        $assetType->description = $request->description;
        $assetType->slug = Str::slug($request->name);
        $assetType->meta_title = $request->name;
        $assetType->meta_description = $request->description;
        $assetType->meta_keywords = implode(", ", explode(" ", $request->name));

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconPath = $icon->storeAs('public/asset', Str::slug($request->name) . '.' . $icon->getClientOriginalExtension());
            $assetType->icon = str_replace('public/', '', $iconPath);
        }


        $assetType->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function typeUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'icon' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'description' => 'nullable',
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format jpg, jpeg, png',
            'required' => ':attribute harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $assetType = AssetType::find($id);
        $assetType->name = $request->name;
        $assetType->description = $request->description;
        $assetType->slug = Str::slug($request->name);
        $assetType->meta_title = $request->name;
        $assetType->meta_description = $request->description;
        $assetType->meta_keywords = implode(", ", explode(" ", $request->name));

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconPath = $icon->storeAs('public/asset', Str::slug($request->name) . '.' . $icon->getClientOriginalExtension());
            $assetType->icon = str_replace('public/', '', $iconPath);
        }

        $assetType->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function typeDestroy($id)
    {
        $assetType = AssetType::find($id);
        if ($assetType->icon) {
            Storage::delete('public/' . $assetType->icon);
        }
        $assetType->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function asset($slug)
    {
        $assetType = AssetType::where('slug', $slug)->first();
        $data = [
            'title' => 'Asset Category',
            'menu' => 'asset',
            'submenu' => 'category',
            'asset_type' => $assetType,
            'list_asset' => Asset::where('asset_type_id', $assetType->id)->get(),
        ];

        return view('back.pages.asset.index', $data);
    }

    public function assetCreate(Request $request)
    {
        $type_id = $request->type_id;

       $asset_type = null;
        if ($type_id) {
            $asset_type = AssetType::find($type_id);
        }

        $data = [
            'title' => 'Asset Category',
            'menu' => 'asset',
            'submenu' => 'category',
            'list_asset_type' => AssetType::all(),
            'asset_type' => $asset_type,
        ];
        // dd($data);
        return view('back.pages.asset.create', $data);
    }

    public function assetStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'description' => 'nullable',
            'address' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'asset_type_id' => 'required',
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format jpg, jpeg, png',
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus berupa email',
            'url' => ':attribute harus berupa url',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $asset = new Asset();
        $asset->name = $request->name;
        $asset->description = $request->description;
        $asset->address = $request->address;
        $asset->latitude = $request->latitude;
        $asset->longitude = $request->longitude;
        $asset->phone = $request->phone;
        $asset->email = $request->email;
        $asset->website = $request->website;
        $asset->facebook = $request->facebook;
        $asset->instagram = $request->instagram;
        $asset->twitter = $request->twitter;
        $asset->youtube = $request->youtube;
        $asset->linkedin = $request->linkedin;
        $asset->asset_type_id = $request->asset_type_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/asset', Str::slug($request->name) . '.' . $image->getClientOriginalExtension());
            $asset->image = str_replace('public/', '', $imagePath);
        }

        $asset->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function assetEdit($id)
    {
        $asset = Asset::find($id);
        $data = [
            'title' => 'Asset Category',
            'menu' => 'asset',
            'submenu' => 'category',
            'list_asset_type' => AssetType::all(),
            'asset' => $asset,
        ];

        return view('back.pages.asset.edit', $data);
    }

    public function assetUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'description' => 'nullable',
            'address' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $asset = Asset::find($id);
        $asset->name = $request->name;
        $asset->description = $request->description;
        $asset->address = $request->address;
        $asset->latitude = $request->latitude;
        $asset->longitude = $request->longitude;
        $asset->phone = $request->phone;
        $asset->email = $request->email;
        $asset->website = $request->website;
        $asset->facebook = $request->facebook;
        $asset->instagram = $request->instagram;
        $asset->twitter = $request->twitter;
        $asset->youtube = $request->youtube;
        $asset->linkedin = $request->linkedin;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/asset', Str::slug($request->name) . '.' . $image->getClientOriginalExtension());
            $asset->image = str_replace('public/', '', $imagePath);
        }

        $asset->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function assetDestroy($id)
    {
        $asset = Asset::find($id);
        if ($asset->image) {
            Storage::delete('public/' . $asset->image);
        }
        $asset->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->back();

    }
}
