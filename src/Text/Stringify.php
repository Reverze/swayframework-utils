<?php

namespace Sway\Component\Text;

class Stringify
{
    public function __construct()
    {
        
        
    }
    
    /**
     * Creates empty (blank) string
     * @return string
     */
    public static function blank() : string
    {
        return "";    
    }
    
    /**
     * Creates a string from another value
     * @param type $value
     * @return string
     */
    public static function from($value) : string
    {
        return strval($value);
    }
    
    /**
     * Checks if two string expression are equals
     * @param string $expressionOne
     * @param string $expressionTwo
     * @return boolean
     */
    public static function areEqual(string $expressionOne, string $expressionTwo) : bool
    {
        return ($expressionOne === $expressionTwo);  
    }
    
    /**
     * Replaces all occurences in string
     * @param string $expression
     * @param string $search
     * @param string $replace
     * @return string
     */
    public static function replace(string $expression, string $search, string $replace) : string
    {
        return str_replace($search, $replace, $expression);
    }
    
    /**
     * Trims string
     * @param string $expression
     * @return string
     */
    public static function trim(string $expression) : string
    {
        return 
        self::replace(
                self::replace(
                        self::replace(
                                    self::replace($expression, "\n", ''), 
                        "\t", ''), 
                "\r", ''), 
        " ", '');
    }
    
    /**
     * Joins two string expressions
     * @param string $expressionOne
     * @param string $expressionTwo
     * @return string
     */
    public static function join(string $expressionOne, string $expressionTwo) : string
    {
        return $expressionOne . $expressionTwo;
    }
    
    /**
     * Joins two string expression with connector
     * @param string $expressionOne
     * @param string $expressionTwo
     * @param string $connector
     * @return string
     */
    public static function joinBy(string $expressionOne, string $expressionTwo, string $connector) : string
    {
        return $expressionOne . $connector . $expressionTwo;
    }
    
    /**
     * Makes string expression lower
     * @param string $expression
     * @return string
     */
    public static function tolower(string $expression) : string
    {
        return strtolower($expression);
    }
    
    /**
     * Makes string expression upper
     * @param string $expression
     * @return string
     */
    public static function toupper(string $expression) : string
    {
        return strtoupper($expression);
    }
    
    
    /**
     * Removes a character on given index
     * @param string $expression
     * @param int $index
     * @return string
     */
    public static function removeAt(string $expression, int $index) : string
    {
        $updatedExpression = self::blank();
        
        for ($pointer = 0; $pointer < strlen($expression); $pointer++){
            if ($pointer  !== $index){
                $updatedExpression .= $expression[$pointer];
            }
        }
        
        return $updatedExpression;
    }
    
    /**
     * Removes a all character from given index
     * @param string $expression
     * @param int $index
     * @return string
     */
    public static function removeFrom(string $expression, int $index) : string
    {
        $updatedExpression = self::blank();
        
        for ($pointer = 0; $pointer < strlen($expression) && $pointer < $index; $pointer++){
            $updatedExpression .= $expression[$pointer];
        }
        
        return $updatedExpression;
    }
    
    /**
     * Gets index of first occurence of given character in expression
     * @param string $expression
     * @param string $character
     * @return int
     */
    public static function findChar(string $expression, string $character) : int
    {
        for ($pointer = 0; $pointer < strlen($expression); $pointer++){
            if ($expression[$pointer] === $character){
                return $pointer;
            } 
        }
        return 0;
    }
    
    /**
     * Checks if expression is empty
     * @param string $expression
     * @return bool
     */
    public static function isEmpty(string $expression) : bool
    {
        return (bool) (!strlen($expression));
    }
    
    /**
     * Checks if expression contains specified word
     * @param string $word
     * @param string $expression
     * @return bool
     */
    public static function contains(string $word, string $expression) : bool
    {
        return (bool) (strpos($expression, $word));
    }
    
    /**
     * Checks if word is suffixed by specified word
     * @param string $sufix
     * @param string $expression
     * @return bool
     */
    public static function isSuffixedBy(string $sufix, string $expression) : bool
    {
        $exploded = explode('\\', $expression);
        /**
         * Removes from string a word which is a potential sufix
         */
        $removedPotentialSufix = self::replace($exploded[sizeof($exploded) - 1], $sufix, '');
        
        
        return self::areEqual($exploded[sizeof($exploded) - 1], $removedPotentialSufix . $sufix);
    }
    
   
    
    /**
     * Selects part of a expression from specified index
     * @param string $expression
     * @param int $index
     * @return string
     */
    public static function selectFrom(string $expression, int $index) : string
    {
        $output = "";
        
        for ($i = 0; $i < strlen($expression); $i++){
            if ($i>$index){
                $output .= $expression[$i];
            }
        }
        
        return $output;
    }
}


?>

