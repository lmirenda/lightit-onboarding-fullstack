<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Flight ID</th>
                    <th>Company</th>
                    <th>Origin City</th>
                    <th>Destination City</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Administrate</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="flight in flightBatch" :key="flight.id">
                    <td>
                        {{ flight.id }}
                    </td>
                    <td>
                        {{ flight.company.name }}
                    </td>
                    <td>
                        {{ flight.origin.name }}
                    </td>
                    <td>
                        {{ flight.destination.name }}
                    </td>
                    <td>
                        {{ flight.departure }}
                    </td>
                    <td>
                        {{ flight.arrival }}
                    </td>
                    <td>
                        <button
                            class="btn bg-sky-400 mx-1 my-1 text-white hover:bg-sky-600"
                            @click="
                                showEditPanel = true;
                                selectedFlight = flight;
                            "
                        >
                            Edit
                        </button>
                        <button
                            class="btn bg-rose-500 mx-1 my-1 text-white hover:bg-rose-700"
                            @click="
                                showDeletePanel = true;
                                selectedFlight = flight;
                            "
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination
            v-model="page"
            :records="flightRecords"
            :per-page="recordsPerPage"
        />
    </div>
    <flight-delete
        v-if="showDeletePanel"
        :flight="selectedFlight"
        @closed="closeDeletePanel"
    />
    <flight-edit
        v-if="showEditPanel"
        :flight="selectedFlight"
        :companies="companies"
        :cities="cities"
        @closed="closeEditPanel"
    />
</template>

<script>
export default {
    props: ["flights", "companies", "cities"],
    mounted() {},

    data() {
        return {
            page: 1,
            recordsPerPage: 10,
            selectedFlight: null,
            showDeletePanel: false,
            showEditPanel: false,
        };
    },
    computed: {
        flightRecords() {
            return Object.keys(this.flights).length;
        },
        flightBatch() {
            let flightArr = Object.values(this.flights);
            let firstPos = (this.page - 1) * 10;
            let lastPos = firstPos + this.recordsPerPage;
            return flightArr.slice(firstPos, lastPos);
        },
    },
    methods: {
        setFlight(id) {
            for (flight in this.flights) {
                if (flight.id == id) {
                    this.selectedFlight = flight;
                }
            }
        },
        closeDeletePanel() {
            this.selectedFlight = null;
            this.showDeletePanel = false;
        },
        closeEditPanel() {
            this.selectedFlight = null;
            this.showEditPanel = false;
        },
    },
    components: {},
};
</script>
