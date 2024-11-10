<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DeviceController extends Controller
{
    public function view() {
        return view('admin.devices', [
            'title' => 'Alat',
            'devices' => Device::all(),
            'rooms' => Room::all()
        ]);
    }
    public function add(Request $request) {
        try {
            $data = $request->validate([
                'name' => 'required|max:50|unique:devices,name',
                'water_pressure' => 'nullable|numeric',
                'battery_percentage' => 'nullable|integer|between:0,100',
                'servo_setting' => 'nullable|integer|between:0,100',
                'room_id' => 'nullable|exists:rooms,id'
            ]);

            // dd($data);

            $device = new Device();
            $device->name = $data['name'];
            $device->water_pressure = $data['water_pressure'] ?? null;
            $device->battery_percentage = $data['battery_percentage'] ?? null;
            $device->servo_setting = $data['servo_setting'] ?? null;
            $device->room_id = $data['room_id'] ?? null;
            $device->save();

            return redirect('/admin_devices')->with('success', 'Perangkat berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()
                            ->withErrors($e->validator)
                            ->withInput();
        }
    }
    public function postEdit(Request $request, $id) {
        try {
            $device = Device::findOrFail($id);
            $data = $request->validate([
                'name' => 'required|max:50|unique:devices,name,' . $device->id,
                'water_pressure' => 'nullable|numeric',
                'battery_percentage' => 'nullable|integer|between:0,100',
                'servo_setting' => 'nullable|integer|between:0,100',
                'room_id' => 'nullable|exists:rooms,id'
            ]);

            $device->name = $data['name'];
            $device->water_pressure = $data['water_pressure'] ?? null;
            $device->battery_percentage = $data['battery_percentage'] ?? null;
            $device->servo_setting = $data['servo_setting'] ?? null;
            $device->room_id = $data['room_id'] ?? null;
            $device->save();

            return redirect('/admin_devices')->with('success', 'Data perangkat berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()
                            ->withErrors($e->validator)
                            ->withInput();
        }
    }

    public function delete($id) {
        $device = Device::findOrFail($id);
        $device->delete();

        return redirect('/admin_devices')->with('success', 'Data perangkat berhasil dihapus.');
    }
}
