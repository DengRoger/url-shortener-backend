<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortUrlController extends BaseController {
    public static function generateShortUrl(Request $request) {
        $url = $request->input('original_url');
        if($url == null) {
            return response()->json([
                'successful' => false
            ]); 
        }
        $ID = self::generateRandomString();
        while(DB::table('url.url')->where('short_url', $ID)->exists()) {
            $ID = self::generateRandomString();
        }
        DB::table('url.url')->insert([
            'original_url' => $url,
            'short_url' => $ID,
        ]);
        return response()->json([
            'successful' => true,
            'short_url' => $ID
        ]);
    }

    public static function getShortUrl(Request $request) {
        $id = $request->input('id');
        $data = DB::table('url.url')->where('short_url', $id);
        if ($data->exists()) {
            return response()->json([
                'successful' => true,
                'original_url' => json_decode(json_encode($data->get()[0]),true)["original_url"]
            ]);
        }
        else{
            return response()->json([
                'successful' => false
            ]); 
        }
    }

    private static function generateRandomString($length = 8) {
        // generate random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        // loop to generate random string
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength)];
        } 
        // return random string
        return $randomString;
    }
}