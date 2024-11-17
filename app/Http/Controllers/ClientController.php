<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $allServices = Service::all();
        $allClients = Client::all();
        return view('client.add-new-client', [
            'allClients' => $allClients,
            'allServices' => $allServices,
        ]);
    }

//all clients
    public function allClientsIndex()
    {

        $allClients = Client::all();
        return view('client.all-clients', [
            'allClients' => $allClients,
        ]);
    }

//store client
    public function storeClient(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:clients',
            'email' => 'required|unique:clients',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);

// for services
        // $arrayServices = [];
        
        // if (isset($request->services)) {

        //     array_push($arrayServices, $request->services);

        //     // $arrayServices = implode(', ', $request->services);

        // }

// for image
        $imageName = null;
        if (isset($request->client_photo)) {
            $imageName = time() . '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        }

        $arrayClient = new Client;

        $arrayClient->name = $request->name;
        $arrayClient->phone = $request->phone;
        $arrayClient->email = $request->email;
        $arrayClient->gender = $request->gender;
        $arrayClient->address = $request->address;
        $arrayClient->facebook_review = $request->facebook_review;
        $arrayClient->google_review = $request->google_review;
        $arrayClient->page_number = $request->page_number;
        $arrayClient->client_photo = $imageName;
        $arrayClient->status = $request->status;
        $arrayClient->facebook_profile_link = $request->facebook_profile_link;
        $arrayClient->date_of_birth = $request->date_of_birth;
        $arrayClient->save();

        $arrayClient->services()->sync($request->services);

        return redirect()->back()->with('success', 'The client information has been saved successfully.');
    }

//single client info
    public function singleClientInfo($id)
    {

        $singleClientInformation = Client::findOrFail($id);
        $singleClientServices = Client::with('services')->findOrFail($id);

        // get previous user id
        $previous = Client::where('id', '<', $singleClientInformation->id)->max('id');

        // get next user id
        $next = Client::where('id', '>', $singleClientInformation->id)->min('id');

        return view('client.single-client-info', [
            'singleClientInformation' => $singleClientInformation,
            'previous' => $previous,
            'next' => $next,
            'singleClientServices'=>$singleClientServices,
        ]);
    }

//edit single client info
    public function editSingleClientInfo($id)
    {
        $editableSingleClientInfo = Client::findOrFail($id);
        $editableSingleServiceInfo = Service::all();
        
        // get previous user id
        $previous = Client::where('id', '<', $editableSingleClientInfo->id)->max('id');

        // get next user id
        $next = Client::where('id', '>', $editableSingleClientInfo->id)->min('id');

        return view('client.edit-single-client-info', [
            'editableSingleClientInfo' => $editableSingleClientInfo,
            'editableSingleServiceInfo' => $editableSingleServiceInfo,
            'previous' => $previous,
            'next' => $next,
        ]);
    }



    

// update data
    public function updateClient(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'client_photo' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $updateClient = Client::findOrFail($id);

// for services
        // $arrayServices = null;
        // if (isset($request->services)) {
        //     $arrayServices = implode(', ', $request->services);
        // }

// for image
        $imageName = null;
        if (isset($request->client_photo)) {
            $imageName = time() . '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        } else {
            $imageName = $updateClient->client_photo;
        }

        $updateClient->name = $request->name;
        $updateClient->phone = $request->phone;
        $updateClient->email = $request->email;
        $updateClient->gender = $request->gender;
        $updateClient->address = $request->address;
        $updateClient->facebook_review = $request->facebook_review;
        $updateClient->google_review = $request->google_review;
        $updateClient->page_number = $request->page_number;
        $updateClient->client_photo = $imageName;
        $updateClient->status = $request->status;
        $updateClient->facebook_profile_link = $request->facebook_profile_link;
        $updateClient->date_of_birth = $request->date_of_birth;
        $updateClient->save();

        $updateClient->services()->sync($request->services);

        return redirect()->back()->with('success', 'The client\'s information has been updated successfully.');
    }

//for delete
    public function delete($id)
    {
        $deleteClient = Client::findOrFail($id);
        $deleteClient->delete();

        return redirect()->route('all-clients')->with('success', 'The client information has been deleted successfully.');
    }

// get all active clients
    public function getActiveClients()
    {
        $activeClientsCollection = Client::where('status', 1)->get();

        return view('client.active-clients', [
            'activeClientsCollection' => $activeClientsCollection,
        ]);
    }

// get all active clients
    public function getInactiveClients()
    {
        $inactiveClientsCollection = Client::where('status', 0)->get();

        return view('client.inactive-clients', [
            'inactiveClientsCollection' => $inactiveClientsCollection,
        ]);
    }


    //get all inactiv cliens email addresses
    public function getInactiveClientsEmails(){
        $inactiveClientsEmailCollection = Client::where('status', 0)->get('email');
        
        return view('client.inactive-clients-email', [
            'inactiveClientsEmailCollection' => $inactiveClientsEmailCollection
        ]);
    }

    //get all active cliens email addresses
    public function getActiveClientsEmails(){
        $activeClientsEmailCollection = Client::where('status', 1)->get('email');
        
        return view('client.active-clients-email', [
            'activeClientsEmailCollection' => $activeClientsEmailCollection
        ]);
    }

    //get facebook review off
    public function getFacebookReviewLeft(){
        $facebookReviewLeftEmailCollection = Client::where('facebook_review', 0)->get('email');
        return view('client.facebook-review-left-email', [
            'facebookReviewLeftEmailCollection' => $facebookReviewLeftEmailCollection
        ]);
    }


    //get facebook review off
    public function getFacebookReviewLeftPhone(){
        $facebookReviewLeftPhoneCollection = Client::where('facebook_review', 0)->get('phone');
        return view('client.facebook-review-left-phone', [
            'facebookReviewLeftPhoneCollection' => $facebookReviewLeftPhoneCollection
        ]);
    }

    //get gppg;e review left email
    public function getGoogleReviewLeftEmail(){
        $getGoogleReviewLeftEmailCollection = Client::where('google_review', 0)->get('email');

        return view('client.google-review-left-email', [
            'getGoogleReviewLeftEmailCollection' => $getGoogleReviewLeftEmailCollection
        ]);
    }

    //get gppg;e review left phone
    public function getGoogleReviewLeftPhone(){
        $getGoogleReviewLeftPhoneCollection = Client::where('google_review', 0)->get('phone');

        return view('client.google-review-left-phone', [
            'getGoogleReviewLeftPhoneCollection' => $getGoogleReviewLeftPhoneCollection
        ]);
    }
}
