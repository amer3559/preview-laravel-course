<?php

namespace App\Http\Controllers;

use App\Enums\TicketCaseEnum;
use App\Events\TicketCreatedOrUpdated;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TicketsImport;
use App\Exports\TicketsExport;

class OperationController extends Controller
{
    public function getRunningTickets()
    {
        $tickets = Ticket::where('status','=', TicketCaseEnum::RUNNING)->with('visitor')->with('doctor')->get();
        return view('pages.operations.index', compact('tickets'));
    }

    public function finishRunningTicket(Request $request, $id)
    {
//        $ticket = Ticket::where('id', $id)->with(['operations' => function ($query) {
//            $query->where('is_running', true);
//        }])->first();

        $r= Ticket::where('id', $id)
            ->update([
                'status' => TicketCaseEnum::FINISHED,
                'diagnosis' => $request->diagnosis,
                'treatment' => $request->treatment,
            ]);
        if ($r){
            return back()->with('success', "Ticket finished Successfully");
        }

    }

    public function getFinishedTickets()
    {
        $tickets = Ticket::where('status','=', TicketCaseEnum::FINISHED)->with('visitor')->with('doctor')->get();
        return view('pages.operations.finished', compact('tickets'));
    }

    public function importTable(Request $request)
    {
        $file = $request->file('file'); // Get the uploaded file
        Excel::import(new TicketsImport, $file); // Import the file using the TicketsImport class

        // Add any additional logic or redirects as needed
    }

    public function exportTable()
    {
        $tickets = Ticket::all(); // Retrieve the data from the database or any other source

        return Excel::download(new TicketsExport($tickets), 'tickets.xlsx');
    }






}
