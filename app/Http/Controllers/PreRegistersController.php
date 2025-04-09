<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visitor;

class PreRegistersController extends Controller
{
    
    public function addPreRegister()
    {
        $users = User::all();
        return view('pre-registers/addPreRegister', compact('users'));
    }
    
    public function savePreRegister(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required|in:male,female',
            'company_name' => 'nullable',
            'national_id_no' => 'nullable',
            'purpose' => 'required',
            'address' => 'required',
            'employee_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->image){
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $request->image = $imagePath;
        
            $visitor = new Visitor();
            $visitor->title = $request->title;
            $visitor->first_name = $request->first_name;
            $visitor->last_name = $request->last_name;
            $visitor->email = $request->email;
            $visitor->phone = $request->phone;
            $visitor->gender = $request->gender;
            $visitor->company_name = $request->company_name;
            $visitor->national_id_no = $request->national_id_no;
            $visitor->purpose = $request->purpose;
            $visitor->address = $request->address;
            $visitor->image = $request->image;
            $visitor->user_id = 1;
            $visitor->status = 'pending';
            $visitor->type = 'pre_registered';
            $visitor->employee_id = $request->employee_id;
            $visitor->expected_date = $request->expected_date;
            $visitor->expected_time = $request->expected_time;
            $visitor->save();
        } else {
            $visitor = new Visitor();
            
            $visitor->title = $request->title;
            $visitor->first_name = $request->first_name;
            $visitor->last_name = $request->last_name;
            $visitor->email = $request->email;
            $visitor->phone = $request->phone;
            $visitor->gender = $request->gender;
            $visitor->company_name = $request->company_name;
            $visitor->national_id_no = $request->national_id_no;
            $visitor->purpose = $request->purpose;
            $visitor->address = $request->address;
            $visitor->user_id = 1;
            $visitor->status = 'pending';
            $visitor->type = 'pre_registered';
            $visitor->employee_id = $request->employee_id;
            $visitor->expected_date = $request->expected_date;
            $visitor->expected_time = $request->expected_time;
            $visitor->save();
        }
        
        
        return redirect()->route('preRegistersList')->with('success', 'Visitor added successfully');
    }   
    
    public function preRegistersList()
    {
        return view('pre-registers/preRegistersList');
    }
    
    public function viewPreRegister($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('pre-registers/viewPreRegister', compact('visitor'));
    }
    public function editPreRegister($id)
    {
        $users = User::all();
        $visitor = Visitor::findOrFail($id);
        return view('pre-registers/editPreRegister', compact('visitor', 'users'));
    }
    
    public function updatePreRegister(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required|in:male,female',
            'company_name' => 'nullable',
            'national_id_no' => 'nullable',
            'purpose' => 'required',
            'address' => 'required',
            'employee_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->image){
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $request->image = $imagePath;
        
            $visitor = Visitor::findOrFail($id);
            $visitor->title = $request->title;
            $visitor->first_name = $request->first_name;
            $visitor->last_name = $request->last_name;
            $visitor->email = $request->email;
            $visitor->phone = $request->phone;
            $visitor->gender = $request->gender;
            $visitor->company_name = $request->company_name;
            $visitor->national_id_no = $request->national_id_no;
            $visitor->purpose = $request->purpose;
            $visitor->address = $request->address;
            $visitor->image = $request->image;
            $visitor->user_id = 1;
            $visitor->status = 'pending';
            $visitor->type = 'pre_registered';
            $visitor->employee_id = $request->employee_id;
            $visitor->expected_date = $request->expected_date;
            $visitor->expected_time = $request->expected_time;
            $visitor->update();
        } else {
            $visitor = Visitor::findOrFail($id);
            
            $visitor->title = $request->title;
            $visitor->first_name = $request->first_name;
            $visitor->last_name = $request->last_name;
            $visitor->email = $request->email;
            $visitor->phone = $request->phone;
            $visitor->gender = $request->gender;
            $visitor->company_name = $request->company_name;
            $visitor->national_id_no = $request->national_id_no;
            $visitor->purpose = $request->purpose;
            $visitor->address = $request->address;
            $visitor->user_id = 1;
            $visitor->status = 'pending';
            $visitor->type = 'pre_registered';
            $visitor->employee_id = $request->employee_id;
            $visitor->expected_date = $request->expected_date;
            $visitor->expected_time = $request->expected_time;
            $visitor->update();
        }
        
        return redirect()->route('preRegistersList')->with('success', 'Visitor added successfully');
    } 

    public function deletePreRegister($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();
        
        return redirect()->route('preRegistersList')->with('success', 'Visitor deleted successfully');
    }   
    
}
