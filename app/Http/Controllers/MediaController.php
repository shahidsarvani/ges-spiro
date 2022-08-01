<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $media = Media::all();
        // return $media;
        return view('media.index', compact('media'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $media = Media::find($id);
        return view('media.edit', compact('media'));
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
        //
        // return $request->file('video_thumbnail');
        $media = Media::find($id);
        if ($file = $request->file('video_thumbnail')) {
            $mediaPath = $media->getMediaPath();
            if($media->video_thumbnail) {
                Storage::delete(['/' . $mediaPath . '/' . $media->video_thumbnail]);
            }
            $name = time() . $file->getClientOriginalName();
            $file->storeAs($mediaPath, $name);
            $media->update([
                'video_thumbnail' => $name
            ]);
            return redirect()->route('media.index')->with('success', 'Thumbnail Updated');
        } else {
            return back()->with('error', 'File not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return $id;
        try {
            $media = Media::find($id);
            $mediaPath = $media->getMediaPath();
            Storage::delete(['/' . $mediaPath . '/' . $media->name]);
            $deleted = $media->delete();
            if ($deleted) {
                return back()->with('deleted', 'Media Deleted');
            } else {
                return back()->with('warning', 'Media could not be deleted');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function upload_media_dropzone(Request $request)
    {
        // create the file receiver
        $receiver = new FileReceiver("media", $request, HandlerFactory::classFromRequest($request));

        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    protected function saveFile(UploadedFile $file)
    {
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        $type = explode('-', $mime)[0];
        // Group files by the date (week
        $dateFolder = date("Y-m-W");

        // Build the file path 
        $media = new Media();
        $filePath = $media->getMediaPath();
        // $filePath = "upload/{$mime}/{$dateFolder}/";
        $finalPath = storage_path("app/" . $filePath);

        // move the file name
        $file->move($finalPath, $fileName);

        // Media::create([
        //     'name' => $fileName
        // ]);
        Log::info($finalPath . $fileName);
        // $media = FFMpeg::getMedia($finalPath.$fileName);
        // $durationInMiliseconds = $media->getDurationInMiliseconds();
        // $getID3 = new \getID3;
        // $video_file = $getID3->analyze($finalPath.$fileName);
        // $duration_seconds = $video_file['playtime_seconds'];
        // Log::info($duration_seconds);

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'type' => $type,
            // 'duration' => $duration_seconds,
            'mime_type' => $mime
        ]);
    }

    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace("." . $extension, "", $file->getClientOriginalName()); // Filename without extension

        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;

        return $filename;
    }
}
