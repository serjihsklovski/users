<?php

class Logger {
  public static function log_to($filename, $logmsg) {
    $f = fopen($filename, 'a');
    fwrite($f, $logmsg . "\n");
    fclose($f);
  }
}
