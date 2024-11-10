<?php

namespace App\Http\Controllers;

use App\Models\Room;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomController extends Controller
{
    public function view(){
        return view('admin.rooms', [
            'rooms' => Room::all(),
            'title' => 'Ruangan'
        ]);
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required|max:100|unique:rooms,name',
            'temperature' => 'nullable|numeric',
            'smoke_level' => 'nullable|integer',
        ]);

        $room = new Room();
        $room->name = $data['name'];
        $room->temperature = $data['temperature'] ?? null;
        $room->smoke_level = $data['smoke_level'] ?? null;
        $room->save();

        return redirect('/admin_rooms')->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    public function postEdit(Request $request, $id){
        try {
            $room = Room::findOrFail($id);
            $data = $request->validate([
                'name' => 'required|max:100|unique:rooms,name,' . $room->id,
                'temperature' => 'nullable|numeric',
                'smoke_level' => 'nullable|integer',
            ]);


            $room->name = $data['name'];
            $room->temperature = $data['temperature'] ?? null;
            $room->smoke_level = $data['smoke_level'] ?? null;
            $room->save();

            return redirect('/admin_rooms')->with('success', 'Data ruangan berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()
                            ->withErrors($e->validator)
                            ->withInput();
        }
    }

    public function delete($id){
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect('admin_rooms')->with('success', 'Data ruangan berhasil dihapus.');
    }
}
