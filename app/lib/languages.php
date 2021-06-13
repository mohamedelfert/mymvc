<?php

namespace MYMVC\Lib;

class Languages
{
    private $dictionary = [];

    public function load($path){
        $defaultLanguage = APP_DEFAULT_LANGUAGES;
        if (isset($_SESSION['lang'])){
            $defaultLanguage = $_SESSION['lang'];
        }
        $pathArray = explode('.', $path);
        $languageFileToLoad = LANGUAGES_PATH . $defaultLanguage . DS . $pathArray[0] . DS . $pathArray[1] . '.lang.php';
        if (file_exists($languageFileToLoad)){
            require $languageFileToLoad;
            if (is_array($_) && !empty($_)){
                foreach ($_ as $key => $value){
                    $this->dictionary[$key] = $value;
                }
            }
        }else{
            trigger_error('Sorry The File Language '. $pathArray[1] .' Doesn\'t Exist',E_USER_WARNING);
        }
    }

    public function getDictionary(){
        return $this->dictionary;
    }
}