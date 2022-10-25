<?php
class Solution
{

    /**
     * The string "PAYPALISHIRING" is written in a zigzag pattern on a given number of rows like this: 
     * (you may want to display this pattern in a fixed font for better legibility)
     * P   A   H   N
     * A P L S I I G
     * Y   I   R
     * And then read line by line: "PAHNAPLSIIGYIR"
     * Write the code that will take a string and make this conversion given a number of rows
     * @param string $s
     * @param int $numRows
     * @return string
     */
    public function convert($s, $numRows)
    {
        if ($numRows == 1) return $s;

        // // First solution : create the zigzag and read it.
        // $zigzag = $this->createZigZag($s, $numRows);
        // return $this->getStringFromZigZag($zigzag);

        // Second solution : directly deduce the string

        $zigzag = '';
        $n = 2 * $numRows - 2; // Number of chars by zigzag
        $length = strlen($s);

        // Line 1 : every $n char
        $i = 0;
        while ($i * $n < $length) {
            $zigzag .= $s[$i * $n];
            $i++;
        }

        // intermediate lines
        for ($line = 1; $line < $numRows - 1; $line++) {
            $i = 0;
            while (true) {
                $idx = $i * $n + $line;
                if ($idx >= $length) {
                    $i = 0;
                    break;
                }
                $zigzag .= $s[$idx];
                $idx = ($i + 1) * $n - $line;
                if ($idx >= $length) {
                    $i = 0;
                    break;
                }
                $zigzag .= $s[$idx];
                $i++;
            }
        }

        // last line
        $i = 0;
        $idx  = $i * $n + $numRows - 1;
        while ($idx < $length) {
            $zigzag .= $s[$idx];
            $i++;
            $idx  = $i * $n + $numRows - 1;
        }

        return $zigzag;
    }

    private function createZigZag($s, $numRows)
    {
        $zigzag = array();
        $i = $j = 0;
        $directionI = +1;
        $directionJ = 0;
        $chars = mb_str_split($s);
        while ($chars) {
            $zigzag[$i][$j] = array_shift($chars);
            $i += $directionI;
            $j += $directionJ;
            if ($i == 0) {
                $directionI = +1;
                $directionJ = 0;
            } else if ($i == $numRows - 1) {
                $directionI = -1;
                $directionJ = +1;
            }
        }
        return $zigzag;
    }

    private function getStringFromZigZag($zigzag)
    {
        $string = '';
        foreach ($zigzag as $line) {
            $string .= implode('', $line);
        }
        return $string;
    }
}

$sol = new Solution;

$testCases = [
    ['string' => 'PAYPALISHIRING', 'numRows' => 3, 'expectedResult' => 'PAHNAPLSIIGYIR'],
    ['string' => 'PAYPALISHIRING', 'numRows' => 4, 'expectedResult' => 'PINALSIGYAHRPI'],
    ['string' => 'A', 'numRows' => 1, 'expectedResult' => 'A']
];

foreach ($testCases as $i => $test) {
    $result = $sol->convert($test['string'], $test['numRows']);
    echo "\nTest $i : '" . $test['string'] . "' - " . $test['numRows'] . " lignes :\n";
    echo "Attendu : '" . $test['expectedResult'] . "'\n";
    echo "Obtenu  : '" . $result . "'\n";
    echo $result == $test['expectedResult'] ? "Succès" : "Echec";
}
