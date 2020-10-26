<?php
// $command = escapeshellcmd('python3 speechtotext/stt.py');
// exec($command, $output, $return_var);

$output = shell_exec('python3 /opt/lampp/htdocs/speechtotext/stt.py'); 
echo $output;
