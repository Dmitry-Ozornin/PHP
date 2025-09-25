<?php
echo ' 1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). <br/>';

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'amount':
            return $arg1 + $arg2;

        case 'subtraction':
            return $arg1 - $arg2;

        case 'multiplication':
            return $arg1 * $arg2;

        case 'division':
            return $arg1 / $arg2;

    }
}

echo (mathOperation(2,2,'amount')), '<br/>';
echo (mathOperation(2,2,'subtraction')), '<br/>';
echo (mathOperation(2,2,'multiplication')), '<br/>';
echo (mathOperation(2,2,'division')), '<br/>';