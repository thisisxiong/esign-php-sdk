<?php


namespace IsxiongMili\Esign\Factory\Account;

use IsxiongMili\Esign\Factory\Request\EsignRequest;
use IsxiongMili\Esign\Emun\HttpEmun;
use JsonSerializable;

/**
 * 轩辕API设置静默签署
 * @author  澄泓
 * @date  2020/11/20 13:50
 */
class SetSignAuth extends EsignRequest implements JsonSerializable
{
    private $accountId;
    private $deadline;

    /**
     * SetSignAuth constructor.
     * @param $accountId
     */
    public function __construct($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }


    function build()
    {
        $this->setUrl("/v1/signAuth/".$this->accountId);
        $this->setReqType(HttpEmun::POST);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value==null||$key=='accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}