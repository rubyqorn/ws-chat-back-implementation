<?php 

namespace WsChatApi\Libraries\Database;

class QuestionMarkGenerator
{
    /**
     * Generate question mark string for prepared 
     * SQL statement
     * @param array $records 
     * @return string  
     */ 
    public static function generate(array $records)
    {
        $questionMarkString = '';

        for($i = 0; $i < count($records); $i++) {
            $questionMarkString .= '?,';
        }

        return substr($questionMarkString, 0, -1);
    }
}
