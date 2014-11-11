<?php
namespace SoftLayer;

class Messaging
{
    public $endpoints = array();
    public $endpoints_config = '/config.json';

    private $endpoint = "";
    private $token = null;
    private $account;
    private $client;

    public function __construct($endpoint = "dal05", $private = false)
    {
        $this->_LoadEndpoints();
        $this->endpoint = "https://".$this->endpoints[$endpoint][($private?'private':'public')]."/v1";
    }

    public function ping()
    {
        $this->getClient()->setBaseUrl($this->endpoint);
        return $this->getClient()->get('/ping')->getBody();
    }

    public function authenticate($account, $user, $key)
    {
        $this->getClient()->setBaseUrl("{$this->endpoint}/{$account}");
        $this->getClient()->post("/auth", array(
            'headers' => array(
                'X-Auth-User' => $user,
                'X-Auth-Key' => $key
            )
        ));

        $response = $this->getClient()->getResponse();

        if($response->getStatus() == 200) {
            $this->getClient()->setDefaultHeader('X-Auth-Token', $response->getBody()->token);
            return true;
        }

        return false;
    }

    public function stats($last = 'hour')
    {
        return $this->getClient()->get('/stats/'.$last)->getBody();
    }

    public function queue($name = '')
    {
        $queue = new \SoftLayer\Messaging\Queue();
        $queue->setParent($this);
        $queue->setName($name);
        return $queue;
    }

    public function queues($tags = array())
    {
        $queues = array();
        $query = "/queues";

        if($tags) {
            $query .= "?tags=".implode(',', $tags);
        }

        $response = $this->getClient()->get($query);

        foreach($response->getBody()->items as $item) {
            $queue = new \SoftLayer\Messaging\Queue();
            $queue->setParent($this);
            $queue->unserialize($item);

            $queues[] = $queue;
        }

        return $queues;
    }

    public function topic($name = '')
    {
        $topic = new \SoftLayer\Messaging\Topic();
        $topic->setParent($this);
        $topic->setName($name);
        return $topic;
    }

    public function topics($tags = array())
    {
        $topics = array();
        $query = "/topics";

        if($tags) {
            $query .= "?tags=".implode(',', $tags);
        }

        $response = $this->getClient()->get($query);

        foreach($response->getBody()->items as $item) {
            $topic = new \SoftLayer\Messaging\Topic();
            $topic->setParent($this);
            $topic->unserialize($item);

            $topics[] = $topic;
        }

        return $topics;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getClient()
    {
        if(!$this->client) {
            $this->client = \SoftLayer\Http\Client::getClient();
        }
        return $this->client;
    }

    private function _LoadEndpoints()
    {
        $root = dirname(__FILE__);
        $config = $root . $this->endpoints_config;

        // If we've already loaded this, break out early.
        if(count($this->endpoints) > 0) {
            return;
        }

        if(!file_exists($config)) {
            die("An endpoints config.json file is required.");
        }

        $json = json_decode(file_get_contents($config), true);
        $this->endpoints = $json['endpoints'];
    }
}
