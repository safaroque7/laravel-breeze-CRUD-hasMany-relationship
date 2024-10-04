<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        
        return view('client/add-new-client');
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
}
