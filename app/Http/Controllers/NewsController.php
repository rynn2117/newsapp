<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{   
    public function beranda(){
        $user = User::findorfail(1);
        $categories = $user->fav_categories;
        $base_url = "https://berita-indo-api.vercel.app/v1/cnn-news/";
        $client = new Client();
        $indexNews = [];

        try {
            foreach ($categories as $category) {
                $response = $client->get("{$base_url}{$category}");
                $data = json_decode($response->getBody(), true);
                if (isset($data['data'])) {
                    $indexNews = array_merge($indexNews, $data['data']);
                }
            }

            // Tampilkan hasil (bisa dikembalikan sebagai JSON atau dikirim ke view)
            return view('news.beranda', ['news'=>$indexNews]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }
}
