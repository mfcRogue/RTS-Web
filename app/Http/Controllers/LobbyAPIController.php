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
        ]);
        $HostIP = request()->ip();
        $lobby = Lobby::create([
            'LobbyName' => $fields['LobbyName'],
            'HostName' => $fields['LobbyName'],
            'CurrentPlayers' => $fields['CurrentPlayers'],
            'MaxPlayers' => $fields['MaxPlayers'], 
            'HostIP' => $HostIP, 
        ]);

        return [
            'message' => 'Lobby Created'
        ];

    }

    public function destroy(Request $request)
    {
        $fields = $request->validate([
            'LobbyName' => 'required|string|exists:lobbies,LobbyName',
            'HostName' => 'required|string|exists:users,name',
        ]);
    
        $model = Lobby::where('HostName', $fields['HostName'])
        ->where('LobbyName', $fields['LobbyName'])
        ->delete();
    }

    public function getInfo(Request $request)
    {
       
        $fields = $request->validate([
            'LobbyName' => 'required|string|exists:lobbies,LobbyName',
            'HostName' => 'required|string|exists:users,name',
        ]);
    

        $model = Lobby::where('HostName', $fields['HostName'])
        ->where('LobbyName', $fields['LobbyName'])
        ->first();
        return response()->json($model);

    }

    public function getAll(Request $request)
    {
       
        $model = Lobby::all();
        return response()->json($model);
    }
    public function leave(Request $request)
    {

    }
    public function join(Request $request)
    {
        
    }
}
