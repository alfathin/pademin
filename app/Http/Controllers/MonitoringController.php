<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Room;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function view(){
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'rooms' => Room::all()
        ]);
    }

    public function viewMonitoring($id)
    {
        return view('admin.monitoring', [
            'title' => 'Monitoring',
            'monitorings' => Monitoring::where('room_id', $id)
                                    ->orderBy('updated_at', 'desc')
                                    ->get()
        ]);
    }

    public function add($id)
    {
        // Menemukan ruangan berdasarkan ID
        $room = Room::findOrFail($id);

        // Jika ruangan tidak memiliki perangkat
        if ($room->device->isEmpty()) {
            // Membuat objek monitoring baru untuk ruangan tanpa perangkat
            $monitoring = new Monitoring();
            $monitoring->room_id = $room->id;  // Menetapkan ID ruangan

            // Mengambil data dari ruangan
            $monitoring->temperature = $room->temperature;
            $monitoring->smoke_level = $room->smoke_level;

            // Menyimpan data monitoring ke database
            $monitoring->save();

            // Redirect kembali dengan pesan sukses
            return redirect('/admin_monitoring/' . $id)->with("success", "Berhasil Monitoring");
        }

        // Looping perangkat yang terkait dengan ruangan
        foreach ($room->device as $device) {
            // Membuat objek monitoring baru untuk setiap perangkat
            $monitoring = new Monitoring();
            $monitoring->room_id = $room->id;  // Menetapkan ID ruangan
            $monitoring->device_id = $device->id;  // Menetapkan ID perangkat

            // Mengambil data dari ruangan dan perangkat
            $monitoring->temperature = $room->temperature;
            $monitoring->smoke_level = $room->smoke_level;
            $monitoring->water_pressure = $device->water_pressure;
            $monitoring->battery_percentage = $device->battery_percentage;
            $monitoring->servo_sensitivity = $device->servo_setting;

            // Menyimpan data monitoring ke database
            $monitoring->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect('/admin_monitoring/' . $id)->with("success", "Berhasil Monitoring");
    }

    
}
