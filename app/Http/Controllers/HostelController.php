<?php

namespace App\Http\Controllers;

use App\Models\AddGallary;
use App\Models\Hostels;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public  $name;


    function edithostel(){

  $hostel = Hostels::find(request('id'));

  return view('Dashboard.update-hostel' , compact('hostel'));
    }


    function updatedhostel(Request $request) {


        $hostel =   Hostels::find($request->id);

        if($request->hasFile('hostel_image')){
            $file =  $request->file('hostel_image');
            $filename =  $file->getClientOriginalName();
            $path = 'hostels/';
            $this->name = $path . $filename;
            $file->move($path ,  $this->name);
        }else{
            $this->name = $hostel->hostel_image;
        }

        Hostels::where('id' , $request->id)->update([
       "name" => $request['name'],
       "location" => $request['location'],
       "hostel_manager_name" => $request['hostel_manager_name'],
       "phone" => $request['phone'],
       "mobile_number"	 => $request['mobile_number'],
       "email" => $request['email'],
       "gender" => $request['gender'],
       "hostel_rent" => $request['hostel_rent'],
       "hostel_image" => $this->name,
        ]);



        return redirect(route('hostels-list'))->with('message' , 'Updated Successfuy');

    }



    function deletehostel(){
        Hostels::destroy(request('id'));
        return back()->with('deletemessage' , 'Hostel Deleted Successfully');
    }





}
