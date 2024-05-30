<template>
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <input type="text" class="form-control" name="cardNo" maxlength="19" id="cardNo" placeholder="Card Number" v-cardformat:formatCardNumber required>

            <div class="invalid-feedback">
                Please provide a card number.
            </div>
        </div>

        <div class="col-lg-5 col-md-12 d-flex">
            <div class="col-lg-4 col-md-8">
                <input type="text" class="form-control" id="expiry_month" name="expiry_month" placeholder="MM / YY" v-cardformat:formatCardExpiry required>
                <div class="invalid-feedback">
                    Expiry Month is required.
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <input type="text" maxlength="4" class="form-control" id="cvc" name="cvc" placeholder="CVC" v-cardformat:formatCardCVC required>
                <div class="invalid-feedback">
                    CVC is required.
                </div>
            </div>
        </div>
        
        <div class="card-errors"></div>
    </div>
</template>

<script>

</script>

<style scoped>

</style>
