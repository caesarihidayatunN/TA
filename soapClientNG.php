<?php
	class SoapClientNG extends \SoapClient{
	    public function __doRequest($request, $location, $action, $version, $one_way = 0)
	    {
	        $response = parent::__doRequest($request, $location, $action, $version, $one_way);
	        // strip away everything but the xml.
	        $response = preg_replace('#^.*(<\?xml.*>)[^>]*$#s', '$1', $response);
	        return $response;
	    }

	}

?>