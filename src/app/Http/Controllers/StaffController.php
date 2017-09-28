<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StaffController extends Controller
{
    //Returns all tickets
    public function index() {
        return Staff::all();
    }

    //Returns ticket requested
    public function show($id) {
        return Staff::find($id);
    }

    //Creates a new staff member if none exist with the same uid
    public function store(Request $request) {
        try {
            $matchingStaff = Staff::where('uid', '=', $request->input('uid'))->first();
            if(($matchingStaff !=  null) && ($matchingStaff->type === $request->input('type')))
                    throw new HttpException(400, "Duplicate entry");
            $newStaff = Staff::create(['uid' => $request->input('uid'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'type' => $request->input('type')]);
            if($newStaff->save()) return $newStaff;
            throw new HttpException(400, "Invalid data");
        } catch (\Exception $e) {
            return array("status" => $e->getMessage());
        }
    }

}
