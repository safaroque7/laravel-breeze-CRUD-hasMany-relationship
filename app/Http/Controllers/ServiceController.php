<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // fot getAddNewService
    public function getAddNewService(){
        $allServiceCollection = Service::all();
        return view('service.add-new-service', [
            'allServiceCollection' => $allServiceCollection,
        ]);
    }

    // for adding new service
    public function getStoreNewService(Request $request){

        $request->validate([
            'name' => 'required|unique:services',
        ]);

        $arrayService = new Service;
        $arrayService->name = $request->name;
        $arrayService->save(); 

        return redirect()->back()->with('success', 'Your service has been added successfully');
    }

    //for editing service item
    public function editServiceItem($id){
        $editableServiceItem = Service::findOrFail($id);
        $allServiceCollection = Service::all();
        return view('service.edit-service-item', [
            'editableServiceItem' => $editableServiceItem,
            'allServiceCollection' => $allServiceCollection
        ]);
    }


    // for updating new service
    public function updateServiceItem(Request $request, $id){

        $request->validate([
            'name' => 'required|unique:services',
        ]);

        $updateServiceItem = Service::findOrFail($id);
        $updateServiceItem->name = $request->name;
        $updateServiceItem->save(); 

        return redirect()->back()->with('success', 'Your service\'s item has been edited successfully');
    }

    //for deleting
    public function destory($id){
        $deletedServiceItem = Service::findOrFail($id);
        $deletedServiceItem->delete();
    
        return redirect()->back()->with('success', 'Your service\'s item has been deleted successfully');
    }
}