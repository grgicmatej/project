<?php
/*
 * NOTE: Only use VANILLA PHP please do not use any 3rd party packages or any other libraries.
 * Task 2:
 * Make this work (no vowels, lowercase except the first letter):
 *
 * reformat("TyPEqaSt DeveLoper TeST") //Typqst dvlpr tst
 *
 * Your solution:
 * if we type in our CLI your function and reformat("TyPEqaSr DeveLoper TeST") then the result should be Typqst dvlpr
 * tst
 *
 *
 * ********************************************************************************************************************
 */

/**
 * @param $argv
 * @return void
 */
function reformat($argv): void
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];

    $argument = sanitizeInputArgument($argv);

    $argumentToPrint = '';

    for ($i = 0; $i < strlen($argument); $i++){
        if (!in_array($argument[$i], $vowels)){
            $argumentToPrint .= $argument[$i];
        }
    }

    sanitizeOutputArgument($argumentToPrint);
}

/**
 * @param $argv
 * @return string
 */
function sanitizeInputArgument($argv): string
{
    $argument = '';
    for($i = 1; $i <= count($argv)-1; $i++){
        $argument.=$argv[$i].' ';
    }
    $argument = strtolower($argument);
    return rtrim($argument);
}

/**
 * @param $argumentToPrint
 * @return void
 */
function sanitizeOutputArgument($argumentToPrint): void
{
    $argumentToPrint = rtrim($argumentToPrint);
    $argumentToPrint = ltrim($argumentToPrint);
    $argumentToPrint .= "\n";
    echo ucfirst($argumentToPrint);
}

reformat($argv);
