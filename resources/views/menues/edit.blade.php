@extends('layouts.app')

@section('title', 'Menus')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Menu</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('menus.update', $menu->id) }}" method="post" id="screen-form">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input type="text" class="form-control" name="title" value="{{ $menu->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>URL:</label>
                                    <input type="text" class="form-control" name="url" value="{{ $menu->url }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position:</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="">Select Position</option>
                                        <option value="left" @if($menu->position == "left") selected @endif>Left</option>
                                        <option value="right" @if($menu->position == "right") selected @endif>Right</option>
                                        <option value="bottom" @if($menu->position == "bottom") selected @endif>Bottom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent Menu:</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="">Select Parent Menu</option>
                                        @foreach ($menus as $item)
                                            <option value="{{ $item->id }}" @if($menu->parent_id == $item->id) selected @endif>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
