<?php
# exec
return function ($cmd,$path='',$env=null) {
    $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("pipe", "w"),// 2 => array("file", "/tmp/error-output.txt", "a") // stderr is a file to write to
    );
    $process = proc_open($cmd, $descriptorspec, $pipes, $path, $env );
    if (is_resource($process)){
        $ret= stream_get_contents($pipes[1]);
//        echo stream_get_contents($pipes[2]); # errors
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);
	return $ret;

    }else return false;
}
?>
