import React, { useState, useEffect, useContext } from 'react'
import AppContext from '../context/AppContext';
import Button from './Button'

const Table = () => {

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

    const handleEdit = (vuelo) => {
        setEditModal(!editModal);
        setEditFlight(vuelo)
    }

    const handleDelete = (vuelo) => {
        setDeleteModal(!deleteModal);
        setDeleteFlight(vuelo)
    }
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
            <tbody className="">
                {state.flights.map((vuelo, i) => (
                    <tr key={vuelo.id} className={i % 2 === 0 ? "bg-gray-50" : "bg-white"} >
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.id}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.company.name}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.origin.name}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.destination.name}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.departure}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            {vuelo.arrival}
                        </td>
                        <td className="px-6 py-2 text-xs text-gray-500" >
                            <Button type="primary" text="Edit" onClick={() => handleEdit(vuelo)} />
                            <Button type="secondary" text="Delete" onClick={() => handleDelete(vuelo)} />
                        </td>
                    </tr>
                )
                )}
            </tbody>
        </table>
    )
}

export default Table