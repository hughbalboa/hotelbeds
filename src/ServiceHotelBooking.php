<?php

namespace StayForLong\HotelBeds;

final class ServiceHotelBooking
{
	private $response;

	/**
	 * @param ServiceRequest $request
	 * @param Holder $holder
	 * @param Rooms $rooms
	 * @param ClientReference $client_reference
	 * @throws ServiceHotelBookingException
	 */
	public function __construct(ServiceRequest $request, Holder $holder, Rooms $rooms, ClientReference $client_reference)
	{
		try{
			$request_data = [
				"holder" => $holder->getHolderData(),
				"rooms" => $rooms->getRooms(),
				"clientReference" => $client_reference->getReference(),
			];
			$this->response = $request
				->setHeaders(['json' => $request_data])
				->setOptions("bookings")
				->send("POST");
		}catch (\Exception $e){
			throw new ServiceHotelBookingException($e->getMessage());
		}
	}

	public function __invoke()
	{
		try {
			$response = $this->response->getBody();
			$response = json_decode( $response, true);
			$response_book = $response['booking'];
			$response_book['raw_response'] = $response;

			return $response_book;
		} catch (ServiceRequestException $e) {
			throw new ServiceHotelBookingException($e->getMessage());
		}
	}
}

class ServiceHotelBookingException extends \ErrorException
{
}