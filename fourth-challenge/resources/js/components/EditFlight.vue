<template>
    <div
        id="authentication-modal"
        aria-hidden="true"
        class="flex h-screen overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0"
    >
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="authentication-modal"
                        @click="closePanel"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
                <div
                    class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8"
                    action="#"
                >
                    <h3
                        class="text-xl font-medium text-gray-900 dark:text-white"
                    >
                        Edit flight id: {{ flight.id }}
                    </h3>
                    <div>
                        <label
                            for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Company name:</label
                        >
                        <div>
                            <VueMultiselect
                                v-model="selectedCompany"
                                :options="companies"
                                track-by="id"
                                label="name"
                                value="id"
                                id="company"
                            >
                            </VueMultiselect>
                        </div>
                    </div>
                    <div>
                        <label
                            for="origin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Origin</label
                        >
                        <div>
                            <VueMultiselect
                                v-model="selectedOrigin"
                                :options="availableOrigins"
                                track-by="id"
                                label="name"
                                value="id"
                            >
                            </VueMultiselect>
                        </div>
                    </div>
                    <div>
                        <label
                            for="destination"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Destination</label
                        >
                        <div>
                            <VueMultiselect
                                v-model="selectedDestination"
                                :options="availableDestinations"
                                track-by="id"
                                label="name"
                                value="id"
                            >
                            </VueMultiselect>
                        </div>
                    </div>
                    <label for="departureCalendar">Departure:</label>
                    <input
                        type="datetime-local"
                        id="departureCalendar"
                        name="trip-start"
                        min="2022-03-01T00:00"
                        :max="maxDepartureDate"
                        @change="setDepature"
                        :value="selectedDeparture"
                    />
                    <hr class="my-3" />

                    <label for="arrivalCalendar">Arrival:</label>
                    <input
                        type="datetime-local"
                        id="arrivalCalendar"
                        name="trip-end"
                        :min="minArrivalDate"
                        max="2022-12-31T00:00"
                        @change="setArrival"
                        :value="selectedArrival"
                    />

                    <button
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        @click="editFlight"
                    >
                        Save changes
                    </button>
                    <button
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        @click="logTime"
                    >
                        Discard changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import VueMultiselect from "vue-multiselect";

export default {
    props: ["flight", "companies", "cities"],

    data() {
        return {
            selectedCompany: this.flight.company,
            selectedOrigin: this.flight.origin,
            selectedDestination: this.flight.destination,
            selectedDeparture: this.flight.departure.replace(/\s/g, "T"),
            selectedArrival: this.flight.arrival.replace(/\s/g, "T"),
            editSuccessful: false,
            editFailed: false,
        };
    },
    computed: {
        availableOrigins() {
            return this.selectedDestination
                ? this.cities.filter(
                      (city) => city.id != this.selectedDestination.id
                  )
                : this.cities;
        },
        availableDestinations() {
            return this.selectedOrigin
                ? this.cities.filter(
                      (city) => city.id != this.selectedOrigin.id
                  )
                : this.cities;
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
    },
    methods: {
        closePanel() {
            this.$emit("closed");
        },
        setDepature(e) {
            this.selectedDeparture = e.target.value;
        },
        setArrival(e) {
            this.selectedArrival = e.target.value;
        },
        async editFlight() {
            const res = await axios.put("/manage/flights/" + this.flight.id, {
                origin_city_id: this.selectedOrigin.id,
                destination_city_id: this.selectedDestination.id,
                company_id: this.selectedCompany.id,
                departure: this.selectedDeparture,
                arrival: this.selectedArrival,
            });
            console.log(res.status);
        },
    },
    components: { VueMultiselect },
};
</script>
