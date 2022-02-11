<template>
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-indigo-400 text-white">Flight panel</div>

                    <div class="card-body space-around row justify-content-center">
                        <label for="companiesSelect">Airline Company:</label>
                        <select id="companiesSelect" @change="setCompany" v-model="selectedCompany">
                            <option v-for="company in companies" :key="company.id" :value="company.id">
                                {{ company.name }}
                            </option>
                        </select>
                        <hr class="my-3">

                        <label for="originsSelect">Origin city:</label>
                        <select id="originsSelect" v-model="selectedOrigin" @change="setOrigin">
                            <option v-for="city in availableOrigins" :value="city.id" :key="city.id">
                                {{city.name}}
                            </option>
                        </select>
                        <hr class="my-3">

                        <label for="destinationsSelect">Destination city:</label>
                        <select id="destinationsSelect" v-model="selectedDestination" @change='setDestination'>
                            <option v-for="city in availableDestinations" :value="city.id" :key="city.id">
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
                        <button class="btn btn-primary max-w-sm bg-indigo-500 hover:bg-indigo-600" >Register new flight</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            Company id: {{selectedCompany}}
            <br>
            Origin id: {{selectedOrigin}}
            <br>
            Destination id: {{selectedDestination}}
        </div>
    </div>
</template>

<script>
//import axios from 'axios'
    export default {
        props: ['companies', 'cities'],

        mounted() {
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
                selectedDestination: null,
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
            setDestination(e) {
                this.selectedDestination = e.target.value;
            }
        },  
        computed: {
            availableOrigins() {
                return this.cities.filter(city => city.id != this.selectedDestination)
            },
            availableDestinations() {
                return this.cities.filter( city => city.id != this.selectedOrigin)
            }
        }
    }
</script>
