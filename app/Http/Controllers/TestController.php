<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

define('FRUIT', [
    'apple',
    'orange',
    'banana'
]);

class TestController extends Controller implements Utility
{

    public function a() {

        $output = $this->sumOfInts(1, 2, 3.567); // 6
        $output = $this->returnTypeDeclaration(3.567); // 3
        $output = $this->nullCoalescingOperator(['a' => 'some value']); // some value
        $output = 3 <=> 13; // -1
        $output = FRUIT[0];
        $output = $this->puncuateIt("exclamation"); // exclamation!!!
        
        return view('test', ["output" => $output]);
    }

    public function puncuateIt(string $value) {
        return $value.'!!!';
    }

    protected function sumOfInts(int ...$integers):int {

        return array_sum($integers);
    }

    protected function returnTypeDeclaration($value):int {

        return $value;
    }

    protected function nullCoalescingOperator(array $value):string {

        return $value['a'] ?? "no value for 'a'";
    }
}

interface Utility {
    public function puncuateIt(string $value);
}