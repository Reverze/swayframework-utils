<?php

namespace Sway\Component\Regex\Exception;

class ExpressionException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
    
    /**
     * Thorws an exception when subject expression is empty
     * @return \Sway\Component\Regex\Exception\ExpressionException
     */
    public static function emptyExpression() : ExpressionException
    {
        $expressionException = new ExpressionException (sprintf("Subject expression is empty"));
        return $expressionException;
    }
    
}

?>