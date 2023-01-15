<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Lobby;


class LobbyAPIController extends Controller
{
    //

    public function create(Request $request){

        $fields = $request->validate([
            'LobbyName' => 'required|string',
            'HostName' => 'required|string|exists:users,name',
            'CurrentPlayers' => 'required|integer',
            'MaxPlayers' => 'required|integer',
            'HostIP' => 'required|ip',
        ]);

        $lobby = Lobby::create([
            'LobbyName' => $fields['LobbyName'],
            'HostName' => $fields['LobbyName'],
            'CurrentPlayers' => $fields['CurrentPlayers'],
            'MaxPlayers' => $fields['MaxPlayers'], 
            'HostIP' => $fields['HostIP'], 
        ]);

        return [
            'message' => 'Lobby Created'
        ];

    }
}
