<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $all_menus = Menu::with('parent')->get();
        $menus = array();
        foreach ($all_menus as $menu) {
            $title = array();
            if ($menu->parent) {
                array_unshift($title, $menu->parent->title);
                if ($menu->parent->parent) {
                    array_unshift($title, $menu->parent->parent->title);
                    if ($menu->parent->parent->parent) {
                        array_unshift($title, $menu->parent->parent->parent->title);
                        if ($menu->parent->parent->parent->parent) {
                            array_unshift($title, $menu->parent->parent->parent->parent->title);
                        }
                    }
                }
            }
            array_push($title, $menu->title);
            $title = implode(' -> ', $title);
            $temp = [
                'id' => $menu->id,
                'title' => $title
            ];
            array_push($menus, $temp);
        }
        // return $menus;
        return view('menues.index', compact('menus', 'all_menus'));
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
        $all_menus = Menu::with('parent')->get();
        $menus = array();
        foreach ($all_menus as $item) {
            $title = array();
            if ($item->parent) {
                array_unshift($title, $item->parent->title);
                if ($item->parent->parent) {
                    array_unshift($title, $item->parent->parent->title);
                    if ($item->parent->parent->parent) {
                        array_unshift($title, $item->parent->parent->parent->title);
                        if ($item->parent->parent->parent->parent) {
                            array_unshift($title, $item->parent->parent->parent->parent->title);
                        }
                    }
                }
            }
            array_push($title, $item->title);
            $title = implode(' -> ', $title);
            $temp = [
                'id' => $item->id,
                'title' => $title
            ];
            array_push($menus, $temp);
        }
        // return $menu;
        // foreach ($menus as $item) {
        //     if($menu->parent_id === $item['id']){
        //         return $item;
        //     }
        // }
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
