<?php


class sendsmsdotpk {
	
    // Private Variables for API's use.
    private $apikey;
    private $apiUrl = "http://api.sendsms.pk/";

    // Public Functions for APP's use.
    // Deafult Constructor.
    function sendsmsdotpk($ak){
        $this->apikey = $ak;
    }

    // Check Validity of the API KEY.
    function isValid(){
        $response = $this->fetch_url( $this->api_url("isValid") );
        $obj=json_decode($response);
        if ($obj->isvalid == "Valid")
                return 1;
        return 0;
    }

    // Get Messages from Inbox.
    function getInbox(){
        $response = $this->fetch_url( $this->api_url("inbox") );
        return json_decode($response);
    }

    // Get Messages from Outbox
    function getOutbox(){
        $response = $this->fetch_url( $this->api_url("outbox") );
        return json_decode($response);
    }

    function sendsms($phone, $msg, $type = 0){
        if (strlen($phone)!=11 || substr($phone, 0, 2) != "03"){
                $data['error'] = "Phone number you entered is not valid. It should be of 11 characters like 03451234567";
                return false;
        }
        $msg = wordwrap($msg, 300);		//not more than 300 characters
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url("sendsms"));
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "phone=$phone&msg=$msg&type=$type");
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    // Private Functions for API's use.
    private function api_url($u){
        return $this->apiUrl . $u . "/" . $this->apikey . ".json";
    }
    // CUrl based fetching
    private function fetch_url($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // T curl_setopt($ch, CURLOPT_POST, 1);
        // T curl_setopt($ch, CURLOPT_POSTFIELDS, "a=384gt8gh&p=$phone&m=$msg");
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


}

?>