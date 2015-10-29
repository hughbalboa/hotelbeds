<?php namespace StayForLong\HotelBeds;

final class ServiceLocationList
{
	private $response;

	/**
	 * @param ServiceRequest $request
	 */
	public function __construct(ServiceRequest $request)
	{
		$this->response = $request();
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceLocationListException($e->getMessage());
		}
	}
}

class ServiceLocationListException extends \ErrorException
{
}