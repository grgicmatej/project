<?php
/**
 * NOTE: Only use VANILLA PHP please do not use any 3rd party packages or any other libraries.
 * Task 1:
 * Make this work (repeat 3 times the contents of an array):
 *
 * repeat([1,2,3]) //[1,2,3,1,2,3,1,2,3]
 *
 * Your solution:
 * if we type in our console your function and repeat([1,2,3]) then the result should be [1,2,3,1,2,3,1,2,3]
 *
 *
 * ********************************************************************************************************************
 */

function repeatThreeTimes($argv){
    argumentValidation($argv);
    $dataToPrint = dataValidation($argv[1]);

    $numOfRepeats = 3;

    for ($i = 0; $i < $numOfRepeats; $i++){
        $comma = ',';
        if ($i === 2){
            $comma = "\n";
        }
        echo $dataToPrint.$comma;
    }
}

function dataValidation($arg)
{
    $argumentData = str_replace('.', ',', $arg); // just in case if user types in dots instead of comma's
    return rtrim($argumentData, ',');
}

function argumentValidation($argv)
{
    if (!isset($argv[1])){
        echo "Parametri za repeat nisu unešeni. \n";
        die();
    }

    if (isset($argv[2])){
        echo "Previše skupina parametara unešeno, ponoviti će se samo prva skupina. \n";
    }
}

repeatThreeTimes($argv);

