@extends('layouts.app')

@section('title', 'Add Media Thumbnail')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Add Media Thumbnail</h5>
                </div>
                
                <form action="{{ route('media.update', $media->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thumbnail:</label>
                                    <input type="file" name="video_thumbnail" id="video_thumbnail" class="form-control-uniform" accept="image/*" value="{{ $media->video_thumbnail }}" data-fouc>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update <i
                                class="icon-plus-circle2 ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script></script>
@endsection
