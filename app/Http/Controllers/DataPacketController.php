<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataPacket;

class DataPacketController extends Controller
{
     /**
     * list the data packet data
     */
    public function viewDataPacket()
    {
        $data_packets = DataPacket::all();
        return $data_packets;
    }
    
    /**
     * insert data packet information
     */
    public function insertDataPacket(Request $request){
        $this->validate($request,[
            'device'     => 'required|numeric',
            'time'       =>  'required|numeric',
            'snr'        =>  'required|numeric',
            'station'    =>  'required|min:4|max:191',
            'data'       =>  'required|numeric',
            'avgSnr'     =>  'required|numeric',
            'lat'        =>  'required|numeric',
            'lng'        =>  'required|numeric',
            'rssi'       =>  'required|numeric',
            'seqNumber'  =>  'required|numeric'
          ]);
        // get inputs from the users
        $device = $request->input('device');
        $time = $request->input('time');
        $snr = $request->input('snr');
        $station = $request->input('station');
        $data = $request->input('data');
        $avgSnr = $request->input('avgSnr');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $rssi = $request->input('rssi');
        $seqNumber = $request->input('seqNumber');
        $id = null;

        //insert data into database
        $data_packet = DB::insert('insert into data_packets(id,device,time,snr,station,data,avgSnr,lat,lng,rssi,seqNumber) 
        values (?,?,?,?,?,?,?,?,?,?,?)', 
        [$id,$device,$time,$snr,$station,$data,$avgSnr,$lat,$lng,$rssi,$seqNumber]);

        return $data_packet;

    }
}
