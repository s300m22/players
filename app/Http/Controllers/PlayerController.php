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
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        $players = Player::orderBy('id', 'desc')->get();
        $against_list = Player::get(['first_name']);
        return Inertia::render('Player/Create', [
            'players' => $players,
            'against_list' => $against_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        Player::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'street'    => $request->street,
            'city'      => $request->city,
            'state'     => $request->state,
            'zip_code'  => $request->zip_code,
            'country'   => $request->country,
            'location'   => $request->location,
            'match_date'   => $request->match_date,
            'against'   => $request->against,
        ]);

        return redirect()->route('player.create')->with('message', 'Player data has been created successfully');
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
    public function update(UpdatePlayerRequest $request)
    {

        Player::where('id',$request->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'street'    => $request->street,
            'city'      => $request->city,
            'state'     => $request->state,
            'zip_code'  => $request->zip_code,
            'country'   => $request->country,
        ]);

        return redirect()->route('player.create')->with('message', 'Player data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
