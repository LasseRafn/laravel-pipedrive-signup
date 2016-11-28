<?php namespace LasseRafn\PipedriveSignup;

use GuzzleHttp\Client;

class PipedriveSignup
{
	protected $endpoint = 'https://secure.e-conomic.com';
	private   $referralKey;

	function __construct()
	{
		$this->referralKey         = config( 'pipedrive-signup.referral_key' );

		$this->client = new Client( [
			'base_uri' => $this->endpoint,
			'headers'  => [
				'Content-Type' => 'application/x-www-form-urlencoded'
			]
		] );
	}

	public function signup( $userName, $userEmail, $companyName )
	{
		try
		{
			$this->client->post( '/secure/signup/partnertrial/', [
				'form_params'  => [
					'UserEmail'          => $userEmail,
					'UserName'           => $userName,
					'CompanyName'        => $companyName,
					'PartnerAgreementNo' => $this->partnerAgreementNo,
					'PartnerKey'         => $this->partnerKey
				],
				'Content-Type' => 'application/x-www-form-urlencoded'
			] );

			// todo check if redirected to welcome page!

			return true;
		} catch ( \Exception $exception )
		{
			throw new \Exception( $exception->getMessage(), $exception->getCode(), $exception->getPrevious() );
		}

	}
}