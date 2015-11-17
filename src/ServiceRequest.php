<?php namespace StayForLong\HotelBeds;

use GuzzleHttp\Client;

class ServiceRequest
{
	/**
	 * @var array
	 */
	private $api_headers = [];

	/**
	 * @var string
	 */
	private $url = "";

	/**
	 * @var string
	 */
	private $options = "";

	/**
	 * @var string
	 */
	private $body = "";

	/**
	 * @var array
	 */
	private $params = [];

	/**
	 * @param ApiAuth $api_auth
	 * @param string $an_api_url
	 * @param array $an_api_params
	 */
	public function __construct(ApiAuth $api_auth, $an_api_url, $an_api_params = [])
	{
		$this->api_headers = $api_auth();
		$this->url         = $an_api_url;
		$this->setQueryStringParams($an_api_params);
	}

	public function send($method = "GET")
	{
		try {
			$api_request_url = $this->getRequestUrl();

			$headers = [
				'headers' => [
					"Api-Key"     => $this->api_headers['key'],
					"X-Signature" => $this->api_headers['signature'],
					"Accept"      => "application/json"
				],
				'verify'  => false
			];

			$client = new Client();
			return $client->request(
				$method,
				$api_request_url,
				$headers,
				$this->body
			);
		} catch (Exception $e) {
			throw new ServiceRequestException($e->getMessage());
		}
	}

	public function setQueryStringParams($api_params)
	{
		$this->params = $api_params;
		return $this;
	}

	public function setOptions($api_options)
	{
		$this->options .= $api_options . "/";
		return $this;
	}

	public function setBody($body)
	{
		$this->body .= $body;
		return $this;
	}

	/**
	 * @return string
	 */
	private function getRequestUrl()
	{
		return $this->url .= $this->options . "?" . http_build_query($this->params);
	}
}

class ServiceRequestException extends \ErrorException
{
}