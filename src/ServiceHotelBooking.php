<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelBooking
{
	private $response;

	public function __construct(ServiceRequest $request, Holder $holder, Rooms $rooms, ClientReference $client_reference)
	{
		dump($request->getApiHeaders());
		$request_data = [
			"holder" => $holder->getHolderData(),
			"rooms" => $rooms->getRooms(),
			"clientReference" => $client_reference->getComments(),
		];
		
		$this->response = $request
			->setHeaders(['json' => $request_data])
			->setOptions("bookings")
			->send("POST");
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			return json_decode( $response, true);
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelBookingException($e->getMessage());
		}
	}
}

class ServiceHotelBookingException extends \ErrorException
{
}