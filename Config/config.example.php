<?php
class Config {

	public static function processor($configKey) {
		$url = 'http://' . $_SERVER['HTTP_HOST'] . '?controller=checkout';

		$config = array(
			'AuthNetAim' => array(
				'class' => '\Payment\Provider\AuthorizeNet\AimProcessor',
				'config' => array(
					'sandbox' => true,
					'loginId' => '',
					'transactionKey' => ''
				),
			),
			'SofortMultipay' => array(
				'class' => '\Payment\Provider\Sofort\MultipayProcessor',
				'config' => array(
					'sandbox' => true,
					'apiKey' => '',
				),
			),
			'Paypal' => array(
				'class' => '\Payment\Provider\Paypal\ExpressCheckoutProcessor',
				'config' => array(
					'sandbox' => true,
				),
			)
		);

		foreach ($config as $processor => $processorConfig) {
			$config[$processor]['config']['callbackUrl'] =  $url . '&action=callback&processor=' . $processor;
			$config[$processor]['config']['cancelUrl'] =  $url . '&action=cancel&processor=' . $processor;
			$config[$processor]['config']['finishUrl'] =  $url . '&action=finish&processor=' . $processor;
		}

		if (empty($config[$configKey])) {
			throw new RuntimeException('Config not found');
		}
		return $config[$configKey];
	}

}