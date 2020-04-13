<?php

class baseResponse {

    var $code;
    var $res;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getRes()
    {
        return $this->res;
    }

    /**
     * @param mixed $res
     */
    public function setRes($res)
    {
        $this->res = $res;
    }


}