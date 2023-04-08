<?php

namespace App\Http\Controllers;

    use App\Http\Controllers\FunctionController;
    use App\Models\User;
    use App\Notifications\VerifyAccount;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Validator;

    class LandingController extends FunctionController{
        public function __construct() {
            parent::__construct();
        }
        public function index() {
            
            return view('index');
        }
        public function register(Request $request){
            $passcode = randomStringGenerator(7);
            $password = bcrypt("123456qwerty");

            $user = User::create([
                "name" => "Roman Khamidrak",
                "email" => "roman@directnorth.digital",
                "email_verified_at" => 0,
                "password" => $password,
                "passcode" => $passcode
            ]);
            $user->notify(new VerifyAccount($user));
        }
        public function yahoo_test(Request $request){
            $yahoo = $this->NewYahoo();
            // $summary = $yahoo->getSummary();
            // $autoComplete = $yahoo->getAutoComplete();
            $data = $yahoo->getHistoricalData(
                [
                    "symbol" => "AAPL"
                ]
            );
            $data = json_decode($data);
            $data = get_object_vars($data);
            $prices = $data['prices'];
            $endprice = $prices[count($prices)-2];
            var_dump(date("Y/m/d H:i:s" ,$endprice->date));
            var_dump(date("Y/m/d H:i:s",$prices->date));
            die();
            return $data;
        }
        public function twelvedata(Request $request){
            $_token = "ad5a5c8a14a24c04b2fbf842c003ea22";
            // Initialize CURL resource
            $ch = curl_init();
            // Set URL for service, replace placeholder USER_TOKEN with valid API token
            curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/stocks?apikey='.$_token.'&symbol=AAPL&country=US');
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/exchanges?apikey='.$_token);
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/cryptocurrency_exchanges?apikey='.$_token);
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/technical_indicators?apikey='.$_token);
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/symbol_search?apikey='.$_token);
            /** Availble time that can open and close exchanges */
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/market_state?apikey='.$_token);
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/time_series?apikey='.$_token.'&symbol=AAPL&interval=1day');
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com/exchange_rate?apikey='.$_token.'&symbol=EUR/USD,USD/JPY,ETH/BTC');
            // curl_setopt($ch, CURLOPT_URL, 'https://api.twelvedata.com//api_usage?apikey='.$_token);

            // Set response type as string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Execute curl request
            $output = curl_exec($ch);

            // Close curl resource
            curl_close($ch);
            return $output;
        }
    }
?>
