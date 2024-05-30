<template>
    <Header></Header>
    <div class="container padd-30-on-mob">
        <div class="row">
            <pageSidebar :service="data.service"></pageSidebar>
            <mainForm :countries="data.countries"></mainForm>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="threeDSecure-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="threeDIframe_Body"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { reactive, onMounted } from 'vue';
    import Header from '../components/stripe/Header.vue'
    import pageSidebar from '../components/stripe/pageSidebar.vue'
    import mainForm from '../components/stripe/mainForm.vue'

    const data = reactive({
                service: '',
                countries: ''
            });

    onMounted(() => {
        console.log(process.env.MIX_APP_URL);
        getTokenDetail().then(paymentLink => {
            data.service = paymentLink.data.service;
        });

        getCountries().then(countries => {
            data.countries = countries.data;
        });
    });

    async function getTokenDetail() {
        const token = getQueryParam('token');
        
        return await axios.get(route('payment.fetch.token', {_query: {token: token}}))
        .then(response => {
            if(response.status == 200) {
                return response.data;
            } else {
                throw new Error("API error");
            }
        }).then(data => {
            return data;
        })
        .catch(function (response) {
            //handle error
            console.log(response);
            return false;
        });
    }

    async function getCountries() {
        const token = getQueryParam('token');
        
        return await axios.get(route('api.fetch.countries'))
            .then(response => {
                if(response.status == 200) {
                    return response.data;
                } else {
                    throw new Error("API error");
                }
            }).then(data => {
                return data;
            }).catch(function (response) {
                //handle error
                console.log(response);
                return false;
            });
    }
    
    function getQueryParam(key) {
        const searchParams = new URLSearchParams(window.location.search);
        return searchParams.get(key);
    }
</script>