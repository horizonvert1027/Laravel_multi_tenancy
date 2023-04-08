<?php
    namespace App\Http\Controllers\Api ;
    
    use Illuminate\Support\Facades\Http;
    use Symfony\Component\HttpKernel\Exception\HttpException;

    class YahooStockApi {
        private $apiKey ;
        private $stockUrl = "https://yh-finance.p.rapidapi.com/stock/";
        public function __construct($apiKey)
        {   
            $this->apiKey = $apiKey;
        }
        public function getSummary(){
            $curl = curl_init();
            curl_setopt_array($curl,[
                CURLOPT_URL => "https://yh-finance.p.rapidapi.com/stock/v2/get-summary?symbol=AMRN&region=US&rapidapi-key=a3d9ca7928mshf6b4652ac03e0acp1d443ajsn6b219a3ab514",
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HEADER => false
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ( $err ) return 'cURL Error #: '.$err;
            else return $response;
        }
        public function getAutoComplete(){
            $curl = curl_init();
            curl_setopt_array($curl,[
                CURLOPT_URL => "https://yh-finance.p.rapidapi.com/auto-complete?q=tesla&region=US&rapidapi-key=a3d9ca7928mshf6b4652ac03e0acp1d443ajsn6b219a3ab514",
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HEADER => false
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ( $err ) return 'cURL Error #: '.$err;
            else return $response;
        }
        public function getHistoricalData($options){
            $curl = curl_init();
            $url = $this->stockUrl."v3/get-historical-data?" ;
            foreach($options as $key => $value){
                $url = $url."&".$key."=".$value ;
            }
            curl_setopt_array($curl,[
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: yh-finance.p.rapidapi.com",
                    "X-RapidAPI-Key: ". $this->apiKey
                ]
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            return $err ? $err : $response ;
        }
    }
?>