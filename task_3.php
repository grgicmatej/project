<?php
/*
 * Task 3:
 * Make this work (without using any built-in functions, only a for loop, return the next binary number in a string
 * or as an array).
 *
 * next_binary_number([1,0]) // [1,1]

 * possible test cases:
 *      [1,0] => [1,1]
 *      [1,1] => [1,0,0]
 *      [1,1,0] => [1,1,1]
 *      .......
 *      [1,0,0,0,0,0,0,0,0,1] => [1,0,0,0,0,0,0,0,1,0]
 *
 * Your solution:
 * if we type in our console your function and next_binary_number([1,0,0,0,0,0,0,0,0,1]) then the result
 * should look like 1,0,0,0,0,0,0,0,1,0 (or as an array).
 *
 *
 * ********************************************************************************************************************
 */

/**
 * @param $argv
 * @return void
 */
function next_binary_number($argv): void
{

    $sanitizedInputBinary = argumentChecker($argv);
    $inputInDecimal = binaryToDecimal($sanitizedInputBinary);
    $outputInBinary = decimalToBinary(++$inputInDecimal);

    echo 'Unešen binaran broj: '.outputSanitizer($sanitizedInputBinary);
    echo 'Sljedeći binaran broj: '.outputSanitizer($outputInBinary);
}

/**
 * @param $argv
 * @return string|null
 */
function argumentChecker($argv): string|null
{
    if (!isset($argv[1])){
        echo 'Niste unijeli parametar'."\n";
        die();
    }else{
        return sanitizeInputArgument($argv[1]); // just in case if characters other than 1's or 0' are entered
    }
}

/**
 * @param $argv
 * @return string
 */
function sanitizeInputArgument($argv): string
{
    $argument = '';
    for($i = 0; $i <= strlen($argv)-1; $i++){
        if (($argv[$i] === "1" || $argv[$i] === "0")){
            $argument .= $argv[$i];
        }
    }
    return $argument;
}

/**
 * @param $argv
 * @return string
 */
function decimalToBinary($argv): string
{
    $binaryNumberTemp = '';
    $binaryNumber = '';
    $i = 0;
    while ($argv > 0)
    {
        $binaryNumberTemp[$i] = $argv % 2;
        $argv = (int)($argv / 2);
        $i++;
    }

    for ($j = $i - 1; $j >= 0; $j--){
        $binaryNumber .= $binaryNumberTemp[$j];
    }

    return $binaryNumber;
}

/**
 * @param $argv
 * @return float
 */
function binaryToDecimal($argv): float
{
    $digits = str_split($argv);
    $reversed = array_reverse($digits);
    $res = 0;

    for($x = 0; $x < count($reversed); $x++) {
        if($reversed[$x] == 1) {
            $res += pow(2, $x);
        }
    }

    return $res;
}

/**
 * @param $arg
 * @return string
 */
function outputSanitizer($arg): string
{
    $sanitizedOutput = '';
    for ($i = 0; $i < strlen($arg); $i++){
        $comma = ',';
        if ($i == (strlen($arg) - 1)){
            $comma = "\n";
        }
        $sanitizedOutput .= $arg[$i].$comma;
    }
    return $sanitizedOutput;
}

next_binary_number($argv);
