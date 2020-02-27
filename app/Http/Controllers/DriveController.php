<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class DriveController extends Controller
{
    private $drive;
    private $client;
	public function __construct(Google_Client $client)
	{
        $this->client = $client;
	    $this->middleware(function ($request, $next) use ($client) {
	        $accessToken = [
	            'access_token' => auth()->user()->token,
	            'created' => auth()->user()->created_at->timestamp,
	            'expires_in' => auth()->user()->expires_in,
	            'refresh_token' => auth()->user()->refresh_token
	        ];
	 
	        $client->setAccessToken($accessToken);
	 
	        if ($client->isAccessTokenExpired()) {
	            if ($client->getRefreshToken()) {
	                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
	            }
	            auth()->user()->update([
	                'token' => $client->getAccessToken()['access_token'],
	                'expires_in' => $client->getAccessToken()['expires_in'],
	                'created_at' => $client->getAccessToken()['created'],
	            ]);
	        }
	 
	        $client->refreshToken(auth()->user()->refresh_token);
	        $this->drive = new Google_Service_Drive($client);
	        return $next($request);
	    });
        $this->middleware('auth');
	}

    public function getDrive(){
        $driveContent = $this->ListFolders('root');
        return view('drive.index', ["driveContent" => $driveContent]);
    }

    public function ListFolders($id){

        $query = "mimeType='application/vnd.google-apps.folder' and '".$id."' in parents and trashed=false";

        $optParams = [
            'fields' => 'files(*)',
            'q' => 'mimeType!="application/octet-stream"'
            // 'q' => $query // gets all folders
        ];

        $driveContent = $this->drive->files->listFiles($optParams)->getFiles();

        return  $driveContent;

    }


    function deleteFileOrFolder($id){
        try {
            $this->drive->files->delete($id);
        } catch (Exception $e) {
            return redirect('/drive')->withErrors($e->getMessage());
        }
        return redirect('/drive');
    }

}