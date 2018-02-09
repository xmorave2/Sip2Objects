<?php
namespace SIP2;

use \sip2 as Sip2Connector;

class Response
{

    /*
     * @var Message returned by SIP2 Connector
     */
    protected $message;

    /*
     * @var SIP2 Connector object used to generate the response message;
     */
    protected $connection;

    /*
     * @var Type of response
     */
    protected $type;

    /*
     * @var Fixed data
     */
    public $fixed;

    /*
     * @var Variable data
     */
    public $variable;

    public function __construct($message, $connection, $type) 
    {
        $this->connection = $connection;
        $this->type = $type;
        $this->message = $message;
        $this->sanitize();
        $this->parse();
    }

    protected function sanitize()
    {
        $this->message = preg_replace('/[\r\n]+/', '', $response);
    }

    protected function parse()
    {
        var_dump($this->type);
        $parseFunctionName = "parse" . $this->type["parse"] . "Response";
        $parsed = $this->connection->$parseFunctionName();
        $this->fixed = $parsed["fixed"];
        $this->variable = $parsed["variable"];
    }
}
