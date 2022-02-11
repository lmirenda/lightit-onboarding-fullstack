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
                        <input type="datetime-local" id="start" name="trip-start"
                            min="2022-03-01T00:00" :max="maxDepartureDate"
                            @change='setDepature'>
                        <hr class="my-3">
        
                        <label for="start">Arrival:</label>
                        <input type="datetime-local" id="end" name="trip-end"
                            :min="minArrivalDate" max="2022-12-31T00:00"
                            @change='setArrival'>
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
            <br>
            Dep date: {{selectedDeparture}}
            <br>
            Arr date: {{ selectedArrival }}
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
            },
            setDepature(e){
                this.selectedDeparture = e.target.value
            },
            setArrival(e){
                this.selectedArrival = e.target.value
            }
        },  
        computed: {
            availableOrigins() {
                return this.cities.filter(city => city.id != this.selectedDestination)
            },
            availableDestinations() {
                return this.cities.filter( city => city.id != this.selectedOrigin)
            },
            minArrivalDate() {
                return this.selectedDeparture ? this.selectedDeparture : '2022-03-01T00:00'
            },
            maxDepartureDate() {
                return this.selectedArrival ? this.selectedArrival : '2022-12-30T00:00'
            }
        }
    }
</script>
