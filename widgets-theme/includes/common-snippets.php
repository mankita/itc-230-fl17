<?php
/*
common.php - a place to store our favorite functions
*/


/*
Used for error handling

/*
 loads header include file from theme folder 

*/

function get_header($file=''){
    global $config;
    static $header_loaded = false;
    if($file == ''){//load included file
        if(!$header_loaded)
        {//header loads first time
            $file = 'header.php'; 
            $header_loaded = true;
        }else{
            $file = 'footer.php';
        }
           
    }
    
    $file = $config->physical_path . '/themes/' . $config->theme . '/' . $file;
    
    if(file_exists($file)){
        include $file;
    }else{
        myerror(__FILE__,__LINE__,'include file not found: ' . $file);
    }
    
    
}#end get_header()

function get_footer()
{
    global $config;
    get_header();
}#get_footer() is same function, run second time with footer file









