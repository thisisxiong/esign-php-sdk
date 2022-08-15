<?php

namespace IsxiongMili\Esign\Factory\Signfile\Signfields;

use IsxiongMili\Esign\Factory\Request\EsignRequest;
use IsxiongMili\Esign\Emun\HttpEmun;
/**
 * 轩辕API删除签署区
 * @author  澄泓
 * @date  2020/11/25 10:16
 */
class DeleteSignFields extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $signfieldIds;

    /**
     * DeleteSignFields constructor.
     * @param $flowId
     * @param $signfieldIds
     */
    public function __construct($flowId, $signfieldIds)
    {
        $this->flowId = $flowId;
        $this->signfieldIds = $signfieldIds;
    }

    /**
     * @return mixed
     */
    public function getFlowId()
    {
        return $this->flowId;
    }

    /**
     * @param mixed $flowId
     * @return DeleteSignFields
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignfieldIds()
    {
        return $this->signfieldIds;
    }

    /**
     * @param mixed $signfieldIds
     * @return DeleteSignFields
     */
    public function setSignfieldIds($signfieldIds)
    {
        $this->signfieldIds = $signfieldIds;
        return $this;
    }

    function build()
    {
       $this->setUrl("/v1/signflows/".$this->flowId."/signfields?signfieldIds=".$this->signfieldIds);
       $this->setReqType(HttpEmun::DELETE);
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
            if($value===null||$key=='flowId'||$key=='signfieldIds') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}