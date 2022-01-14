<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client as Client;
use App\Models\Room as Room;
use App\Models\Reservation as Reservation;

class ReservationsController extends Controller
{ 
    //
    public function bookRoom ($client_id, $room_id, $date_in, $date_out)
    {
        $reservation = new Reservation();
        $client_instance = new Client();
        $room_instance = new Room();

        $client = $client_instance->find($client_id);
        $room = $room_instance->find($room_id);
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;

        $reservation->room()->associate($room);
        $reversation->client()->associate($client);
        $reservation->save();

        return redirect()->route('clients');

        // return view('reservations/bookRoom');
    }
}
