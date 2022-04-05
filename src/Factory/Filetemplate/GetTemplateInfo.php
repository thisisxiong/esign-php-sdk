<?php


namespace IsxiongMili\Esign\Factory\Filetemplate;

use IsxiongMili\Esign\Factory\Request\EsignRequest;
use IsxiongMili\Esign\Emun\HttpEmun;

/**
 * Class 查询模板文件详情
 * @package IsxiongMili\Esign\Factory\Filetemplate
 */
class GetTemplateInfo extends EsignRequest implements \JsonSerializable
{
    private $templateId;

    /**
     * AddTemplateComponents constructor.
     * @param $templateId
     * @param $structComponent
     */
    public function __construct($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }


    function build()
    {
        $this->setUrl("/v1/docTemplates/" . $this->templateId );
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
            if ($value === null || $key == 'templateId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
