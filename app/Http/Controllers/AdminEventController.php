<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.eventsmanagement', compact('events'));
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:upcoming,past',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        try {
            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'images/' . $imageName;
                $image->move(public_path('images'), $imageName);
            }

            // Create new event
            Event::create([
                'title' => $request->title,
                'author_name' => $request->author_name,
                'date' => $request->date,
                'status' => $request->status,
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.eventsmanagement.index')->with('error', 'Failed to create event. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.eventsmanagement.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:upcoming,past',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $event = Event::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName;
            $image->move(public_path('images'), $imageName);
            $event->image = $imagePath;
        }

        // Update event details
        $event->update([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'date' => $request->date,
            'status' => $request->status,
            'image' => $event->image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete the image file if exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event deleted successfully!');
    }
}
