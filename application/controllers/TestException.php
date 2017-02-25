<?php

class FileWriteException implements Throwable 
{

   public function __construct($content)
   {
       file_put_contents('logs.txt', $content, FILE_APPEND);
   }
}

throw  new FileWriteException('adads');exit;





