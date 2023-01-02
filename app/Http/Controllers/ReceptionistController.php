<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptionistController extends Controller
{
    
    public function notApprovedClients()
    {
        // using approved_by column in clients table that is related to users table
        $NotApprovedClients = Client::where('approved_by','null')->get();

        return $NotApprovedClients;
    }

    public function ApprovedClients()
    {
        // get all approved clients with the names of who approved them
        $ApprovedClients = DB::table('clients')->join('users', 'clients.approved_by', '=', 'users.id')
        ->select('clients.*', 'users.name')
        ->get();

        return $ApprovedClients;
    }

    public function ClientsReservation()
    {
        // get  approved clients reservations 
        // updating db --> room_id will be in reservations table 
        $ClientsReservation= DB::table('reservations')
        ->join('clients', 'reservations.client_id', '=', 'clients.id')
        ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
        ->select('clients.name', 'reservations.*','rooms.room_no')
        ->get();
    }

   }
