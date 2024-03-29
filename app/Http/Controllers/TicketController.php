<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\Module;
use Auth;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Modules\Seatmap\Entities\SeatMaps;

class TicketController extends Controller
{
    public function index($id, $name)
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $event = Event::find($id);
        $ticket = Ticket::where([['event_id', $id], ['is_deleted', 0]])->orderBy('id', 'DESC')->get();
        return view('admin.ticket.index', compact('ticket', 'event'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $event = Event::find($id);
        $seatModule = Module::where('module', 'Seatmap')->first();
        if ($seatModule->is_enable == 1 && $seatModule->is_install == 1) {
            $seatMaps = SeatMaps::where('organizer_id', auth()->user()->id)->get();
            $tickets = Ticket::where('seatmap_id', '!=', Null)->get();
            foreach ($tickets as $value) {
                foreach ($seatMaps as $key => $map) {
                    if ($map->id == $value->seatmap_id) {
                        unset($seatMaps[$key]);
                    }
                }
            }
            return view('admin.ticket.create', compact('event', 'seatModule', 'seatMaps'));
        }
        return view('admin.ticket.create', compact('event', 'seatModule'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'quantity' => 'bail|required',
            'start_time' => 'bail|required',
            'end_time' => 'bail|required',
            'type' => 'bail|required',
            'ticket_per_order' => 'bail|required',
            'price' =>  'bail|required_if:type,paid',
        ]);
        $data = $request->all();
        if ($request->type == "free") {
            $data['price'] = 0;
        }
        $data['ticket_number'] = chr(rand(65, 90)) . chr(rand(65, 90)) . '-' . rand(999, 10000);
        $event = Event::find($request->event_id);
        $data['user_id'] = $event->user_id;
        Ticket::create($data);

        return redirect($request->event_id . '/' . preg_replace('/\s+/', '-', $event->name) . '/tickets')->withStatus(__('Ticket has added successfully.'));
    }

    public function show(Ticket $ticket)
    {
    }

    public function edit($id)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ticket = Ticket::find($id);
        $event = Event::find($ticket->event_id);

        return view('admin.ticket.edit', compact('ticket', 'event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required',
            'quantity' => 'bail|required',
            'start_time' => 'bail|required',
            'end_time' => 'bail|required',
            'type' => 'bail|required',
            'ticket_per_order' => 'bail|required',
            'price' =>  'bail|required_if:type,paid',
        ]);
        $data = $request->all();
        if ($request->type == "free") {
            $data['price'] = 0;
        }
        $event = Event::find($request->event_id);
        Ticket::find($id)->update($data);
        return redirect($request->event_id . '/' . preg_replace('/\s+/', '-', $event->name) . '/tickets')->withStatus(__('Ticket has updated successfully.'));
    }

    public function destroy(Ticket $ticket)
    {
    }

    public function deleteTickets($id)
    {
        try {
            $ticket = Ticket::find($id)->update(['is_deleted' => 1]);
            return true;
        } catch (Throwable $th) {
            return response('Data is Connected with other Data', 400);
        }
    }
}
