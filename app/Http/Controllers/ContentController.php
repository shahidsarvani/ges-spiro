<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Media;
use App\Models\Menu;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contents = Content::latest()->get();
        return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('contents.create', compact('menus'));
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
        $content = Content::create($data);
        if ($content) {
            if ($request->file_names) {
                foreach ($request->file_names as $index => $fileName) {
                    $media = Media::create([
                        'name' => $fileName,
                        'menu_id' => $request->menu_id,
                        'file_type' => $request->types[$index],
                    ]);
                }
            }
            return redirect()->route('contents.index')->with('success', 'Content Added');
        } else {
            return redirect()->route('contents.index')->with('error', 'Error Adding Content');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
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
        $media = Media::where('menu_id', $content->menu_id)->get();
        return view('contents.edit', compact('content', 'menus', 'media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
        $data = $request->except('_token', '_method');
        $res = $content->update($data);
        if ($res) {
            if ($request->file_names) {
                foreach ($request->file_names as $index => $fileName) {
                    $media = Media::create([
                        'name' => $fileName,
                        'menu_id' => $request->menu_id,
                        'file_type' => $request->types[$index],
                    ]);
                }
            }
            return redirect()->route('contents.index')->with('success', 'Content Updated');
        } else {
            return redirect()->route('contents.index')->with('error', 'Error Updating Content');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
