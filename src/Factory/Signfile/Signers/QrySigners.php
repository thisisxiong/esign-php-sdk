<?php


namespace IsxiongMili\Esign\Factory\Signfile\Signers;

use IsxiongMili\Esign\Factory\Request\EsignRequest;
use IsxiongMili\Esign\Emun\HttpEmun;
/**
 * 轩辕API流程签署人列表
 * @author  澄泓
 * @date  2020/11/24 15:57
 */
class QrySigners extends EsignRequest
{
    private $flowId;

    /**
     * QrySigners constructor.
     * @param $flowId
     */
    public function __construct($flowId)
    {
        $this->flowId = $flowId;
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
     * @return QrySigners
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId."/signers");
        $this->setReqType(HttpEmun::GET);
    }
}