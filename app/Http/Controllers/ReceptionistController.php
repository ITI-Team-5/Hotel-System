<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptionistController extends Controller
{
    
    public function notApproved()
    {
        // using approved_by column in clients table that is related to users table
        $NotApprovedClients = Client::where('approved_by','null')->get();

        return $NotApprovedClients;
    }

    public function Approved()
    {
        // get all approved clients with the names of who approved them
        $ApprovedClients = DB::table('clients')->join('users', 'clients.approved_by', '=', 'users.id')
        ->select('clients.*', 'users.name')
        ->get();

        return $ApprovedClients;
    }

   }
