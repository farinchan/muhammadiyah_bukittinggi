<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class inboxController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Inbox',
            'menu' => 'inbox',
            'sub_menu' => '',
            'list_inbox' => ContactUs::latest()->get()
        ];

        return view('back.pages.inbox.index', $data);
    }

    public function destroy($id)
    {
        $inbox = ContactUs::find($id);
        $inbox->delete();

        return redirect()->route('inbox.index')->with('success', 'Inbox deleted successfully');
    }   
}
