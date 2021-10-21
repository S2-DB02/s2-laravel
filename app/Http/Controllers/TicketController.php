<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ticket = ticket::paginate(20);
//        if (url()->current() == "http://127.0.0.1:8000/api/ticket") {
//            // return new TicketResource::collection(ticket::all());
//            return view('dashboard.dashboard', ['ticket' => $ticket]);
//        }


        //PRIORITY DESC
        if ($request->query("priority", "desc") === "desc"){
            $ticket = ticket::orderBy("priority", "desc")->paginate(20);
            return view('dashboard.dashboard', ['ticket' => $ticket]);
        }

        //PRIORITY ASC
        else if ($request->query("priority", "asc") === "asc" ){
            $ticket = ticket::orderBy("priority", "asc")->paginate(20);
            return view('dashboard.dashboard', ['ticket' => $ticket]);
        }

        //STATUS
        else if ($request->query("status", "status") === "status" ) {
            $ticket = ticket::orderBy("status", "asc")->paginate(20);

        }

        //TICKETS
        else if ($request->query("tickets", "asc") === "tickets" ){
            $ticket = ticket::orderBy("name", "asc")->paginate(20);
            return view('dashboard.dashboard', ['ticket' => $ticket]);
        }

        //TICKETS NAME ASCENDING


        //STATUS ASCENDING



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ticket::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {

        if (url()->current() == "http://127.0.0.1:8000/api/ticket/$ticket->id") {
            // dd(ticket::find($ticket->id));
            return new TicketResource($ticket);
        }else {
            return view('dashboard.ticketDetailH', ['ticket' => $ticket]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        //
        return view('', ['ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        //
        $newTicket = ticket::find($ticket->id);
        $newTicket->name = $request->name;
        $newTicket->priority = $request->priority;
        $newTicket->status = $request->status;
        $newTicket->type = $request->type;
        $newTicket->remark = $request->remark;

        if ($newTicket->save()) {
            return back()->with('success','Success :)');
        }else {
            return back()->with('error','Something went wrong :(');
        }
    }

    public function ticketurl($url)
    {
        // $tickets = ticket::where('name', "sequi")->get();
        $tickets = ticket::where('URL',urlencode($url))->get();
        $ids = [];
        foreach ($tickets as $key) {
            array_push($ids, $key->id);
        }
        return TicketResource::collection(ticket::find($ids));

        // return new TicketResource( ticket::where('URL',urlencode($url))->get());

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        //
        $ticket::destroy($ticket->id);
    }
    /**
     * Soort by
     */
    public function sort()
    {
    }
}
