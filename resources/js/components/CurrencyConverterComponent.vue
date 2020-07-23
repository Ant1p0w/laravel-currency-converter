<template>
    <div class="currency-converter" v-loading="loading">
        <div v-if="currencies.length >= 2" class="currency-converter__form-container">
            <el-form label-position="top" ref="converterForm" label-width="120px">
                <el-form-item label="Обменять" prop="price">
                    <el-input v-model="price"></el-input>
                </el-form-item>
                <el-row>
                    <el-col :span="8">
                        <el-form-item label="Из" prop="currency_from">
                            <el-select v-model="currency_from" placeholder="Select">
                                <el-option
                                    v-for="currency in currencies"
                                    :key="currency.id"
                                    :label="currency.name"
                                    :value="currency.id">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="8">
                        <el-button icon="el-icon-refresh" circle @click="switchCurrencies"></el-button>
                    </el-col>
                    <el-col :span="8">
                        <el-form-item label="На" prop="currency_from">
                            <el-select v-model="currency_to" placeholder="Select">
                                <el-option
                                    v-for="currency in currencies"
                                    :key="currency.id"
                                    :label="currency.name"
                                    :value="currency.id">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form>
        </div>
        <div class="currency-converter__result">
            Вы получите
            <div class="currency-converter__result-value">
                {{result_value}}
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                loading: true,
                currencies: [],
                price: 10000,
                currency_from: '',
                currency_to: ''
            }
        },
        mounted: function () {
            this.fetchData();
        },
        computed: {
            currency_from_rate: function () {
                if (this.currencies.length) {
                    return this.currencies.find(currency => currency.id === this.currency_from).rate.rate;
                }
            },
            currency_to_rate: function () {
                if (this.currencies.length) {
                    return this.currencies.find(currency => currency.id === this.currency_to).rate.rate;
                }
            },
            currency_to_name: function () {
                if (this.currencies.length) {
                    return this.currencies.find(currency => currency.id === this.currency_to).name;
                }
            },
            result_value: function () {
                if (this.currency_from_rate && this.currency_from_rate) {
                    let price = this.price / this.currency_from_rate * this.currency_to_rate;
                    return new Intl.NumberFormat('ru-RU', {
                        style: 'currency',
                        currency: this.currency_to_name
                    }).format(price);
                }
            }
        },
        methods: {
            fetchData: function () {
                axios.get('/api/currency/')
                    .then((response) => {
                        this.currencies = response.data;
                        this.loading = false;
                        this.currency_from = this.currencies[0].id;
                        this.currency_to = this.currencies[1].id;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            switchCurrencies: function () {
                let old_to = this.currency_to;
                this.currency_to = this.currency_from;
                this.currency_from = old_to;
            }
        },
    }
</script>
<style lang="scss">
    .currency-converter {
        font-family: Arial;
        max-width: 800px;
        margin: 0 auto;

        display: flex;
        align-items: center;

        &__form-container {
            width: 50%;
            margin: 15px;
            padding: 15px;
        }

        &__result {
            width: 50%;
            margin: 15px;
            padding: 15px;
            background: #eee;

            &-value {
                margin: 15px 0;
                font-size: 20px;
            }
        }
    }
</style>
