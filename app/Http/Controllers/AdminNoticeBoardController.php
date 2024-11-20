<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeBoard;
use Illuminate\Support\Facades\Storage;

class AdminNoticeBoardController extends Controller
{
    /**
     * Display a listing of the notices.
     */
    public function index()
    {
        $notices = NoticeBoard::all();
        return view('admin.noticeManagement', compact('notices'));
    }


    /**
     * Store a newly created notice in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
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

            // Create new notice
            NoticeBoard::create([
                'title' => $request->title,
                'date' => $request->date,
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.noticeboard.index')->with('success', 'Notice created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.noticeboard.index')->with('error', 'Failed to create notice. Please try again.');
        }
    }




    /**
     * Show the form for editing the specified notice.
     */
    public function edit($id)
    {
        $notice = NoticeBoard::findOrFail($id);
        return view('admin.noticeboard.edit', compact('notice'));
    }

    /**
     * Update the specified notice in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $notice = NoticeBoard::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($notice->image && file_exists(public_path($notice->image))) {
                unlink(public_path($notice->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Generate a unique file name
            $imagePath = 'images/' . $imageName; // Set the custom path
            $image->move(public_path('images'), $imageName); // Move the file to the `public/images` directory

            $notice->image = $imagePath; // Update the image path
        }

        // Update notice details
        $notice->update([
            'title' => $request->title,
            'date' => $request->date,
            'image' => $notice->image, // Ensure the updated image path is saved
            'description' => $request->description,
        ]);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice updated successfully!');
    }


    /**
     * Remove the specified notice from storage.
     */
    public function destroy($id)
    {
        $notice = NoticeBoard::findOrFail($id);

        // Delete the image file if exists
        if ($notice->image) {
            Storage::disk('public')->delete($notice->image);
        }

        $notice->delete();

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
    }
}

