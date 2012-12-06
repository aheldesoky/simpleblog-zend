<?php
/**
 * Takes a string and optionally a maximum length and 'cut' the string to match that length, based on words and not on characters.
 * @author Er Galvao Abbott
 * 
 * @param string  $pStr    The string to be cutted
 * @param intefer $pMaxLen The maximum length to be used to cut the string
 * 
 * @return string
 */

class Zend_View_Helper_StringCutter extends Zend_View_Helper_Abstract
{
    public function stringCutter($pStr, $pMaxLen = 40)
    {
        if (strlen($pStr) > $pMaxLen) {
            $returnStr = '';
            $pieces = preg_split('/b/', $pStr);
            
            foreach ($pieces as $piece) {
                if (strlen($returnStr . $piece) < $pMaxLen) {
                    $returnStr .= $piece;
                }
            }
            
            $returnStr .= ' ...';
        } else {
            $returnStr = $pStr;
        }
        
        return $returnStr;
    }
}
?>