<?php
$sms = new thsms();
$number = $_GET['number'];
$sms->username   = 'taratep';
$sms->password   = 't123123123555';

$a = $sms->getCredit();
var_dump( $a);

$b = $sms->send( 'SMS', $number, 'rararoy');
var_dump( $b);

class thsms
{
     var $api_url   = 'http://www.thsms.com/api/rest';
     var $username  = null;
     var $password  = null;

    public function getCredit()
    {
        $params['method']   = 'sent';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $result = $this->curl( $params);

        $xml = @simplexml_load_string( $result);

        if (!is_object($xml))
        {
            // return array( FALSE, 'Respond error');
        } else {

            if ($xml->credit->status == 'success')
            {
                return array( TRUE, $xml->credit->amount);

            } else {
              // เครดิตหมด
                // return array( FALSE, $xml->credit->message);
                header("location:home.php");

            }
        }
    }

    public function send( $from='0000', $to=null, $message=null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;

        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }

        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
            header("location:home.php");

        } else {
            if ($xml->send->status == 'success')
            {
                return array( TRUE, $xml->send->uuid);
                header("location:home.php");

            } else {
                return array( FALSE, $xml->send->message);
                header("location:home.php");

            }
        }
    }

    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);

        return $response;

    }
}
?>
