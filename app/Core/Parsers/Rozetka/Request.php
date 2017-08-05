<?php

namespace App\Core\Parsers\Rozetka;


use GuzzleHttp\Client;

/**
 * Class Request
 */
class Request
{
    /**
     * @var $lastHTTPCode contains CURLINFO_HTTP_CODE.
     * @var $lastErrorCode contains curl ErrorCode.
     * @var $$handler is request header for curl.
     * @var $userAgentsFile is file for CURLOPT_USERAGENT.
     */
    public $lastHTTPCode = null;
    /**
     * @var null
     */
    public $lastErrorCode = null;
    /**
     * @var
     */
    private $handler;
    /**
     * @var string
     */
    private $userAgentsFile = 'ua.txt';

    /**
     *
     * @param string $url
     * @return string $response
     */
    public function make_request($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url, [
                'headers' =>
                    [
                        'User-Agent' => $this->_create_agents()
                    ]
            ]
        );
        $body = $response->getBody();

        return trim($body);
    }

    /**
     * Create cURL instance.
     */
    private function _create_agents()
    {
        $ch = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36";
        /**
         * Get and set identifiable user agent from file.
         */
        if (isset($this->userAgentsFile) &&
            file_exists($this->userAgentsFile)) {
            $userAgents = file($this->userAgentsFile);
            shuffle($userAgents);
            $uagent = $userAgents[array_rand($userAgents)];
            return trim($uagent);
        }

        return $ch;
    }
}

?>