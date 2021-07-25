<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getList()
    {
        $service = Service::get();
        return view('admin.services.serviceList', ['services' => $service]);
    }
    public function getAdd()
    {
        $service = Service::all();
        return view('admin.services.serviceAdd', ['services' => $service]);
    }
    public function postAdd(Request $request)
    {
        try {
            // dump($request->all());
            $name = $request->name;
            $icon = $request->icon;
            $nameIcon = $icon->getClientOriginalName();
            $link = $icon->move('upload/services', $nameIcon);
            //hàm tạo mới
            $add = Service::create([
                'name' => $name,
                'icon' => $nameIcon,
            ]);
            if ($add) {
                return redirect()->route('service.getList');
            }
        } catch (\Exception $th) {
            dump($th->getMessage());
        }
    }

    public function getUpdate(Request $request)
    {
        //lấy id
        $id = $request->id;
        $service = Service::all();
        $detailService = Service::where('id', $id)->first();

        // dump($detailService);
        return view('admin.services.serviceUpdate', ['detail' => $detailService]); //sự ngu dốt của Cụt lần 2 ngu vcl
    }

    public function postUpdate(Request $request)
    {
        try {
            $id = $request->id;
            $detailService = Service::where('id', $id)->first();

            $name = $request->name;
            if ($request->icon == "") {
                $nameIcon = $detailService->icon;
            } else {
                $icon = $request->icon;
                $nameIcon = $icon->getClientOriginalName();
                $link = $icon->move('upload/services', $nameIcon);
            }
            $update = Service::where('id', $id)->update([
                'name' => $name,
                'icon' => $nameIcon
            ]);
            if ($update) {
                return redirect()->route('service.getList');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
