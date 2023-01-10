<?php
class Logger {
    const LEVEL_INFO = 1;
    const LEVEL_WARNING = 2;
    const LEVEL_ERROR = 3;
    // we can even assign the constant as a default value
    public function log($message, $level = self::LEVEL_INFO) {
    echo "Message level " . $level . ": " . $message;
    }
   }
   $logger = new Logger();
   $logger->log("Info"); // Using default value
   $logger->log("Warning", $logger::LEVEL_WARNING); // Using var
   $logger->log("Error", Logger::LEVEL_ERROR);
   

