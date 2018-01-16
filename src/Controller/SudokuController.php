<?php

declare(strict_types=1);

namespace CoenMooij\SudokuAPI\Controller;

use CoenMooij\Sudoku\Puzzle\Difficulty;

use CoenMooij\Sudoku\Serializer\GridSerializer;
use CoenMooij\Sudoku\SudokuService;
use Symfony\Component\HttpFoundation\JsonResponse;

class SudokuController
{
    /**
     * @var SudokuService
     */
    private $sudokuService;

    public function __construct(SudokuService $sudokuService)
    {
        $this->sudokuService = $sudokuService;
    }

    public function get()
    {
        $puzzle = $this->sudokuService->generatePuzzle(new Difficulty(Difficulty::LEGENDARY));
        $grid = $puzzle->getGrid();
        $serializedGrid = GridSerializer::serialize($grid);

        return new JsonResponse($serializedGrid);
    }
}
