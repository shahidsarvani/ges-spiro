@extends('layouts.app')

@section('title', 'Content')

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Content List</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$contents->isEmpty())
                        @foreach ($contents as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->menu_title }}</td>
                                <td>{{ $value->title ?? 'N/A' }}</td>
                                <td>{{ $value->sub_title ?? 'N/A' }}</td>
                                <td>
                                    <div class="list-icons">
                                        <a href="{{ route('contents.edit', $value->id) }}"
                                            class="list-icons-item text-primary-600">
                                            <i class="icon-pencil7"></i>
                                        </a>
                                        <a href="{{ route('contents.destroy', $value->id) }}"
                                            onclick="event.preventDefault(); $('.delete-form{{ $value->id }}').submit();"
                                            class="list-icons-item text-danger-600">
                                            <i class="icon-trash"></i>
                                        </a>
                                        <form action="{{ route('contents.destroy', $value->id) }}" method="post"
                                            class="d-none delete-form{{ $value->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <input type="hidden" name="id" value="{{ $value->id }}"> --}}
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Data Available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
