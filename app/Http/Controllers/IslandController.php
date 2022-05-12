<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Island;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Island::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'title' => 'required',
            'ilvl' => 'required',
            'mokokosTotal' => 'required',
            'soulType' => 'required',
            'islandType' => 'required'

        ]);
        return Island::create($request->all());*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return $user->islands;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $island_id =$request->request->get('id');
        $pivot = $request->request->get('pivot');
        $user->islands()->sync([$island_id => [
            'isFavorite' => $pivot['isFavorite'],
            'mokokosGotten' => $pivot['mokokosGotten'],
            'soulGotten' => $pivot['soulGotten']
        ]], false);

        return $user->islands;
        /*
        $island = Island::find($id);
        $island->update($request->all());
        return $island;
        */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return Island::destroy($id);
    }
    /**
     * Search for a title
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Island::where('title', 'like', '%'.$title)->get();
    }
}
