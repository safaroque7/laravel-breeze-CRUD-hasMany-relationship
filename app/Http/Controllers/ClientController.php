<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $allClients = Client::all();
        return view('client/add-new-client', [
            'allClients' => $allClients,
        ]);
    }

    //all clients
    public function allClientsIndex(){

        $allClients = Client::all();
        return view('client/all-clients', [
            'allClients' => $allClients,
        ]);
    }

    //store client
    public function storeClient(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:clients',
            'email' => 'required|unique:clients',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        // for services
        $arrayServices = null;
        if(isset($request-> services)){
            $arrayServices = implode(', ', $request-> services);
        }

        // for image
        $imageName = null;
        if(isset($request->client_photo)){
            $imageName = time() . '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        }


        $arrayClient = new Client;

        $arrayClient->name = $request-> name;
        $arrayClient->phone = $request-> phone;
        $arrayClient->email = $request-> email;
        $arrayClient->gender = $request-> gender;
        $arrayClient->address = $request-> address;
        $arrayClient->facebook_review = $request-> facebook_review;
        $arrayClient->google_review = $request-> google_review;
        $arrayClient->page_number = $request-> page_number;
        $arrayClient->client_photo = $imageName;
        $arrayClient->services = $arrayServices;
        $arrayClient->status = $request-> status;
        $arrayClient->facebook_profile_link = $request-> facebook_profile_link;
        $arrayClient->date_of_birth = $request-> date_of_birth;
        $arrayClient-> save();

        return redirect()->back()->with('success', 'The client information has been saved successfully.');
    }

    //single client info
    public function singleClientInfo($id){
        $singleClientInformation = Client::findOrFail($id);
        return view('client.single-client-info', [
            'singleClientInformation' => $singleClientInformation,
        ]);
    }


    //edit single client info
    public function editSingleClientInfo($id){
        $editableSingleClientInfo = Client::findOrFail($id);
        return view('client.edit-single-client-info', [
            'editableSingleClientInfo' => $editableSingleClientInfo,
        ]);
    }


    // update data
    public function updateClient(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $updateClient = Client::findOrFail($id);


        // for services
        $arrayServices = null;
        if(isset($request-> services)){
            $arrayServices = implode(', ', $request-> services);
        }

        // for image
        $imageName = null;
        if(isset($request->client_photo)){
            $imageName = time() . '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        } else {
            $imageName = $updateClient->client_photo;
        }

        $updateClient->name = $request-> name;
        $updateClient->phone = $request-> phone;
        $updateClient->email = $request-> email;
        $updateClient->gender = $request-> gender;
        $updateClient->address = $request-> address;
        $updateClient->facebook_review = $request-> facebook_review;
        $updateClient->google_review = $request-> google_review;
        $updateClient->page_number = $request-> page_number;
        $updateClient->client_photo = $imageName;
        $updateClient->services = $arrayServices;
        $updateClient->status = $request-> status;
        $updateClient->facebook_profile_link = $request-> facebook_profile_link;
        $updateClient->date_of_birth = $request-> date_of_birth;
        $updateClient-> save();

        return redirect()->back()->with('success', 'The client\'s information has been updated successfully.');
    }

    //for delete
    public function delete($id){
        $deleteClient = Client::findOrFail($id);
        $deleteClient->delete();

        return redirect()->route('all-clients')->with('success', 'The client information has been deleted successfully.');
    }
}