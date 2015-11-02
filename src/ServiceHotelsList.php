<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelsList
{
	private $response;

	/**
	 * @param ServiceRequest $request
	 */
	public function __construct(ServiceRequest $request)
	{
		$this->response = $request->setOptions("hotels")->send();
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelsListException($e->getMessage());
		}
	}
}

class ServiceHotelsListException extends \ErrorException
{
}