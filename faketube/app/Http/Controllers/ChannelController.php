<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    //GET: companies (SELECT)
    public function index()
    {
        //
        $channels = Channel::orderBy('id','desc')->paginate(5);
        return view("index", compact("channels"));
    }

    //ADD (INSERT): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
    //GET: channels/create
    public function create()
    {
        //
        return view("create");
    }


    public function store(Request $request)
    {
        // Create a Channel instance
        $channel = new Channel([
            'ChannelName' => $request->input('ChannelName'),
            'Description' => $request->input('Description'),
            'SubcribersCount' => $request->input('SubcribersCount'),
            'URL' => $request->input('URL'),
            // Add other fields as needed
        ]);

        // Save the Channel instance to the database
        $channel->save();

        return redirect()->route('channels.index')->with('success', 'Channel has been created successfully.');
    }

    //GET; channels/{channel}
    public function show(string $id)
    {
        //ORM
        //$channel = Channel::find($id);
        //Query Builder $channel = DB::table("channels")->where('id',15)->first();
        //Raw SQL
        $channel = DB::selectOne("SELECT * FROM channels WHERE id = ?", [15]);
        return response()->json($channel);
    }

    //EDIT (UPDATE): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
    //GET: channels/{channel}/edit
    public function edit(string $id)
    {
        //
        $channel = Channel::find($id);
        return view("edit", compact('channel'));
    }

    //PUT: channels/{channel}
    public function update(Request $request, string $id)
    {
        // Validate and update the employee data
        $channel = Channel::findOrFail($id);
        $channel->ChannelName = $request->input('ChannelName');
        $channel->Description = $request->input('Description');
        $channel->SubcribersCount = $request->input('SubcribersCount');
        $channel->URL = $request->input('URL');
        $channel->save();

        return redirect()->route('channels.index')->with('success', 'Channel updated successfully');
    }

    //DELETE: channels/{channel}
    public function destroy(string $id)
    {
        //
        $channel = Channel::find($id);
        $channel->delete();

        return redirect()->route('channels.index')->with('success', 'Channel deleted successfully');
    }
}
