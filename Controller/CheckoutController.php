<?php
/**
 * CheckoutController
 *
 * @author Florian Krämer
 * @copyright 2013 Florian Krämer
 * @license GPLv2
 */

class CheckoutController extends Controller {

	/**
	 * Displays the available payment methods / processors
	 *
	 * @return void
	 */
	public function index() {
		$Processor = $this->_loadProcessor('AuthNetAim');
	}

	/**
	 * Initializes the payment
	 */
	public function payment() {
		$Processor = $this->_loadProcessor($_POST['data']['Payment']['processor']);
		$Processor->set(array(
				'payment_reason2' => 'Testing ' . date('Y-m-d H:i:s'),
				'payment_reason' => 'Testing ' . date('Y-m-d H:i:s'),
				'card_number' => '4007000000027', // Visa Test Card Number from Authorize.net
				'card_code' => '123',
				'card_expiration_date' => date('Y-m', strtotime('+3 years'))
			)
		);

		try {
			$response = $Processor->pay($_POST['data']['Payment']['amount']);
			if ($response->status() === \Payment\PaymentStatus::ACCEPTED) {
				$this->_setFlash('Payment sent successfully', 'success');
			}
		} catch (\Payment\Exception\PaymentException $e) {
			$this->_setFlash('Exception Thrown!', 'error', '<pre>' . debug($e, true) . '</pre>');
		}
	}

	/**
	 * This method will take the callbacks some payment providers might send
	 *
	 * @return void
	 */
	public function callback() {
		if (!isset($_GET['processor'])) {
			header('HTTP/1.0 404 Processor Not Found');
		}

		$Processor = $this->_loadProcessor($_GET['processor']);
		$result = $Processor->notificationCallback();
		$Processor->log($_SERVER['HTTP_REFERER'], 'callbacks');
		$Processor->log($_GET, 'callbacks');
		$Processor->log($_POST, 'callbacks');
		$Processor->log($result, 'callbacks');

		if ($result->status() === \Payment\PaymentStatus::ACCEPTED) {
			$this->_setFlash('Callback received!', 'success');
		}

		if ($result->status() === \Payment\PaymentStatus::DENIED) {

		}
	}

	/**
	 * Final step in the payment process, this displays just a thank you page
	 */
	public function finish() {

	}

	/**
	 *
	 */
	protected function _loadProcessor($processor) {
		$config = Config::processor($processor);
		return new $config['class']($config['config']);
	}

}