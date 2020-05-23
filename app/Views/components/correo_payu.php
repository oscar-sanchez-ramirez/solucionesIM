

<form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
    <input name="merchantId" type="hidden" value="<?= $merchantId ?>">
    <input name="accountId" type="hidden" value="512324">
    <input name="description" type="hidden" value="<?= $concepto ?>">
    <input name="referenceCode" type="hidden" value="<?= $referenceCode ?>">
    <input name="amount" type="hidden" value="<?= $amount ?>">
    <input name="tax" type="hidden" value="0">
    <input name="extra3" type="hidden" value="<?= $extra3 ?>">
    <input name="taxReturnBase" type="hidden" value="0">
    <input name="currency" type="hidden" value="<?= $currency ?>">
    <input name="signature" type="hidden" value="<?= $signature ?>">
    <input name="test" type="hidden" value="1">
    <input name="buyerEmail" type="hidden" value="">
    <input name="responseUrl" type="hidden" value="<?= base_url('confirmacion') ?>">
    <input name="confirmationUrl" type="hidden" value="<?= base_url('confirmacion') ?>">
    <!-- <input name="Submit" class="btn btn-success btn-lg btn-block" type="submit" value="Pagar con PayU"> -->
    <button name="Submit" class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-credit-card">&nbspPagar con PayU</i></button>
</form>