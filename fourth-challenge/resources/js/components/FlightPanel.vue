<template>
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-indigo-400 text-white">
                        Flight panel
                    </div>

                    <div
                        class="card-body space-around row justify-content-center"
                    >
                        <label for="companiesSelect">Airline Company:</label>
                        <select
                            id="companiesSelect"
                            @change="setCompany"
                            v-model="selectedCompany"
                        >
                            <option
                                v-for="company in companies"
                                :key="company.id"
                                :value="company.id"
                            >
                                {{ company.name }}
                            </option>
                        </select>
                        <hr class="my-3" />

                        <label for="originsSelect">Origin city:</label>
                        <select
                            id="originsSelect"
                            v-model="selectedOrigin"
                            @change="setOrigin"
                        >
                            <option
                                v-for="city in availableOrigins"
                                :value="city.id"
                                :key="city.id"
                            >
                                {{ city.name }}
                            </option>
                        </select>
                        <hr class="my-3" />

                        <label for="destinationsSelect"
                            >Destination city:</label
                        >
                        <select
                            id="destinationsSelect"
                            v-model="selectedDestination"
                            @change="setDestination"
                        >
                            <option
                                v-for="city in availableDestinations"
                                :value="city.id"
                                :key="city.id"
                            >
                                {{ city.name }}
                            </option>
                        </select>
                        <hr class="my-3" />

                        <label for="start">Departure:</label>
                        <input
                            type="datetime-local"
                            id="start"
                            name="trip-start"
                            min="2022-03-01T00:00"
                            :max="maxDepartureDate"
                            @change="setDepature"
                        />
                        <hr class="my-3" />

                        <label for="start">Arrival:</label>
                        <input
                            type="datetime-local"
                            id="end"
                            name="trip-end"
                            :min="minArrivalDate"
                            max="2022-12-31T00:00"
                            @change="setArrival"
                        />
                        <hr class="my-3" />
                        <button
                            class="btn btn-primary max-w-sm bg-indigo-500 hover:bg-indigo-600"
                            :disabled="buttonStatus"
                            @click="storeFlight"
                        >
                            Register new flight
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
        role="alert"
        v-if="savingSuccessful"
    >
        <strong class="font-bold">Flight registered successfully!</strong>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg
                class="fill-current h-6 w-6 text-green-500"
                role="button"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                @click="closePopup"
            >
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                />
            </svg>
        </span>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ["companies", "cities"],

    mounted() {},

    data() {
        return {
            selectedCompany: null,
            selectedOrigin: null,
            selectedDestination: null,
            selectedDeparture: null,
            selectedArrival: null,
            savingSuccessful: false,
        };
    },

    methods: {
        setCompany(e) {
            this.selectedCompany = parseInt(e.target.value);
        },
        setOrigin(e) {
            this.selectedOrigin = parseInt(e.target.value);
        },
        setDestination(e) {
            this.selectedDestination = parseInt(e.target.value);
        },
        setDepature(e) {
            this.selectedDeparture = e.target.value;
        },
        setArrival(e) {
            this.selectedArrival = e.target.value;
        },
        async storeFlight() {
            try {
                await axios.post(
                    "/manage/flights/",
                    {
                        origin_city_id: this.selectedOrigin,
                        destination_city_id: this.selectedDestination,
                        company_id: this.selectedCompany,
                        departure: this.selectedDeparture,
                        arrival: this.selectedArrival,
                    },
                    {
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    }
                );
                this.savingSuccessful = true;
            } catch (err) {
                console.log(err.response.data);
                console.log(err.response.headers);
                console.log(err.response.data);
            }
        },
        closePopup() {
            this.savingSuccessful = false;
        },
    },

    computed: {
        availableOrigins() {
            return this.cities.filter(
                (city) => city.id != this.selectedDestination
            );
        },
        availableDestinations() {
            return this.cities.filter((city) => city.id != this.selectedOrigin);
        },
        minArrivalDate() {
            return this.selectedDeparture
                ? this.selectedDeparture
                : "2022-03-01T00:00";
        },
        maxDepartureDate() {
            return this.selectedArrival
                ? this.selectedArrival
                : "2022-12-30T00:00";
        },
        buttonStatus() {
            return this.selectedCompany &&
                this.selectedOrigin &&
                this.selectedDestination &&
                this.selectedDeparture &&
                this.selectedArrival
                ? false
                : true;
        },
    },
};
</script>
