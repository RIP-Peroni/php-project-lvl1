<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\launchEngine;

function getProgressionWithConcealedElement($start, $diff, $elementsCount, $concealedIndex)
{
    $progression = '';
    for ($i = 0; $i < $elementsCount; $i += 1) {
        $isConcealed = $i === $concealedIndex;
        $newElement = $start + $diff * $i;
        $progression = $isConcealed ? "{$progression} .." : "{$progression} {$newElement}";
    }
    return trim($progression);
}

function startGame(): void
{
    $description = "What number is missing in the progression?";
    $getQuestionAndAnswer = function (): array {
        $elementsCount = random_int(5, 10);
        $start = random_int(0, 100);
        $diff = random_int(1, 10);
        $concealedIndex = random_int(0, $elementsCount - 1);
        $question = getProgressionWithConcealedElement($start, $diff, $elementsCount, $concealedIndex);
        $correctAnswer = (string) ($start + $diff * $concealedIndex);
        return [$question, $correctAnswer];
    };
    launchEngine($description, $getQuestionAndAnswer);
}
