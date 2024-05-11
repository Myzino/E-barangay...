<?php

namespace App\Http\Controllers;     //naa dapat ni sulod sa Http/Controllers/App/ just like UserController pero dili man ga work so gi gawas nalang nako

use Illuminate\Http\Request;
use App\Models\Clearance;

class ClearanceController extends Controller
{
    public function index() {
        $clearances = Clearance::all();  //Fetch all residents from the database
        return view('app.clearance.index', ['clearances' => $clearances]);
    }

    // Method to add a new resident
    public function store(Request $request)
    {
        try {
            // Validate the student data
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'phone' => 'required|numeric|digits_between:11,12', // Age validation rule
                'address' => 'required|string|max:255',
            ], [
                'phone.digits_between' => 'The phone number must be between :min and :max digits.',
            ]);

            // Create a new resident
            Clearance::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                // Add other fields as needed
            ]);

            // Toaster notification when added
            $notification = [
                'message' => 'Resident Added Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('clearance.index')->with($notification);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, show Toastr error notification and flash errors to the session
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; // Get the first error message

            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];

            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }

    // Method to update a resident
    public function update(Request $request, $id)
    {
        try {
            // Validate and update the resident data
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'phone' => 'required|numeric|digits_between:11,12', // Age validation rule
                'address' => 'required|string|max:255',
            ], [
                'phone.digits_between' => 'The phone number must be between :min and :max digits.',
            ]);

            $clearance = Clearance::findOrFail($id);
            $clearance->update($request->all());

            // Toaster notification when updated
            $notification = [
                'message' => 'Resident Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('clearance.index')->with($notification);

        } catch (\Illuminate\Validation\ValidationException $e) {
            
            // If validation fails, show Toastr error notification and flash errors to the session
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; // Get the first error message

            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];

            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }

    // method to delete a specific resident
    public function destroy($id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->delete();

        
        //toaster notif when deleted
        $notification = array ( 
            'message' => 'Resident Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('clearance.index')->with($notification);
    }
}


//In this Controller, I used 2 forms of validation:
//1. $this->validate(): (from editing student) and;
//2. Validator Facade: (from adding student);
//I can use either only one of them for both function but I tried to use both to show you that there are several types of validators and these 2 are some examples, especially when put and post method is involved. Their difference is that #1 is simple and readable but limited control in errors handing, #2 is more code but more control over validation, it also requires this use Illuminate\Support\Facades\Validator;
//From SIS-Laravel-System (in my github)