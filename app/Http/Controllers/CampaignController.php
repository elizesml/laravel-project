<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidationRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * ADMIN API
 * Campaign CRUD Functions
 */
class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return view('admin.index', [
            'campaigns' => $campaigns
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $status_code = array( "1" => "Active", "0" => "Disabled" );

        return view('admin.create_campaign')->with('status_code', $status_code);
    }

    /**
     * Store a newly created resource in storage
     * Used only for newly created objects
     */
    public function store(FormValidationRequest $request)
    {
        $request->validated();

        if ($request->image != null) {
            $newImageName = 'img-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newImageName = null;
        };

        Campaign::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'active' => $request->active_status,
            'image_path' => $newImageName
        ]);

        return redirect('/admin');
    }

    // Display the specified resource
    public function show($id)
    {
        $campaign = Campaign::find($id);

        return view('admin.show_details')->with('campaign', $campaign);
    }

    /**
     * Show the form for editing the specified resource.
     * Retrieve more details about an individual Object
     */
    public function edit($id)
    {
        $status_code = array( "1" => "Active", "0" => "Disabled" );

        $campaign = Campaign::find($id);
        
        return view('admin.edit_campaign')->with([
            'campaign' => $campaign,
            'status_code' => $status_code
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Commit the update
     */
    public function update(FormValidationRequest $request, $id)
    {
        $request->validated();

        if ($request->image != null) {
            $newImageName = 'img-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newImageName = null;
        };

        Campaign::where('id', $id)->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'active' => $request->active_status,
            'image_path' => $newImageName
        ]);

        return redirect('/admin');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        $image_path = $campaign->image_path;

        //Delete unused file from directory
        if ($image_path != null) {
            File::delete(public_path('images/' . $image_path));
        }

        $campaign->delete();

        return redirect("/admin");
    }
}
