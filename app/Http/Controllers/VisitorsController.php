<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;

class VisitorsController extends Controller
{

    public function addVisitor()
    {
        $users = User::all();
        return view('visitors/addVisitor', compact('users'));
    }
    
    public function saveVisitor(Request $request)
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
            $visitor->employee_id = $request->employee_id;
            $visitor->status = 'Pending';
            $visitor->type = 'walk-in';
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
            $visitor->employee_id = $request->employee_id;
            $visitor->status = 'Pending';
            $visitor->type = 'walk-in';
            $visitor->save();
        }
        
        return redirect()->route('visitorsList')->with('success', 'Visitor added successfully');
    }   

    public function editVisitor($id)
    {
        $users = User::all();
        $visitor = Visitor::findOrFail($id);
        return view('visitors/editVisitor', compact('visitor', 'users'));
    }

    public function updateVisitor(Request $request, $id)
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
            $visitor->employee_id = $request->employee_id;
            $visitor->status = 'Pending';
            $visitor->type = 'walk-in';
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
            $visitor->employee_id = $request->employee_id;
            $visitor->status = 'Pending';
            $visitor->type = 'walk-in';
            $visitor->update();
        }
        
        return redirect()->route('visitorsList')->with('success', 'Visitor updated successfully');
    }   
    
    public function visitorsList()
    {
        return view('visitors/visitorsList');
    }

    public function walkInVisitors()
    {
        return view('visitors/walkInVisitors');
    }

    public function viewVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('visitors/viewVisitor', compact('visitor'));
    }
  
    public function acceptVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->status = 'accepted';
        $visitor->check_in = now();
        $visitor->update();
        return redirect()->route('viewVisitor', $id)->with('success', 'Visitor accepted successfully');
    }

    public function rejectVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->status = 'rejected';
        $visitor->update();
        return redirect()->route('viewVisitor', $id)->with('success', 'Visitor rejected successfully');
    }

    public function generateVisitorCard($id)
    {
        $visitor = Visitor::with('employee')->findOrFail($id);
        return view('visitors.card', compact('visitor'));
    }

    public function deleteVisitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();
        
        return redirect()->route('visitorsList')->with('success', 'Visitor deleted successfully');
    }   
    
}
