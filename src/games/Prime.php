<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\launchEngine;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    if ($number === 2) {
        return true;
    }
    for ($i = 2; $i < $number / 2; $i += 1) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function startGame(): void
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $getQuestionAndAnswer = function (): array {
        $question = random_int(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    launchEngine($description, $getQuestionAndAnswer);
}
