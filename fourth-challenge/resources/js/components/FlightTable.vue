<template>
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
                >
                    Edit
                </button>
                <button
                    class="btn bg-rose-500 mx-1 my-1 text-white hover:bg-rose-700"
                >
                    Delete
                </button>
            </td>
        </tr>
    </tbody>
    <pagination
        v-model="page"
        :records="flightRecords"
        :per-page="recordsPerPage"
    />
</template>

<script>
export default {
    props: ["flights"],
    mounted() {
        console.log(Object.keys(this.flights).length);
    },

    data() {
        return {
            page: 1,
            recordsPerPage: 10,
        };
    },
    computed: {
        flightRecords() {
            return Object.keys(this.flights).length;
        },
        flightBatch() {
            let flightArr = Object.values(this.flights);
            let firstPos = 0 + (this.page - 1) * 10;
            let lastPos = firstPos + this.recordsPerPage;
            return flightArr.slice(firstPos, lastPos);
        },
    },
};
</script>
