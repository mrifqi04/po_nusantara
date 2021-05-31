<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamOperasional;

class JamOperasionalController extends Controller
{
    function index() {
        // Taking data
        $jams = JamOperasional::all();

        // Directing to template with data
        return view('admin.jam_operasional.index', compact('jams'));
    }

    function store(Request $request) {
        
        // Validate Request
        $request->validate(['jam' => 'required']);

        // Store request
        $jamData = $request->all();

        // Create Service
        JamOperasional::create($jamData);

        // Create Messages
        $request->session()->flash('msg','Your time has been added');

        // Redirecting back to service lists
        return redirect('/admin/operationals');
    }

    public function edit($id){

        // Taking data
        $jam = JamOperasional::find($id); 

        // Redirecting to template
        return view('admin.jam_operasional.edit', compact('jam'));
    }

    public function update(Request $request, $id){
        // Taking data
        $jam = JamOperasional::find($id);
        // Validate data from front
        $request->validate([
            'jam' => 'required',                      
        ]);
        // Updating data
        $jam->update([
            'jam' => $request->jam,                      
        ]);
        // Creating message success
        $request->session()->flash('msg','Your time has been updated');
        // Redirecting back to service lists
        return redirect('/admin/operationals');
    }

    public function destroy($id){
        // Delete the product
        JamOperasional::destroy($id);

        // Store a message
        session()->flash('msg','Time has been deleted');

        // Redirect back
        return redirect('admin/operationals');
    }
}
