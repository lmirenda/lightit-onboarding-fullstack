import React, { useEffect, useContext } from 'react'
import AppContext from '../context/AppContext';
import ItemRow from './ItemRow';

const FlightTable = () => {

    const { state, saveFlights, editModal, setEditModal, setEditFlight, deleteModal, setDeleteModal, setDeleteFlight } = useContext(AppContext);

    useEffect(() => {
        axios.get('/get/flights')
            .then(resp => {
                console.log(resp.data)
                saveFlights(resp.data)
            }
            )
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }, [])

    return (

        <table  >
            <thead className="bg-indigo-100 border-gray-200">
                <tr>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Flight ID
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Company
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Origin City
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Destination City
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Departure
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Arrival
                    </th>
                    <th className="px-6 py-2 text-xs text-gray-500">
                        Administrate
                    </th>
                </tr>
            </thead>
            <tbody>
                {state.flights.map((flight, i) =>
                    <ItemRow key={i} i={i} flight={flight} />
                )}
            </tbody>
        </table>
    )
}

export default FlightTable