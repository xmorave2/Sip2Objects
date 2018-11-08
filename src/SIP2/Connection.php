<?php

namespace SIP2;

use \sip2 as Sip2Connector;
use \SIP2\Response;
use \SIP2\MessageTypes;

class Connection
{
    /*
     * @var SIP2 connection
     */
    protected $connection;

    /* 
     * @var Login to SIP2 server
     */
    protected $login;
 
    /*
     * @var Password to SIP2 server
     */
    protected $password;

    /*
     * @var Patron
     */
    protected $patron;

    /*
     * @var boolean Connected
     */
    protected $connected = false;

    public function __construct($hostname = "127.0.0.1", $port = "6001", $login = '', $password = '')
    {
        $this->connection = new Sip2Connector();
        $this->connection->hostname = $hostname;
        $this->connection->port = $port;
        $this->login = $login;
        $this->password = $password;
    }

    public function getPatronInfo($patronBarcode, $checkouts = false)
    {
        if( !$this->connected ) {
            $this->connect($patronBarcode);
        }
        $response = [];
        $response["checkouts"] = [];
        $patronRequest = 
            $checkouts ? 
            $this->connection->msgPatronInformation('charged', '1', '99999') :
            $this->connection->msgPatronInformation();
        $patronMessage = $this->connection->get_message($patronRequest);
        $patronResponse = new Response($patronMessage, $this->connection, MessageTypes::PATRON_INFORMATION);
        $response["patron"] = $patronResponse;
        if ($checkouts) {
            foreach ($patronResponse->variable['AU'] as $barcode)
            {
                $response["checkouts"][] = $this->getItemInfo($barcode);
            }
        }
        return $response;
    }

    public function getItemInfo($barcode)
    {
        if( !$this->connected ) {
            $this->connect($this->patron);
        }
        $itemRequest = $this->connection->msgItemInformation($barcode);
        $itemMessage = $this->connection->get_message($itemRequest);
        $itemResponse = new Response($itemMessage, $this->connection, MessageTypes::ITEM_INFORMATION);
        return $itemResponse;
    }

    public function doCheckin($itemBarcode)
    {
        if( !$this->connected ) {
            $this->connect($this->patron);
        }
        $checkinRequest = $this->connection->msgCheckin($itemBarcode, '');
        $checkinMessage = $this->connection->get_message($checkinRequest);
        $checkinResponse = new Response($checkinMessage, $this->connection, MessageType::CHECKIN);
        return $checkinResponse;
    }

    public function doCheckout($itemBarcode, $location)
    {
        if( !$this->connected ) {
            $this->connect($this->patron);
        }
        $checkoutRequest = $this->connection->msgCheckout($barcode, $location);
        $checkoutMessage = $this->connection->get_message($checkoutRequest);
        $checkoutResponse = new Response($checkoutMessage, $this->connection, MessageType::CHECKOUT);
        return $checkoutResponse;
    }

    protected function connect($patronBarcode)
    {
        $this->connection->patron = $patronBarcode;
        $connectResponse = $this->connection->connect();
        if (!$connectResponse) {
            throw new \Exception("Can't connect to SIP2 server. Are the hostname and port set properly?");
        }
        $loginResponse = $this->connection->msgLogin($this->login, $this->password);
        $response = $this->connection->parseLoginResponse($this->connection->get_message($loginResponse));
        if( !$response["fixed"]["Ok"] ) {
            throw new \Exception("Error login to SIP2 server");
        }
        $this->connected = true;
    }
}
