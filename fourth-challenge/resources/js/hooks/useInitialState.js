import { useState } from 'react';
import initialState from '../initialState'

const useInitialState = () => {
    const [state, setState] = useState(initialState)

    //como vamos a modificar este estado? que funciones actualizan este estado

    const saveFlights = payload => {
        setState({ ...state, flights: payload.flights, cities: payload.cities, companies: payload.companies })
    }

    const [editModal, setEditModal] = useState(false)
    const [editFlight, setEditFlight] = useState([])

    const [deleteModal, setDeleteModal] = useState(false)
    const [deleteFlight, setDeleteFlight] = useState([])

    const [addModal, setAddModal] = useState(false)


    const updateFlights = (receivedFlight, type) => {

        if (type === "edit") {
            let pos;
            state.flights.forEach((stateFlights, i) =>
                (stateFlights.id === receivedFlight.id) ?
                    pos = i : null)
            let auxFlights = state.flights
            auxFlights[pos] = receivedFlight
            setState({ ...state, flights: auxFlights })
        } else if (type === "add") {

            let newFlights = state.flights
            newFlights.push(receivedFlight)
            setState({ ...state, flights: newFlights })

        } else if (type === "delete") {
            console.log(state.flights)
            let newFlights = state.flights
            newFlights=newFlights.filter(flight=>flight.id!==receivedFlight.id)
            setState({ ...state, flights: newFlights })
        }
    }

    return {
        editModal,
        setEditModal,
        saveFlights,
        state,
        editFlight,
        setEditFlight,
        updateFlights,
        deleteModal,
        setDeleteModal,
        deleteFlight,
        setDeleteFlight,
        addModal,
        setAddModal
    }
}


export default useInitialState