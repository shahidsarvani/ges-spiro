<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::with('parent')->get();
        // return $menus;
        return view('menues.index', compact('menus'));
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
        //
        // return $request;
        $data = $request->except('_token');
        if (!$request->parent_id) {
            $data['parent_id'] = 0;
        }
        // return $data;
        $menu = Menu::create($data);
        if ($menu) {
            return back()->with('success', 'Menu Added');
        } else {
            return back()->with('error', 'Error Adding Menu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        $menus = Menu::with('parent')->get();
        return view('menues.edit', compact('menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
        // return $request;
        $data = $request->except('_token', '_method');
        if (!$request->parent_id) {
            $data['parent_id'] = 0;
        }
        // return $data;
        $res = $menu->update($data);
        if ($res) {
            return redirect()->route('menus.index')->with('success', 'Menu Updated');
        } else {
            return redirect()->route('menus.index')->with('error', 'Error Updating Menu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        // return $menu;
        $res = $menu->delete();
        if ($res) {
            return redirect()->route('menus.index')->with('success', 'Menu Deleted');
        } else {
            return redirect()->route('menus.index')->with('error', 'Error Deleting Menu');
        }
    }
}
