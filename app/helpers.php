<?php
    function randomStringGenerator($num){
        $globalRandomStr = config("global.AlphaNum");
        $resultStr = "";
        $len = strlen($globalRandomStr);
        for ($i = 0 ; $i < $num ; $i ++ ){
            $resultStr .= $globalRandomStr[rand(0,$len)];
        }
        return $resultStr ;
    }
?>