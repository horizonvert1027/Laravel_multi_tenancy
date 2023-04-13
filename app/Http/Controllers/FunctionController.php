<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Api\YahooStockApi;
    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;

    class FunctionController extends Controller{
        private $RapidAPIKey = "f33d1622b6mshe251611e8d54d85p130501jsne070d31a7333";
        public function __construct()
        {
               
        }
        public function NewYahoo(){
            $yahoo = new YahooStockApi($this->RapidAPIKey);
            return $yahoo;
        }
    }
?>