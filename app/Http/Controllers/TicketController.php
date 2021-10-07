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
    public function index()
    {
        //
        
        $ticket = ticket::paginate(20);
        if (url()->current() == "http://127.0.0.1:8000/api/ticket") {
            // return new TicketResource::collection(ticket::all());
        }else {
            return view('dashboard.testdashboard', ['ticket' => $ticket]);
        }
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
        // dd($ticket);
        return view('dashboard.ticketDetail', ['ticket' => $ticket]);
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
        $ticket = ticket::find($ticket->id);
        $ticket = $request;
        $ticket->save();
        return view();
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
    public function soort()
    {
        
    }
}
