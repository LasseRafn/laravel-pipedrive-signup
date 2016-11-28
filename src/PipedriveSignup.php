<?php namespace LasseRafn\PipedriveSignup;

use GuzzleHttp\Client;

class PipedriveSignup
{
	protected $endpoint = 'https://app.pipedrive.com';
	private   $referralKey;

	function __construct()
	{
		$this->referralKey = config( 'pipedrive-signup.referral_key' );

		$this->client = new Client( [
			'base_uri' => $this->endpoint,
			'headers'  => [
				'Content-Type' => 'application/x-www-form-urlencoded'
			]
		] );
	}

	public function signup( $plan = 1, $name = '', $company = '', $email = '', $password = '', $companySize = '', $companyIndustry = '', $source = 'Other', $optInNews = 1, $country = 'US', $language = 'en', $locale = 'en_US', $collectPhone = 0, $timezone = 'UP1', $timezoneId = 'Europe/Copenhagen' )
	{
		try
		{
			$this->client->post( "/register?_v_country={$country}&_v_lang={$language}&promocode={$this->referralKey}", [
				'form_params'  => [
					'ducktape'         => 'cought',
					'country_code'     => $country,
					'user_lang'        => 1,
					'user_locale'      => $locale,
					'timezone'         => $timezone,
					'timezone_id'      => $timezoneId,
					'collect_phone_nr' => $collectPhone,
					'plan'             => $plan,
					'name'             => $name,
					'company_name'     => $company,
					'email'            => $email,
					'password'         => $password,
					'company_size'     => $companySize,
					'company_industry' => $companyIndustry,
					'signup_source'    => $source,
					'promo_code'       => $this->referralKey,
					'optin_news'       => $optInNews
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