<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\launchEngine;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function startGame(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getQuestionAndAnswer = function (): array {
        $question = random_int(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    launchEngine($description, $getQuestionAndAnswer);
}
