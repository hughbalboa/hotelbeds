<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelsDestinationAvailability
{
	private $response;

	/**
	 * @param ServiceRequest $request
	 */
	public function __construct(ServiceRequest $request, $request_params)
	{
		$body = "";
		$this->response = $request->setOptions("hotels")
			->setBody($body)
			->send("POST");
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelsDestinationAvailabilityException($e->getMessage());
		}
	}
}

class ServiceHotelsDestinationAvailabilityException extends \ErrorException
{
}