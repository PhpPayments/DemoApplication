<h2>Silent Post API Callback</h2>
<p>
	This will simulate a so called "silent post" callback from the Authorize.Net API
</p>
<form action="?controller=Checkout&action=callback&processor=AuthNetAim" method="post">
    <input type="input" name="x_response_code" value="1"/>
    <input type="input" name="x_response_subcode" value="1"/>
    <input type="input" name="x_response_reason_code" value="1"/>
    <input type="input" name="x_response_reason_text" value="This transaction has been approved."/>
    <input type="input" name="x_auth_code" value=""/>
    <input type="input" name="x_avs_code" value="P"/>
    <input type="input" name="x_trans_id" value="1821199455"/>
    <input type="input" name="x_invoice_num" value=""/>
    <input type="input" name="x_description" value=""/>
    <input type="input" name="x_amount" value="9.95"/>
    <input type="input" name="x_method" value="CC"/>
    <input type="input" name="x_type" value="auth_capture"/>
    <input type="input" name="x_cust_id" value="1"/>
    <input type="input" name="x_first_name" value="John"/>
    <input type="input" name="x_last_name" value="Smith"/>
    <input type="input" name="x_company" value=""/>
    <input type="input" name="x_address" value=""/>
    <input type="input" name="x_city" value=""/>
    <input type="input" name="x_state" value=""/>
    <input type="input" name="x_zip" value=""/>
    <input type="input" name="x_country" value=""/>
    <input type="input" name="x_phone" value=""/>
    <input type="input" name="x_fax" value=""/>
    <input type="input" name="x_email" value=""/>
    <input type="input" name="x_ship_to_first_name" value=""/>
    <input type="input" name="x_ship_to_last_name" value=""/>
    <input type="input" name="x_ship_to_company" value=""/>
    <input type="input" name="x_ship_to_address" value=""/>
    <input type="input" name="x_ship_to_city" value=""/>
    <input type="input" name="x_ship_to_state" value=""/>
    <input type="input" name="x_ship_to_zip" value=""/>
    <input type="input" name="x_ship_to_country" value=""/>
    <input type="input" name="x_tax" value="0.0000"/>
    <input type="input" name="x_duty" value="0.0000"/>
    <input type="input" name="x_freight" value="0.0000"/>
    <input type="input" name="x_tax_exempt" value="FALSE"/>
    <input type="input" name="x_po_num" value=""/>
    <input type="input" name="x_MD5_Hash" value="A375D35004547A91EE3B7AFA40B1E727"/>
    <input type="input" name="x_cavv_response" value=""/>
    <input type="input" name="x_test_request" value="false"/>
    <input type="input" name="x_subscription_id" value="365314"/>
    <input type="input" name="x_subscription_paynum" value="1"/>
    <input type="submit"/>