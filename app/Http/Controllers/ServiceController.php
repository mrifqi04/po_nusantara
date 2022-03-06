<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    function index() {

        $services = Service::all();

        return view('admin.service.index', compact('services'));
    }

    function store(Request $request) {
        // dd($request);
        // Validate Request
        $request->validate([
            'nama_service' => 'required',
            'depature' => 'required',
            'arrival' => 'required',
            'date' => 'required',            
            'price' => 'required',            
        ]);

        // Store request
        $serviceData = $request->all();

        // Create Service
        Service::create($serviceData);

        // Create Messages
        $request->session()->flash('msg','Your service has been added');

        // Redirecting back to service lists
        return redirect('/admin/services');
    }

    public function edit($id){
        // Taking data
        $service = Service::find($id);            
        // Redirecting to template
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id){
        // Taking data
        $service = Service::find($id);
        // Validate data from front
        $request->validate([
            'nama_service' => 'required', 
            'deskripsi' => 'required'                     
        ]);
        // Updating data
        $service->update([
            'nama_service' => $request->nama_service,    
            'deskripsi' => $request->deskripsi                  
        ]);
        // Creating message success
        $request->session()->flash('msg','Your cabang has been updated');
        // Redirecting back to service lists
        return redirect('/admin/services');
    }

    public function destroy($id){
        // Delete the product
        Service::destroy($id);

        // Store a message
        session()->flash('msg','Service has been deleted');

        // Redirect back
        return redirect('admin/services');
    }
}
