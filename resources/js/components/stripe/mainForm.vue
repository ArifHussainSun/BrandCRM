<template>
    <div class="col-md-8 order-md-1" id="main-formarea">
        <h4 class="justify-content-between align-items-center mb-3 section-heading">
            <span class="badge badge-secondary display-desktop">1</span>
            <span class="badge badge-secondary display-mobile">2</span>
            <span>Billing Information</span>
        </h4>

        <form id="payment-form" class="needs-validation" action="{{ route('payment.stripe.process') }}" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name" data-parsley-required="true" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="lastName" name="lastname" placeholder=" Last Name " data-parsley-required="true" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="email" class="form-control" id="email" name="clientemail" placeholder="Email Address" data-parsley-type="email" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <vue-tel-input v-model="phone"></vue-tel-input>

                            <input type="tel" id="phone" name="phonenum" class="form-control" data-parsley-type="digits" style="width:100%;padding-right: 56px;">
                        </div>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <span id="valid-msg" class="hide"></span>
                    <span id="error-msg" class="hide"></span>
                </div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                <div class="invalid-feedback">
                    Please enter your address.
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <input type="text" class="form-control" id="companyName" name="companyname" placeholder="Company Name" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
                <div class="col-lg-6 mb-3">


                    <select class="custom-select d-block w-100" name="country" id="country" required>
                        <option selected disabled>Select Country</option>
                        <option v-for="country in countries" :key="country.id" value="{{ country.id }}" data-countryCode="{{ country.alpha_code2 }}">{{ country.country_name }}</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid country.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 mb-3">
                    <input type="text" class="form-control" name="statename" minlength="4" id="statename" placeholder="State" required>

                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <input type="number" class="form-control" name="zipcode" minlength="4" min="0" id="zip" placeholder="Zip Code" required>
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                </div>
            </div>

            <h4 class="justify-content-between align-items-center mb-3 mt-3 section-heading">
                <span class="badge badge-secondary display-desktop">2</span>
                <span class="badge badge-secondary display-mobile">3</span>
                <span>Payment Information</span>
            </h4>

            <CardElement></CardElement>
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" id="card-button" data-secret="<?php //echo $intent->client_secret; ?>" type="submit">Pay Now</button>
        </form>
    </div>
</template>

<script setup>
    import { reactive } from 'vue';
    import CardElement from './CardElement.vue'

    const props = defineProps({
                countries: { 
                    type: Array, 
                    default() {
                        return [];
                    } 
                },
            });

    const theme = reactive({
        anchor: process.env.MIX_BRAND_ANCHOR ?? "#ffffff",
        nav: process.env.MIX_BRAND_NAVBAR_COLOR ?? "#ffffff",
        primaryColor : process.env.MIX_BRAND_PRIMARYCOLOR ?? "#00cc66",
        backgroundColor: process.env.MIX_BRAND_PRIMARYCOLOR ?? "#00cc66"
    });
</script>

<style scoped>
.section-heading {background-color: v-bind('theme.primaryColor'); }
.section-heading{padding: 3px 10px 3px 3px; border-radius: 5px; color: #fff;}
.section-heading, .btn-primary,  .btn-primary:not(:disabled):not(.disabled).active,  .btn-primary:not(:disabled):not(.disabled):active,  .show>.btn-primary.dropdown-toggle {background-color: v-bind('theme.primaryColor'); border-color: v-bind('theme.primaryColor');}
</style>