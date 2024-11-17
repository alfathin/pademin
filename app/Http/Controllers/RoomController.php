<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
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

    public function userView(){
        return view('rooms', [
            'title' => 'Ruangan',
            'rooms' => Room::all()
        ]);
    }

    public function monitoring($id) {
    // Cari room berdasarkan ID
        $room = Room::findOrFail($id);

        // Cek apakah room memiliki data monitoring dengan device_id
        $monitoringsWithDevice = Monitoring::select(
                'id', 
                'room_id', 
                'device_id', 
                'temperature', 
                'smoke_level', 
                'water_pressure', 
                'battery_percentage', 
                'servo_sensitivity', 
                'created_at', 
                'updated_at'
            )
            ->where('room_id', $room->id)  // Filter berdasarkan room_id
            ->whereNotNull('device_id')    // Hanya data dengan device_id
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan data terbaru
            ->get()
            ->groupBy('device_id')         // Kelompokkan berdasarkan device_id
            ->map(function ($group) {
                return $group->first();   // Ambil data terbaru dari setiap kelompok
            })
            ->values();                   // Reset index array

        // Jika room tidak memiliki data dengan device_id, ambil data terbaru
        if ($monitoringsWithDevice->isEmpty()) {
            $monitorings = Monitoring::select(
                    'id', 
                    'room_id', 
                    'device_id', 
                    'temperature', 
                    'smoke_level', 
                    'water_pressure', 
                    'battery_percentage', 
                    'servo_sensitivity', 
                    'created_at', 
                    'updated_at'
                )
                ->where('room_id', $room->id) // Filter berdasarkan room_id
                ->whereNull('device_id')      // Hanya data tanpa device_id
                ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu terbaru
                ->get()
                ->groupBy('room_id')         // Kelompokkan berdasarkan device_id
                ->map(function ($group) {
                return $group->first();   // Ambil data terbaru dari setiap kelompok
            })
            ->values();
        } else {
            $monitorings = $monitoringsWithDevice;
        }

        // Return ke view monitoring
        return view('monitoring', [
            'title' => 'Monitoring',
            'monitorings' => $monitorings,
            'room' => $room
        ]);
    }

}
