<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Visitor;
use hisorange\BrowserDetect\Facade as BrowserDetect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Stevebauman\Location\Facades\Location;

class VisitorController extends Controller
{

    public function index()
    {
        $data = Visitor::orderBy('created_at','desc')->get();
        return view('admin.layout-visitors-list', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function get($id)
    {
        $data = Visitor::find($id);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
      $note=$request->get('note');
      $visitor=Visitor::find($request->get('id'));
      $visitor->note=$note;
      $visitor->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return Visitor::destroy($id);
    }
    public function getGpsLocation(Request $request){
        $request=$request->get('result');
        $request=explode('|',$request);
        $visitor_ip = getIp();
        $visitor_location = Location::get($visitor_ip);
        $device_info = BrowserDetect::detect()->toArray();
        if ($visitor_ip != '::1') {
            if ((!contains($device_info['browserName'],
                    [
                        'AhrefsBot',
                        'Apache-HttpClient',
                        'FacebookBot',
                        'PetalBot',
                        'coccocbot',
                        'bingbot'
                    ]) || !contains($device_info['deviceFamily'],
                    [
                        'Spider'
                    ]))) {
                $device = [
                    'browser' => $device_info['browserName'],
                    'browser_engine' => $device_info['browserEngine'],
                    'os' => $device_info['platformName'],
                    'device_family' => $device_info['deviceFamily'],
                    'device_model' => $device_info['deviceModel'],
                ];
                $location = '';
                if ($visitor_location != false) {
                    //$address = getLocationFromLatLong($visitor_location->latitude, $visitor_location->longitude);
                    $location = $visitor_location->cityName
                        . ', ' . $visitor_location->regionName
                        . ', ' . $visitor_location->countryName
                        . ', lat: ' . $request[0]
                        . ', long: ' . $request[1];
                    $device['possible_addresses'] = json_encode(getLocationInfo($visitor_ip));
                    $device['lat']=$request[0];
                    $device['long']=$request[1];
                    if (str_contains($location, 'Vietnam')) {
                        \App\Models\Visitor::create(['ip_address' => $visitor_ip, 'location' => $location, 'device_info' => json_encode($device)]);
                    }
                }
            }

        }
    }
}
