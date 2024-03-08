<?php

require_once __DIR__ . "/../vendor/php-jwt/src/JWT.php";

class Metabase extends Controller{
 public function dashboard(int $params = 1) {
    $metabaseSiteUrl = 'http://192.168.0.85:3000'; // URL to your Metabase installation
    $metabaseSecretKey = '1e6ac6bf74e84d62a372b306a36d702bef74cf1067e3059c910f818afcf2fdfb'; // The Secret Key you get from your ;etabase installation
    $payload = [
        'resource' => ['dashboard' => $params ],
        'params' => (object)[],
        'exp' => time() + (10 * 60) // 10 minute expiration
    ];
    $token = \Firebase\JWT\JWT::encode($payload, $metabaseSecretKey, 'HS256')  ;
    $iframeUrl = "{$metabaseSiteUrl}/embed/dashboard/{$token}#theme=transparent&bordered=false&titled=true";

   // Somewhere you would have to create a new iframe like this:
    $data['title']="Metabase";
    $data['metabase']= $iframeUrl;
    $this->view('templates/header',$data);
    $this->view('components/sidebar');
    $this->view('home/index',$data);
    $this->view('templates/footer');
 }  
}