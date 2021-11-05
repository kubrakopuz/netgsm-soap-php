<?php

class soapClass
{

    private $status;
    private $jsonmsg;
    private $data;
    public $usernm, $pwd, $header, $message, $gsm, $filter, $startdate, $stopdate, $encoding;
    private $soapurl = "http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl";

    private function checksoap()
    {
        if (!extension_loaded('soap')) {
            throw new Exception("php soap extension not found ");
        }
    }


    function sendmsg($var) // $var=1 1:n format, $var=2 n:n format
    {
        self::setStatus("success");
        try {

            self::genelcheck();
            $client = new SoapClient($this->soapurl);
            $func = ($var == "2") ? "smsGonderNNV2" : "smsGonder1NV2";
            $Result = $client->{$func}(array(
                'username' => $this->usernm,
                'password' => $this->pwd,
                'header' => $this->header,
                'msg' => $this->message,
                'gsm' => $this->gsm,
                'filter' => $this->filter,
                'startdate' => $this->startdate,
                'stopdate' => $this->stopdate,
                'encoding' => $this->encoding));
            $this->setData($Result);


        } catch (Exception $e) {
            self::setStatus("error");
            self::setJsonmsg($e->getMessage());
            self::setData(array("line" => $e->getLine()));
        }
        return json_encode(array("status" => self::getStatus(), "data" => self::getData(), "message" => self::getJsonmsg()));
    }

    private function genelcheck()
    {
        $this->checksoap();
        if ($this->usernm == "") throw new Exception("Username is not valid,username is missing ");
        if ($this->pwd == "") throw new Exception("pwd is not valid,pwd is missing ");
        if ($this->header == "") throw new Exception("header is not valid,header is missing ");
        if ($this->message == "") throw new Exception("header is not valid,header is missing ");
        if (!is_array($this->gsm)) throw new Exception("gsm is not valid,gsm is missing ");

        /*  if (!isset($this->filter)) throw new Exception("filter is not valid,filter is missing ");
         if ($this->startdate == "") throw new Exception("startdate is not valid,startdate is missing ");
         if ($this->stopdate == "") throw new Exception("stopdate is not valid,stopdate is missing ");
         if ($this->encoding == "") throw new Exception("encoding is not valid,encoding is missing "); */
    }

    /**
     * @return mixed
     */
    private function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    private function getJsonmsg()
    {
        return $this->jsonmsg;
    }

    /**
     * @param mixed $jsonmsg
     */
    private function setJsonmsg($jsonmsg)
    {
        $this->jsonmsg = $jsonmsg;
    }

    /**
     * @return mixed
     */
    private function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    private function setData($data)
    {
        $this->data = $data;
    }


}