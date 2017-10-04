<?php

namespace App\Http\Controllers;

use App\Ticket;
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
            //Searches for staff with the same uid and type
             $matchingStaff = Staff::where([
                ['uid', '=', $request->input('uid')],
                ['type', '=', $request->input('type')]])->first();
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

    public function update(Request $request) {
        try {
            $staff = Staff::where('id', '=', $request->input('id'))->first();

            $staff->uid = $request->input('uid');
            $staff->email = $request->input('email');
            $staff->name = $request->input('name');
            $staff->type = $request->input('type');

            if($staff->save()) return $staff;
            throw new HttpException(400, "Invalid data");
        } catch(\Exception $e) {
            return array("status" => $e->getMessage());
        }
    }

    //Returns the assigned tickets for the provided technician
    public function showTickets(Request $request) {
        try {
            $staffId = Staff::where([
                ['uid', '=', $request->input('uid')],
                ['type', '=', $request->input('type')]])->first()->id;
            return Ticket::where('staff_id', '=', $staffId)->get();
            //return response()->json(['staff id' => $staffId, 'tickets'=> $tickets]);
        } catch(\Exception $e) {
            return array("status" => $e->getMessage());
        }
    }

}
