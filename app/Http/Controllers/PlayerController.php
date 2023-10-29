<?php

namespace App\Http\Controllers;


use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Inertia\Inertia;
use App\Models\Member;
use Request;
use DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //A leader board screen to list the members with the top 10 average scores, for those
        //members who have played at least 10 matches

        $members =  DB::table('members')
            ->join('players', 'members.id', '=', 'players.member_id')
            ->select('members.id', 'members.first_name', 'members.last_name','members.email','members.phone',
                DB::raw('AVG(players.score) as average_score'),
            )

            ->groupBy('members.id', 'members.first_name','members.last_name','members.email','members.phone')
            ->havingRaw('COUNT(players.id) >= 10')
            ->orderByDesc('average_score')
            ->take(10)
            ->get();

        return Inertia::render('Leader/Index', ['members' => $members]);
    }




    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
