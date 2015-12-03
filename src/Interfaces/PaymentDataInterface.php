<?php namespace StayForLong\HotelBeds\Interfaces;


interface PaymentDataInterface {
	public function setCardType($a_card_type);
	public function setCardNumber($a_card_number);
	public function setExpirationDate($a_expiration_date);
	public function setCardCVC($a_card_cvc);
}