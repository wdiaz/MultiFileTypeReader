<?php
require_once dirname(__FILE__) . '/FileReaderInterface.php' ;
class CsvIterator extends SplFileObject implements FileReaderInterface
{
    protected $filename;
    protected $_path;

    public function __construct($filename = '', $mode = 'r', $useIncludePath  = false, $context = null)
    {
        parent::__construct($filename, $mode, $useIncludePath, $context);
    }

    public function read()
    {
        foreach ($this as $row) {
            list($animal, $class, $legs) = $row;
            printf("%s A %s is a %s with %d legs", "<br/>", $animal, $class, $legs);
        }
    }
}
