<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThankResource;
use App\Models\Thank;
use App\Models\Torrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $torrentId = $request->torrent_id;
        $thanks = Thank::query()
            ->where('torrentid', $torrentId)
            ->whereHas('user')
            ->with(['user'])
            ->paginate();
        $resource = ThankResource::collection($thanks);
        $resource->additional([
            'page_title' => nexus_trans('thank.index.page_title'),
        ]);

        return $this->success($resource);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['torrent_id' => 'required']);
        $torrentId = $request->torrent_id;
        $torrent = Torrent::query()->findOrFail($torrentId, Torrent::$commentFields);
        $torrent->checkIsNormal();
        $user = Auth::user();
        if ($user->thank_torrent_logs()->where('torrentid', $torrentId)->exists()) {
            throw new \LogicException("you already thank this torrent");
        }
        $result = $user->thank_torrent_logs()->create(['torrentid' => $torrentId]);
        $resource = new ThankResource($result);
        return $this->success($resource);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
