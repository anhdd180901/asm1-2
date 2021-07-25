<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

    public function __construct(Room $room, Service $service)
    {
        $this->room = $room;
        $this->service = $service;
    }

    public function getList()
    {
        $rooms = Room::with('services')->get();
        // relationship của bảng, thay vì dùng many to many thì join
        // $rooms2 = DB::table('room_services')
        //     ->join('rooms', 'rooms.id', '=', 'room_services.room_id')
        //     ->join('services', 'services.id', '=', 'room_services.service_id')
        //     ->select('rooms.id as roomID', 'services.id as serviceID', 'services.*')
        //     ->get();

        // dump($rooms2);
        // dump($rooms);die;
        return view('admin.rooms.roomList', ['rooms' =>$rooms]);

    }
    public function getAdd()
    {
        // $rooms = Room::simplePaginate(15);
        $service = Service::all();
        return view('admin.rooms.roomAdd', ['service' =>$service]);
    }

    public function postAdd(Request $request)
    {
        //  luu thi` luu id service vao` room_service
        // dd($request->all());
        // $room = new Room();
        // $room = $request->all();
        // dump($request->id);die;
        DB::beginTransaction();//xử lý tuần tự, nếu có 1 luồng xử lý thành công thì sẽ lưu, ngược lại fail sẽ rollback lại dữ liệu bị sửa
        // $serviceID = $request->service_id;
        $room = $this->room->create([
            // 'id' => 1,
            'room_no'=> $request->room_no // theem 1 phong`
        ]);

        //     foreach($serviceID as $service){ // them dich vu cua dung phong` day
        // //         // theem thi` them vao bang nao` ? - room_service - service_id theo id cua bang service (id)
        // //         //  them dich vu vao` dau ? them dich vu vao` phong`(1 phong duy nhat 1 id) dich vu phong` theo phong
        // //         // dump($service);
        //         DB::table('room_services')->insert([
        //             'room_id' => 1,
        //             'service_id' => $service,
        //         ]);
        //     }

            $room->services()->attach($request->service_id);


            DB::commit();//lưu các thay đổi khi thông qua transaction
            return redirect()->route('room.getList');

    }

    public function getEdit(Request $request)
    {
        $service = Service::all();
        // $roomDetail = Room::find($request->id);
        // dump($roomDetail);
        $room = Room::with('services')->where('id',$request->id)->first();
                    //truy vấn sử dụng dữ liệu trong bảng services khi dùng relation n-n
        // dump($room);
        return view('admin.rooms.roomEdit',[
            'service' =>$service,
            'rooms'=>$room->services
        ]);
    }

    public function getDelete(Request $request)
    {
        // dump($request->id);
        $id = $request->id;
        $deleteRoom = Room::where('id',$id)->delete();//xóa id của bảng room
        $deleteRoomServiceByRoomId = RoomService::where('room_id',$id)->delete();//xóa các service liên quan tới id của room ( xóa service id thuộc room id)

        return redirect()->route('room.getList');
    }

}
