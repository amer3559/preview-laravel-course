<?php

namespace App\Http\Controllers;

use App\Enums\TicketCaseEnum;
use App\Enums\UserRoleEnum;
use App\Events\TicketCreatedOrUpdated;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('status', TicketCaseEnum::WAITING )->with('visitor')->with('doctor')->get();
        return view('pages.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $visitors = User::where('role', UserRoleEnum::VISITOR )->get();
        $doctors = User::where('role', UserRoleEnum::DOCTOR )->get();
        return view('pages.tickets.create', compact(['visitors', 'doctors']));
    }

    public function store(Request $request)
    {
         $ticket = new Ticket([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'number' => $request->number,
            'status' => $request->status,
            'attendance' => $request->attendance,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,

        ]);

        $r=  $ticket->save();

        if ($r) {
//                event(new TicketCreatedOrUpdated($ticket));
            if ($ticket->status === TicketCaseEnum::RUNNING){
                event(new TicketCreatedOrUpdated($ticket));
            }
            return back()->with('success', "Ticket number:$ticket->number added Successfully");
        }

        return  redirect()->route('tickets.index')->back()->with('msg', 'fail');
    }

    public function edit($id)
    {
        $ticket = Ticket::where('id', $id)
            ->first();
        $visitors = User::where('role', UserRoleEnum::VISITOR )->get();
        $doctors = User::where('role', UserRoleEnum::DOCTOR )->get();

        return view('pages.tickets.edit', compact(['ticket', 'visitors', 'doctors']));
    }

    public function update(Request $request, $id)
    {

        $r= Ticket::where('id', $id)
            ->update([
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'number' => $request->number,
                'status' => $request->status,
                'attendance' => $request->attendance,
                'diagnosis' => $request->treatment,
            ]);
        if ($r){
            if ($request->status === TicketCaseEnum::RUNNING){
                $ticket = Ticket::where('id', $id)
                    ->first();
                event(new TicketCreatedOrUpdated($ticket));
            }
//            elseif (){
//                'time_diff' => Carbon::now()->diffInSeconds($ticket->created_at),
//            }

            return redirect()->route('tickets.index')->with('success', "Ticket number:$request->number updated Successfully");
        }

    }

    public function destroy( $id)
    {
       $r= Ticket::findOrfail($id)->delete();
        if($r) return back()->with('success', "Ticket deleted");
    }

}
