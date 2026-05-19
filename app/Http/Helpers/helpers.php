<?php
use App\Models\GeneralSetting;
use App\Models\Service;
use App\Models\Category;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Seo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function show_date($date){
    $timestamp = strtotime($date);
    $data = 'at';  
    return date('M d,  Y  H:i:s', $timestamp );
}

function generalSetting(){
   $setting =   GeneralSetting::first();
   return $setting;
}

function ourServices($take){
    if($take !=1){
       $service =   Service::where('status','active')->orderby('title','asc')->take($take)->get();
      return $service;   
    }else{ 
        $service =   Service::where('status','active')->orderby('title','asc')->get();
      return $service;   
    }
}

function getService($id){
    $service =   Service::where('id',$id)->first();
   return $service;   
}


function getCategory($id){
    $category =   category::where('id',$id)->first();
   return $category;   
}


function getPages($type, $all=''){
    if(!empty($all)){
       $page = Page::where('type',$type)->orderByDesc('id')->get();
    }else{
       $page = Page::where('type',$type)->first();
    }
    return $page;
}

// function getEmbedUrl($url)
// {
//     $parsedUrl = parse_url($url);
//     $host = $parsedUrl['host'] ?? '';

//     if (strpos($host, 'youtube.com') !== false) {
//         parse_str($parsedUrl['query'] ?? '', $queryString);
//         $videoId = $queryString['v'] ?? '';
//         return "https://www.youtube.com/embed/{$videoId}";
//     }

//     if (strpos($host, 'vimeo.com') !== false) {
//         $videoId = substr($parsedUrl['path'], 1);
//         return "https://player.vimeo.com/video/{$videoId}";
//     }

//     if (strpos($host, 'dailymotion.com') !== false) {
//         $videoId = substr($parsedUrl['path'], 7); // "/video/{videoId}"
//         return "https://www.dailymotion.com/embed/video/{$videoId}";
//     }

//      // For YouTube short URLs (youtu.be)
//     if (strpos($host, 'youtu.be') !== false) {
//         $videoId = substr($parsedUrl['path'], 1); // Extract the video ID from the path
//         return "https://www.youtube.com/embed/{$videoId}";
//     }

//     // Add more platforms as needed...

//     // For direct video files or unsupported URLs, return the original URL
//     return $url;
// }

function getEmbedUrl($url)
{
    $parsedUrl = parse_url($url);
    $host = $parsedUrl['host'] ?? '';
    
    // Check if the URL is already an embedded URL
    if (strpos($url, 'youtube.com/embed') !== false ||
        strpos($url, 'player.vimeo.com') !== false ||
        strpos($url, 'dailymotion.com/embed') !== false) {
        return $url; // Return the URL as it is already embedded
    }

    // For YouTube URLs
    if (strpos($host, 'youtube.com') !== false) {
        parse_str($parsedUrl['query'] ?? '', $queryString); // Parses the query string into an array
        $videoId = $queryString['v'] ?? ''; // Extract the 'v' parameter (YouTube video ID)
        return "https://www.youtube.com/embed/{$videoId}";
    }

    // For YouTube short URLs (youtu.be)
    if (strpos($host, 'youtu.be') !== false) {
        $videoId = substr($parsedUrl['path'], 1); // Extract the video ID from the path
        return "https://www.youtube.com/embed/{$videoId}";
    }

    // For Vimeo URLs
    if (strpos($host, 'vimeo.com') !== false) {
        $videoId = substr($parsedUrl['path'], 1); // Extract the path, which contains the video ID
        return "https://player.vimeo.com/video/{$videoId}";
    }

    // For Dailymotion URLs
    if (strpos($host, 'dailymotion.com') !== false) {
        $videoId = substr($parsedUrl['path'], 7); // Extract the part after "/video/"
        return "https://www.dailymotion.com/embed/video/{$videoId}";
    }

    // Return the original URL if no matching platform is found
    return $url;
}

// title dynamic


if (!function_exists('split_title')) {
    function split_title($title) {
        $firstWordCount = 2; 
        $secondWordCount = 2;
        $words = explode(' ', $title);
        $firstPart = implode(' ', array_slice($words, 0, $firstWordCount)); // First N words
        $secondPart = implode(' ', array_slice($words, $firstWordCount, $secondWordCount)); // Next N words
        $remainingPart = implode(' ', array_slice($words, $firstWordCount + $secondWordCount)); // Remaining words

        // return [$firstPart, $secondPart, $remainingPart];
        return  $firstPart. "<span>  ". $secondPart ." </span> ". $remainingPart;
    }
}

function getGallery($type){
     return Gallery::where(['status'=>'active','type'=>$type])->orderby('id')->get();
}

