<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\channels;
use App\Models\feeds;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Broadcasting\Channel;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        try {
            if (!$this->is_internet_connected()) {
                return view('error', ['message' => 'You are not connected to the internet, Please check your internet connection']);
            }
            $client = new Client(['timeout' => 5]);
            $response = $client->get('https://api.thingspeak.com/channels/2216538/feeds.json?results');
            $data = json_decode($response->getBody(), true);

            // dd($data['channel']['id']);

            $channel = new Channels;

            $channel->id = $data['channel']['id'];
            $channel->name = $data['channel']['name'];
            $channel->description = $data['channel']['description'];
            $channel->latitude = $data['channel']['latitude'];
            $channel->longitude = $data['channel']['longitude'];
            $channel->field1 = $data['channel']['field1'];
            $channel->field2 = $data['channel']['field2'];
            $channel->field3 = $data['channel']['field3'];
            $channel->field4 = $data['channel']['field4'];
            $channel->created_at = $data['channel']['created_at'];
            $channel->updated_at = $data['channel']['updated_at'];
            $channel->last_entry_id = $data['channel']['last_entry_id'];
            $channel->save();


            $feeds = $data['feeds'] ?? [];


            foreach ($feeds as $feed) {
                $feedData = new feeds;
                $feedData->created_at = $feed['created_at'];
                $feedData->entry_id = $feed['entry_id'];
                $feedData->field1 = $feed['field1'];
                $feedData->field2 = $feed['field2'];
                $feedData->field3 = $feed['field3'];
                $feedData->field4 = $feed['field4'];
                $feedData->channel_id = $channel->id;
                $feedData->save();
            }

            // $data['sensor1'] = 'Temperature or Humidity';
            // $data['sensor2'] = 'Smoke';
            // $data['sensor3'] = 'Soil moisture';

            return view('home');
        } catch (RequestException $e) {
            return view('error', ['message' => 'Unable to connect to API. Please try again later.']);
        }
    }

    private function is_internet_connected()
    {
        $headers = @get_headers('https://www.google.com');
        return $headers && strpos($headers[0], '200 OK') !== false;
    }

    public function getProfile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
