<?php

namespace App\Listeners;

use App\Events\TicketCreatedOrUpdated;
use App\Models\Operation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InsertOperationRecord
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TicketCreatedOrUpdated  $event
     * @return void
     */
    public function handle(TicketCreatedOrUpdated $event)
    {
        // Access the ticket model from the event
        $ticket = $event->ticket;
        // Insert a record in another model
        $anotherModel = new Operation();
        $anotherModel->ticket_id = $ticket->id;
//        $anotherModel->status = $ticket->status;
        // Set other fields as needed
        $anotherModel->save();
    }
}
