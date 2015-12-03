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
	 * @var array
	 */
	private $headers = [];

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
					"Accept"      => "application/json",
					"Content-Type" => "application/json",
					'Accept-Encoding' => "gzip",
				],
				'verify'  => false
			];

			$headers = array_merge($headers, $this->headers);

			$client = new Client();
			$response = $client->request(
				$method,
				$api_request_url,
				$headers,
				$this->body
			);

			return $response;

		} catch (\Exception $e) {
			throw new ServiceRequestException($e->getMessage());
		}
	}

	public function setHeaders(array $some_headers)
	{
		$this->headers = array_merge($this->headers, $some_headers );
		return $this;
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

	public function getApiHeaders(){
		return $this->api_headers;
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