<?php
require_once dirname(__FILE__) . '/CsvIterator.php';
require_once dirname(__FILE__) . '/XmlIterator.php';
class Strategy
{
    protected $_strategy;

    public function __construct(FileReaderInterface $strategy)
    {
        $this->_strategy = $strategy;
    }

    public function getStrategy()
    {
        return $this->_strategy;
    }

    public function setStrategy(FileReaderInterface $strategy)
    {
        $this->_strategy = $strategy;
    }
    public function read()
    {
        $this->_strategy->read();
    }
}
$filePath =  __DIR__ . '/data.csv';
$csvIterator = new CsvIterator($filePath);
$csvIterator->setCsvControl('|');
$csvIterator->setFlags(SplFileObject::READ_CSV);
$strategy = new Strategy($csvIterator);
$strategy->read();
