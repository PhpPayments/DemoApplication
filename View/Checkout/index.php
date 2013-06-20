<div class="row">
	<div class="span2">
		<h5>Payment Processors</h5>
		<ul class="nav nav-tabs nav-stacked">
			<li id="auth-net-aim">Authorize.net AIM</li>
			<li id="auth-net-aim">Sofort Multiplay</li>
		</ul>
	</div>
	<div class="span10">
		<div class="alert">
			Do not forget to configure the sandboxes in config.php before trying to use a processor!
		</div>
		<form action="index.php?controller=checkout&action=payment" method="post">
			<label for="male">Payment Processor</label>
			<select name="data[Payment][processor]">
				<option value="AuthNetAim">Authorize.net AIM</option>
				<option value="SofortMultipay">Soft&uuml;berweisung Multipay</option>
			</select>

			<label for="male">Currency</label>
			<select name="data[Payment][currency]">
				<option value="USD">US Dollar</option>
				<option value="EUR">Euro</option>
				<option value="GBP">British Pound</option>
			</select>

			<label for="male">Amount to Pay</label>
			<input  name="data[Payment][amount]" type="text" value="51.51"/>

			<fieldet>
				<legend>Credit Card Data</legend>
				<label for="male">Credit Card Number</label>
				<input  name="data[Payment][card_number]" type="text" value="4007000000027"/>

				<label for="male">Credit Card Security Code</label>
				<input  name="data[Payment][card_code]" type="text" value="123"/>

				<label for="male">Credit Card Expiration Date (YYYY-MM)</label>
				<input  name="data[Payment][card_expiration_date]" type="text" value="<?php echo date('Y-m', strtotime('+2 years')); ?>"/>
			</fieldet>

			<fieldet>
				<legend>Recurring Payments</legend>

			</fieldet>
			<p>
				<button type="submit" class="btn btn-primary">Submit</button>
			</p>
		</form>
	</div>
</div>
