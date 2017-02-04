<?php
namespace Core\Generate;

class Text
{
    public $_modules = array(
        'German' => array(
            'General',
            //'Helloworld',
        )
    );
    
    public function getText($lang = 'German')
    {
        $modules = $this->_modules[$lang];
        $module = $modules[array_rand($modules)];
        
        //$class_name = '\Core\Generate\Text'.'\\'.$lang.'\\'.$module;
        $class_name = 'Core\Generate\Text'.'\\'.$lang.'\\'.$module;
        
        try {
            $class = new $class_name();
            return $class->getText();
        } catch (Exception $e) {
            echo 'Class not found...: ',  $e->getMessage(), "\n";
        }
        
        return false;
    }
}