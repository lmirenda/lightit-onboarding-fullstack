<template>
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-indigo-400 text-white">Flight panel</div>

                    <div class="card-body space-around row justify-content-center">
                        <label for="companiesSelect">Airline Company:</label>
                        <select id="companiesSelect" @change="setCompany">
                            <option v-for="company in companies" :key="company.id" :value="company.id">
                                {{ company.name }}
                            </option>
                        </select>
                        <hr class="my-3">

                        <label for="companiesSelect">Origin city:</label>
                        <select id="originsSelect" v-model="foo">
                            <option v-for="city in cities" value="{{city.id}}" :key="city.id">
                                {{city.name}}
                            </option>
                        </select>
                        <hr class="my-3">
<!-- 
                        TODO:
                        Make destination city select not include selected origin city -->

                        <label for="companiesSelect">Destination city:</label>
                        <select id="destinationsSelect">
                            <option v-for="city in cities" value="{{city.id}}" :key="city.id">
                                {{city.name}}
                                </option>
                        </select>
                        <hr class="my-3">

                        <label for="start">Departure:</label>
                        <input type="date" id="start" name="trip-start"
                            value="2022-03-01"
                            min="2022-03-01" max="2022-12-31">
                        <hr class="my-3">
        
                        <label for="start">Arrival:</label>
                        <input type="date" id="end" name="trip-end"
                            value="2022-03-02"
                            min="2022-04-31" max="2022-12-31">
                        <hr class="my-3">
                        <button class="btn btn-primary max-w-sm bg-indigo-500 hover:bg-indigo-600">Register new flight</button>
                    </div>
                </div>
            </div>
        </div>
    {{selectedCompany}}
    </div>
</template>

<script>
//import axios from 'axios'
    export default {
        props: ['companies', 'cities'],

        mounted() {
            console.log(this.companies);
        },
        // methods: {
        //     async getCompanies() {
        //         const response = await axios.get('/manage/companies/data')
        //         this.companies = response.data
        //     }
        // },
        data() {
            return {
                selectedCompany: null,
                selectedOrigin: null,
                selctedDestiny: null,
                selectedDeparture: null,
                selectedArrival: null
            }
            
        },
        methods: {
            setCompany(e) {
                this.selectedCompany = e.target.value;
            },
            setOrigin(e) {
                this.selectedOrigin = e.target.value;
            },
            setDestiny(e) {
                this.selectedDestiny = e.target.value;
            }
        },
        computed: {

        }
    }
</script>
