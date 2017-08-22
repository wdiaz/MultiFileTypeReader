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
    public function output()
    {
        $this->_strategy->output();
    }
}

printf("<b>Reading CVS File</b>");
$filePath =  __DIR__ . '/data.csv';
$csvIterator = new CsvIterator($filePath);
$csvIterator->setCsvControl('|');
$csvIterator->setFlags(SplFileObject::READ_CSV);
$strategy = new Strategy($csvIterator);
$strategy->output();

printf("<br/><br/><b>Now Reading and XML file</b>");
$filePath =  __DIR__ . '/data.xml';
$xmlIterator = new XmlIterator($filePath);
$strategy = new Strategy($xmlIterator);
$strategy->output();

