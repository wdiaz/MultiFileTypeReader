<?php
require_once dirname(__FILE__) . '/FileReaderInterface.php';
class XmlIterator extends XMLReader implements FileReaderInterface
{
    public function __construct($filename)
    {
        $this->open($filename);
    }

    public function output()
    {
        /**
         *  Ideally, this should be a logarithmic process. 
         *  O(n^2) but XML processing is ....
         */
        $doc = new DOMDocument('1.0', 'UTF-8');
        while($this->read()) {
            // Continue is not an element (attribute)
            if($this->nodeType != $this::ELEMENT) {
                continue;
            }
            $items = simplexml_import_dom($doc->importNode($this->expand(), true));
            foreach($items as $row) {
               printf("%s A %s is a %s with %d legs", "<br/>", $row->name, $row->type, $row->legs);
            }
            $this->next();
	}
    }
    
    public function __destruct()
    {
        $this->close();
    }
}