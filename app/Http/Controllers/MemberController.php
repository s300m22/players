<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Player;
use Inertia\Inertia;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Retrieve all members desc
        $members = Member::orderBy('id', 'desc')->get();
        return Inertia::render('Member/Create', [
            'members' => $members,
        ]);
    }

    public function profile(){

        //Retrieve count number of winning players
        $win = Player::where('win_or_loss', 'win')->count();

        //Retrieve count number of loser players
        $loss = Player::where('win_or_loss', 'loss')->count();

        //Retrieve The highest winning player against whom, when and where
        $highest_score = DB::table('players')
            ->join('members', 'players.member_id', '=', 'members.id')
            ->select(
                'players.score',
                'players.match_date',
                'players.location',
                'players.against',
                'members.first_name',
                'members.last_name'
            )
            ->orderByDesc('players.score')
            ->first();

        //Retrieve the average score
        $average_score = Player::avg('score');

        return Inertia::render('PlayerProfile/Index', [
            'num_win'           => $win,
            'num_loss'          => $loss,
            'average_score'     => $average_score,
            'highest_score'     => $highest_score
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        // Create Members
        Member::create([

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

        return redirect()->route('member.create')->with('message', 'Member data has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request)
    {
        // Update Members
        Member::where('id',$request->id)->update([

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

        return redirect()->route('member.create')->with('message', 'Member data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
