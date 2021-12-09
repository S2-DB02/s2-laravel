<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\TicketResource;
use App\ticket;
use App\comment;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTicket;
use phpDocumentor\Reflection\Types\Integer;

class TicketController extends Controller
{

    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ticket = ticket::paginate(20);
//        switch ($request->query("order")) {
//            case "priorityAsc":
//                $ticket = ticket::orderBy("priority", "desc")->paginate(20);
//                return view('Tickets.dashboard', ['ticket' => $ticket]);
//                break;
//            default:
//                echo "";
//        }
//        if (url()->current() == config('app.externalconnection')."/api/ticket") {
//            // return new TicketResource::collection(ticket::all());
//            return view('dashboard.dashboard', ['ticket' => $ticket]);
//        }
//        PRIORITY DESC
        if ($request->query("order") === "priorityasc"){
            $ticket = ticket::orderBy("priority", "desc")->paginate(20);
            return view('Tickets.dashboard', ['ticket' => $ticket]);
        }

        //PRIORITY ASC
        else if ($request->query("order") === "prioritydesc" ){
            $ticket = ticket::orderBy("priority", "asc")->paginate(20);
            return view('Tickets.dashboard', ['ticket' => $ticket]);
        }

        else if ($request->query("order") === "status" ) {
            $ticket = ticket::orderBy("status", "asc")->paginate(20);
            //STATUS

        }
        //TICKETS
        else if ($request->query("order") === "tickets"){
            $ticket = ticket::orderBy("name", "asc")->paginate(20);
        }


        //date created
        else if ($request->query("order") === "dateCreated"){
            $ticket = ticket::orderBy("created_at", "desc")->paginate(20);
        }

        //TYPE
        else if ($request->query("order") === "Media"){
            $ticket = DB::table('tickets')->where("type", "=", 1)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Layout"){
            $ticket = DB::table('tickets')->where("type", "=", 2)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Translation"){
            $ticket = DB::table('tickets')->where("type", "=", 3)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Markup"){
            $ticket = DB::table('tickets')->where("type", "=", 4)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Other"){
            $ticket = DB::table('tickets')->where("type", "=", 5)->orderBy("priority", "desc")->paginate(20);
        }

        //FILTERS

        //ACTIVE
        else if ($request->query("order") === "NotAssigned"){
            $ticket = DB::table('tickets')->where("status", "=", 1)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Active"){
            $ticket = DB::table('tickets')->where("status", "=", 2)->orderBy("priority", "desc")->paginate(20);
        }
        else if ($request->query("order") === "Closed"){
            $ticket = DB::table('tickets')->where("status", "=", 3)->orderBy("priority", "desc")->paginate(20);
        }

        //PRIORITY
        else if ($request->query("order") === "Low"){
            $ticket = DB::table('tickets')->where("priority", "=", 1)->paginate(20);
        }
        else if ($request->query("order") === "Medium"){
            $ticket = DB::table('tickets')->where("priority", "=", 2)->paginate(20);
        }
        else if ($request->query("order") === "High"){
            $ticket = DB::table('tickets')->where("priority", "=", 3)->paginate(20);
        }

        //Title alphabetic
        else if ($request->query("order") === "AtoZ"){
            $ticket = ticket::orderBy("name", "asc")->paginate(20);
        }
        else if ($request->query("order") === "ZtoA"){
            $ticket = ticket::orderBy("name", "desc")->paginate(20);
        }

        //Ticket alphabetic
        else if ($request->query("order") === "1toMax"){
            $ticket = ticket::orderBy("id", "asc")->paginate(20);
        }
        else if ($request->query("order") === "Maxto1"){
            $ticket = ticket::orderBy("id", "desc")->paginate(20);
        }
        return view('Tickets.dashboard', ['ticket' => $ticket]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreTicket  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        $validated = $request->validated();
        //Storage::disk('uploads')->putFileAs('/', $request->file('photo'), 'name.png');
        if (ticket::create($validated)) {
            if (url()->current() == config('app.externalconnection')."/api/ticket") {
                $this->addPoints($request->madeBy, 10);
                return view('errors.ticket-success');
            }else {
                return back()->with('success', 'Success!');
            }

        } else {
            if (url()->current() == config('app.externalconnection')."/api/ticket") {
                return "error!";

            }else {
                return back()->with('error', 'Something went wrong!');
            }
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        $user  = User::all();
        if (url()->current() == config('app.externalconnection')."/api/ticket/$ticket->id") {
            return new TicketResource($ticket);
        } else {
            return view('Tickets.ticketDetailH', [
            'ticket' => $ticket,
            'users' => $user
            ]);
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
     * @param  \Illuminate\Http\StoreTicket  $request
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTicket $request, ticket $ticket)
    {
        $newTicket = ticket::find($ticket->id);
        $newTicket->name = $request->name;
        $newTicket->priority = $request->priority;
        $newTicket->status = $request->status;
        $newTicket->type = $request->type;
        $newTicket->developer = $request->developer;
        $newTicket->remark = $request->remark;

        if ($newTicket->save()) {
            return back()->with('success','Success :)');
        } else {
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

    public function destroy(ticket $ticket,Request $request)
    {
        $tickets = ticket::find($request->id);
        $tickets->delete();
        return redirect('ticket');
    }

    /**
     * Soort by
     */
    public function sort()
    {
    }
    public function addPoints(int $userId, int $totalPoints)
    {
        $user = User::find($userId);
        $user->points = $user->points + $totalPoints;
        $user->save();
    }
}
