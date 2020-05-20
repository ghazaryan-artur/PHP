<?php
    function incoming_files() {
        $files = $_FILES;
        $files2 = [];
        foreach ($files as $input => $infoArr) {
            // var_dump($input);
            // var_dump($infoArr);
            $filesByInput = [];
            foreach ($infoArr as $key => $valueArr) {
                if (is_array($valueArr)) { // file input "multiple"
                    foreach($valueArr as $i=>$value) {
                        $filesByInput[$i][$key] = $value;
                    }
                }
                else { // -> string, normal file input
                    $filesByInput[] = $infoArr;
                    break;
                }
            }
            $files2 = array_merge($files2,$filesByInput);
        }
        $files3 = [];
        foreach($files2 as $file) { // lfilter empty & errors
            if (!$file['error']) $files3[] = $file;
        }

        return $files3;
    }