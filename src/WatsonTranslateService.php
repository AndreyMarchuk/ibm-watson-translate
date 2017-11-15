<?php

class WatsonTranslateService extends Translator
{

	function __construct($config = [])
	{
		parent::__construct($config);

		$this->bridge = new Bridge(
            $this->config('watson-translate.service_credentials.username'),
            $this->config('watson-translate.service_credentials.password'),
            $this->config('watson-translate.api_endpoint')
        );
	}

}