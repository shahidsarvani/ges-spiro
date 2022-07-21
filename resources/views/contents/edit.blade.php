@extends('layouts.app')

@section('title', 'Content')

@section('scripts')
    <script src="{{ asset('assets/global/js/plugins/uploaders/dropzone.min.js') }}"></script>
    <style>
        .card-img {
            position: relative;
        }

        .card-img .video-content {
            position: absolute;
            top: 10px;
            right: 10px;
        }

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Content</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('contents.update', $content->id) }}" method="post" id="screen-form">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $content->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sub Title:</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ $content->sub_title }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Menu:</label>
                                    <select name="menu_id" id="menu_id" class="form-control" required>
                                        <option value="">Select Menu</option>
                                        @foreach ($menus as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($content->menu_id == $item->id) selected @endif>{{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea type="text" name="content" class="tinymce form-control">{{ $content->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">

                            </div>
                            <ul id="file-upload-list" class="list-unstyled">
                            </ul>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    <div class="form-group">
                        <label>Upload Media:</label>
                        {{-- <input type="file" name="media" class="file-input-ajax" accept="video/*" multiple="multiple" data-fouc> --}}
                        <form action="{{ route('upload_media') }}" class="dropzone" id="dropzone_multiple">
                        </form>
                        <ul id="file-upload-list2" class="list-unstyled">
                        </ul>
                    </div>

                    <div class="row">
                        @if ($media)
                            @foreach ($media as $item)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-img-actions m-1">
                                            @if ($item->file_type == 'image')
                                                <div class="card-img embed-responsive">
                                                    <img src="{{ URL::asset('public/storage/media/' . $item->name) }}"
                                                        alt="" width="100%">
                                                @else
                                                    <div class="card-img embed-responsive embed-responsive-16by9">
                                                        <video
                                                            src="{{ URL::asset('public/storage/media/' . $item->name) }}"
                                                            muted controls></video>
                                            @endif
                                            <div class="video-content">
                                                <a href="{{ route('media.destroy', $item->id) }}"
                                                    onclick="event.preventDefault(); $('.delete-form{{ $item->id }}').submit();"
                                                    class="list-icons-item text-danger-600">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <form action="{{ route('media.destroy', $item->id) }}" method="post"
                                                    class="d-none delete-form{{ $item->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    @endforeach
                @else
                    <h3>No record found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
    <script>
        // function submitForm(e) {
        //     // alert(e)
        //     e.preventDefault();
        // }
        var list = $('#file-upload-list');
        var list2 = $('#file-upload-list2');
        console.log(list)
        // Multiple files
        Dropzone.options.dropzoneMultiple = {
            paramName: "media", // The name that will be used to transfer the file
            dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
            maxFilesize: 10000000000000, // MB
            addRemoveLinks: true,
            chunking: true,
            chunkSize: 10000000,
            // If true, the individual chunks of a file are being uploaded simultaneously.
            parallelChunkUploads: true,
            acceptedFiles: 'video/*, image/*',
            init: function() {
                this.on('addedfile', function() {
                        list2.append('<li>Uploading</li>')
                    }),
                    this.on('sending', function(file, xhr, formData) {
                        formData.append("_token", csrf_token);

                        // This will track all request so we can get the correct request that returns final response:
                        // We will change the load callback but we need to ensure that we will call original
                        // load callback from dropzone
                        var dropzoneOnLoad = xhr.onload;
                        xhr.onload = function(e) {
                            dropzoneOnLoad(e)
                            // Check for final chunk and get the response
                            var uploadResponse = JSON.parse(xhr.responseText)
                            if (typeof uploadResponse.name === 'string') {
                                list.append('<li>Uploaded: ' + uploadResponse.path + uploadResponse.name +
                                    '</li><input type="hidden" name="file_names[]" value="' +
                                    uploadResponse.name +
                                    '" ><input type="hidden" name="types[]" value="' +
                                    uploadResponse.type + '" >')
                            }
                        }
                    })
            }
        };
    </script>
@endsection
