<?php

namespace koolreport\bootstrap3;

class Bootstrap3Theme extends \koolreport\core\Theme
{
    public function themeInfo()
    {
        return array(
            "name"=>"Bootstrap 3 Theme",
            "version"=>"3.3.7",
            "base"=>"bs3",
            "cssClass"=>"bs3"
        );
    }
    protected function onInit()
    {
        $report = $this->getReport();
        if($report)
        {
            $report->registerEvent("OnResourceInit",function() use ($report){
                $coreFolderUrl = $report->getResourceManager()->publishAssetFolder(realpath(dirname(__FILE__)."/assets/core"));                
                $jqueryAssetUrl = $report->getResourceManager()->publishAssetFolder(realpath(dirname(__FILE__)."/../core/src/clients/jquery"));
                $resources = array(
                    "js"=>array(
                        $jqueryAssetUrl."/jquery.min.js",
                        array(
                            $coreFolderUrl."/js/bootstrap.min.js"
                        )
                    ),
                    "css"=>array(
                        $coreFolderUrl."/css/bootstrap.min.css",
                        array(
                            $coreFolderUrl."/css/bootstrap-theme.min.css",
                        )
                    )
                );
                $report->getResourceManager()->addScriptOnBegin("KoolReport.load.resources(".json_encode($resources).");");
            });    
        }
    }
}