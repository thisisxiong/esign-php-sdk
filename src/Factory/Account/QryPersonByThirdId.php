<?php


namespace IsxiongMili\Esign\Factory\Account;

use IsxiongMili\Esign\Factory\Request\EsignRequest;
use IsxiongMili\Esign\Emun\HttpEmun;
/**
 * 轩辕API查询个人账户（按照第三方用户ID查询）
 * @author  澄泓
 * @date  2020/11/20 11:54
 */
class QryPersonByThirdId extends EsignRequest implements \JsonSerializable
{
    private $thirdPartyUserId;

    /**
     * QryPersonByThirdId constructor.
     * @param $thirdPartyUserId
     */
    public function __construct($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyUserId()
    {
        return $this->thirdPartyUserId;
    }

    /**
     * @param mixed $thirdPartyUserId
     */
    public function setThirdPartyUserId($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }


    function build()
    {
        $this->setUrl("/v1/accounts/getByThirdId?thirdPartyUserId=".$this->thirdPartyUserId);
        $this->setReqType(HttpEmun::GET);
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
            if($value==null||$key=='thirdPartyUserId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}