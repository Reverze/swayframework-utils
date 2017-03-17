<?php

namespace Sway\Component\Regex;

use Sway\Component\Regex\Exception;

class Regex
{
    /**
     * String expression to work on it
     * @var string
     */
    private $expression = null;
    
    public function __construct(string $expression)
    {
        if (empty($expression) || !strlen($expression)){
            throw Exception\ExpressionException::emptyExpression();
        }
        
        $this->expression = $expression;
    }
    
    /**
     * Perform a regular expression match
     * @param string $pattern Regular expression pattern
     * @return array
     */
    public function find(string $pattern, int $flags = 0, int $offset = 0) : array
    {
        $matched = array();
        preg_match(sprintf("/%s/", $pattern), $this->expression, $matched, $flags, $offset);
        if (empty($matched)){
            return array();
        }
        return $matched;
    }
    
    /**
     * Checks if expression suits to regular expression pattern
     * @param string $pattern
     * @param int $flags
     * @param int $offset
     * @return bool
     */
    public function isMatch(string $pattern, int $flags = 0, int $offset = 0) : bool
    {
        $isMatch = preg_match("/" . $pattern . "/", $this->expression, $matched, $flags, $offset);
        return $isMatch;
    }
    
    /**
     * Perform a global regular expression match.
     * After the first match is found, the subsequent searches are continued on from end of the last match. 
     * @param string $pattern
     * @param int $flags
     * @param int $offset
     * @return array
     */
    public function findAll(string $pattern, int $flags = PREG_PATTERN_ORDER, int $offset = 0) : array
    {
        $matched = array();
        preg_match_all(sprintf("/%s/", $pattern), $this->expression, $matched, $flags, $offset);

        return empty($matched) ? array() : $matched;
    }
    
}

?>