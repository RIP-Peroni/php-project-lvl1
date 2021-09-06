<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\launchEngine;

const OPERATORS = "+-*";

function startGame(): void
{
    $description = "What is the result of the expression?";
    $getQuestionAndAnswer = function (): array {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $mathSign = OPERATORS[random_int(0, strlen(OPERATORS) - 1)];
        $question = "{$num1} {$mathSign} {$num2}";
        $correctAnswer = null;
        switch ($mathSign) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
            default:
                throw new \Exception('Invalid operator!');
        }
        $correctAnswer = (string) $correctAnswer;
        return [$question, $correctAnswer];
    };
    launchEngine($description, $getQuestionAndAnswer);
}
