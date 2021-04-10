<?php

// References : http://www.geekality.net/2011/05/28/php-tail-tackling-large-files/
class ReverseFileReader
{

    private $file;

    // private $seek;
    function __construct($file)
    {
        $this->file = fopen($file, "rb");

        fseek($this->file, - 1, SEEK_END);
    }

    function __destruct()
    {
        $this->closeFile();
    }

    function readLines($buffer = 4096)
    {
        // Open the file
        $f = $this->file;

        // Jump to last character

        // Read it and adjust line number if necessary
        // (Otherwise the result would be wrong if file doesn't end with a blank line)

        // Start reading
        $output = '';

        // While we would like more

        if (ftell($f) > 0) {

            $cur = ftell($f);
            // Figure out how far back we should jump

            $seek = min(ftell($f), $buffer);

            // Do the jump (backwards, relative to where we are)
            fseek($f, - $seek, SEEK_CUR);

            // Read a chunk and prepend it to our output
            $output = fread($f, $seek);

            // $data = explode("\n", $output);

            $output = substr($output, strpos($output, "\n"));

            // $prefix = substr($op, 0, strpos($op, "\n") + 1);
            // Jump back to where we started reading

            $cur = ftell($f);

            fseek($f, - mb_strlen($output, '8bit'), SEEK_CUR);
        }

        return $output;
    }

    function closeFile()
    {
        fclose($this->file);
    }
}
?>