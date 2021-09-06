<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\launchEngine;

function calculateGcd(int $a, int $b): int
{
    $num1 = $a;
    $num2 = $b;
    while ($num1 !== 0 && $num2 !== 0) {
        if ($num1 > $num2) {
            $num1 %= $num2;
        } else {
            $num2 %= $num1;
        }
    }
    return $num1 + $num2;
}

function startGame(): void
{
    $description = "Find the greatest common divisor of given numbers.";
    $getQuestionAndAnswer = function (): array {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = "{$num1} {$num2}";
        $correctAnswer = (string) calculateGcd($num1, $num2);
        return [$question, $correctAnswer];
    };
    launchEngine($description, $getQuestionAndAnswer);
}
