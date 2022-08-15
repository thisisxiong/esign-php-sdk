<?php

namespace IsxiongMili\Esign\Factory\Base;

use IsxiongMili\Esign\Factory\Filetemplate\CreateFileByTemplate;
use IsxiongMili\Esign\Factory\Filetemplate\CreateTemplateByUploadUrl;
use IsxiongMili\Esign\Factory\Filetemplate\GetFileUploadUrl;
use IsxiongMili\Esign\Factory\Filetemplate\GetTemplateInfo;
use IsxiongMili\Esign\Factory\Filetemplate\UploadFile;

/**
 * 轩辕API
 * @author  澄泓
 * @date  2020/11/23 10:29
 */
class FileTemplate
{
    /**
     * 通过模板创建文件
     * @param $name
     * @param $templateId
     * @param $simpleFormFields
     * @return CreateFileByTemplate
     */
    public static function createFileByTemplate($name, $templateId, $simpleFormFields){
        return new CreateFileByTemplate($name, $templateId, $simpleFormFields);
    }

    /**
     * 通过上传方式创建模板
     * @param $contentMd5
     * @param $contentType
     * @param $fileName
     * @param $convert2Pdf
     * @return CreateTemplateByUploadUrl
     */
    public static function createTemplateByUploadUrl($contentMd5, $contentType, $fileName, $convert2Pdf){
        return new CreateTemplateByUploadUrl($contentMd5, $contentType, $fileName, $convert2Pdf);
    }

    /**
     * 通过上传方式创建文件
     * @param $contentMd5
     * @param $contentType
     * @param $convert2Pdf
     * @param $fileName
     * @param $fileSize
     * @return GetFileUploadUrl
     */
    public static function getFileUploadUrl($contentMd5, $contentType, $convert2Pdf, $fileName, $fileSize){
        return new GetFileUploadUrl($contentMd5, $contentType, $convert2Pdf, $fileName, $fileSize);
    }

    /**
     * 上传文件
     * @param $filePath
     * @param $contentType
     * @param $url
     * @return UploadFile
     */
    public static function uploadFile($filePath, $contentType, $url){
        return new UploadFile($filePath, $contentType, $url);
    }
    
        /**
     * 获取文件详情
     * @param $templateId
     * @return GetTemplateInfo
     */
    public static function getTemplateInfo($templateId){
        return new GetTemplateInfo($templateId);
    }
}
