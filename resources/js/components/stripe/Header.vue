<template>
    <div class="loader-bg">
        <i class="fa fa-spinner fa-spin loader-spin" aria-hidden="true"></i>
    </div>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="logo">
                        <a href="{{ route('front.home') }}">
                            <img src="{{ brand.logo }}" height="30px" alt="Logo" />
                        </a>
                    </div>
                </div>
                
                <div class="col-md-9 col-5 d-none d-sm-none d-md-block" v-if="brand.company_phone">
                    <a :href="'tel:'+brand.company_phone" class="company_number"><i class="fa fa-phone"></i> <span>{{ brand.company_phone }}</span></a>
                </div>
            </div>
        </div>

    </header>
</template>

<script setup>
    import { reactive } from 'vue';

    const brand = reactive({
        'company_phone': "",
        'logo': ""
    });

    const theme = reactive({
        anchor: process.env.MIX_BRAND_ANCHOR ?? "#ffffff",
        nav: process.env.MIX_BRAND_NAVBAR_COLOR ?? "#ffffff",
        primaryColor : process.env.MIX_BRAND_PRIMARYCOLOR ?? "#00cc66",
        backgroundColor: process.env.MIX_BRAND_PRIMARYCOLOR ?? "#00cc66"
    });
</script>

<style scoped>
    .header { background: v-bind('theme.backgroundColor'); }
    .header { border: 1px solid v-bind('theme.backgroundColor');}
    .header { position: relative;  width: 100%; padding: 7px 0 9px 0; z-index: 100;  transition: all .5s; }
     .badge-secondary { color: v-bind('theme.primaryColor'); }
     .badge-secondary { padding: .25em 0.6em; font-size: 100%; }
    .badge-secondary { color: v-bind('theme.primaryColor'); }
    .badge-secondary { background-color: #ffffff; margin-right: 10px; border-radius: .25rem 0 0 .25rem; }
    .company_number{ color: #000000;}
</style>