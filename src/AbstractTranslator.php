<?php

namespace FindBrok\WatsonTranslate;

use FindBrok\WatsonTranslate\Presenters\ResultsCollection;

/**
 * Class AbstractTranslator.
 */
abstract class AbstractTranslator
{
    /*
     * Translator's traits
     */
    use ResultsCollection;

    /**
     * The results from API.
     *
     * @var string
     */
    protected $results = null;

    /**
     * The language from which we are translating.
     *
     * @var string
     */
    protected $from = null;

    /**
     * The language to which we want to get results.
     *
     * @var string
     */
    protected $to = null;

    /**
     * The model Id we want to use for translation.
     *
     * @var string
     */
    protected $modelId = null;

    /**
     * Request Headers.
     *
     * @var array
     */
    protected $headers = [
        'Accept' => 'application/json',
    ];


    protected $bridge;

    public function __construct($bridge)
    {
        $this->bridge = $bridge;
    }

    /**
     * Getting attributes.
     *
     * @param $variable
     * @return mixed
     */
    public function __get($attribute)
    {
        //Attributes exists
        if (property_exists($this, $attribute)) {
            //return the attribute value
            return $this->$attribute;
        }
        //We return null
    }

    /**
     * Append Headers to request.
     *
     * @param array $headers
     * @return self
     */
    public function appendHeaders($headers = [])
    {
        //Append headers
        $this->headers = array_merge($this->headers, $headers);
        //Return calling object
        return $this;
    }

    /**
     * Return the headers used for making request.
     *
     * @return array
     */
    private function getHeaders()
    {
        //Return headers
        return array_merge($this->headers, [
            'X-Watson-Learning-Opt-Out' => $this->config('watson-translate.x_watson_learning_opt_out'),
        ]);
    }

    /**
     * Make a Bridge to Send API Request to Watson.
     *
     * @return \FindBrok\WatsonBridge\Bridge
     */
    public function makeBridge()
    {
        return $this->bridge->appendHeaders($this->getHeaders());
    }

    /**
     * Return the results from API.
     *
     * @return string|null
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Return Model id to Use.
     *
     * @return string|null
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * Set the language code of the language
     * we are translating from.
     *
     * @param string $lang
     * @return self
     */
    public function from($lang = '')
    {
        //Set the language from code
        $this->from = $lang;
        //return the translator
        return $this;
    }

    /**
     * Set the language code of the language
     * we are translating to.
     *
     * @param string $lang
     * @return self
     */
    public function to($lang = '')
    {
        //Set the language to code
        $this->to = $lang;
        //return the translator
        return $this;
    }

    /**
     * Set the model id of the model we want to use
     * for translation, overrides to and from.
     *
     * @param string $modelName
     * @return self
     */
    public function usingModel($modelName = '')
    {
        //Set the model id
        $this->modelId = ($modelName == '') ?
                         $this->config('watson-translate.models.default') :
                         $this->config('watson-translate.models.' . $modelName);
        //return the translator
        return $this;
    }

    // override to support framework-specific config loading
    abstract protected function config($val);
}
