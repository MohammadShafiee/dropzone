<?php
App::uses('File', 'Utility');

class Dropzone{

    public static function load($configName = null){
        list($plugin, $configName) = explode('.', $configName);
        if(empty($configName)){
            $configName = 'default';
        }
        $jsonFile = new File(CakePlugin::path($plugin) . 'Config' . DS . 'dropzone.json');
        $json = $jsonFile->read();
        $json = json_decode($json, true);
        self::__processDropzone($json[$configName]);
    }

    private static function __processDropzone($config = array()){
        $boxTitle = $config['title'];
        $element = $config['template_element'];
        $options = array();
        $hookAction = 'hookAdminBox';
        if($config['dropzone_position'] == 'tab'){
            $hookAction = 'hookAdminTab';
        }
        foreach ($config['target_action'] as $targetAction) {
            $options['elementData']['uploadUrl'] = $config['upload_url'];
            Croogo::$hookAction($targetAction, $boxTitle, $element, $options);
        }
    }
}
