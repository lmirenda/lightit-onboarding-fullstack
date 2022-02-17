<template>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow my-4">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Flight ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Company
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Origin City
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Destination City
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Departure
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Arrival
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Administrate
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr
                                v-for="flight in flightBatch"
                                :key="flight.id"
                                class="whitespace-nowrap hover:bg-slate-50"
                            >
                                <td class="px-6 py-4">
                                    {{ flight.id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ flight.company.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ flight.origin.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ flight.destination.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ flight.departure }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ flight.arrival }}
                                </td>
                                <td>
                                    <button
                                        class="px-4 py-1 text-sm text-white bg-sky-400 rounded hover:bg-sky-500"
                                        @click="
                                            showEditPanel = true;
                                            selectedFlight = flight;
                                        "
                                    >
                                        Edit
                                    </button>
                                    <button
                                        class="px-4 py-1 text-sm text-white bg-red-400 rounded hover:bg-red-500 mx-2"
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
                </div>
                <pagination
                    v-model="page"
                    :records="flightRecords"
                    :per-page="recordsPerPage"
                />
            </div>
        </div>
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
