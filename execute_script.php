<?php
// Execute the PowerShell script
$output = shell_exec('pwsh -ExecutionPolicy Bypass -File ~/powershell_scripts/jms_script.ps1');

// Output the result (for testing purposes)
echo $output;
?>