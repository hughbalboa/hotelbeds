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
	 * @var array
	 */
	private $params = [];

	/**
	 * @param ApiAuth $api_auth
	 * @param $api_url
	 * @param array $api_params
	 */
	public function __construct(ApiAuth $api_auth, $api_url, array $api_params)
	{
		$this->api_headers = $api_auth();
		$this->url           = $api_url;
		$this->params        = $api_params;
	}

	public function __invoke()
	{
		try {
			$api_request_url = $this->getApiRequestUrl();

			$options = [
				'headers' => [
					"Api-Key"     => $this->api_headers['key'],
					"X-Signature" => $this->api_headers['signature'],
					"Accept"      => "application/json"
				],
				'verify'  => false
			];

			$client = new Client();

			return $client->request(
				"GET",
				$api_request_url,
				$options
			);
		} catch (Exception $e) {
			throw new ServiceRequestException($e->getMessage());
		}
	}

	/**
	 * @return string
	 */
	private function getApiRequestUrl()
	{
		return $this->url .= "?".http_build_query($this->params);
	}
}

class ServiceRequestException extends \ErrorException
{
}