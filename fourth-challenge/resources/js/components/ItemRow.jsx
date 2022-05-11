import React, { useContext } from 'react'
import AppContext from '../context/AppContext';
import Button from './Button';


const ItemRow = ({ i, flight }) => {

    const { editModal, setEditModal, setEditFlight, deleteModal, setDeleteModal, setDeleteFlight } = useContext(AppContext);

    const handleEdit = (vuelo) => {
        setEditModal(!editModal);
        setEditFlight(vuelo)
    }

    const handleDelete = (vuelo) => {
        setDeleteModal(!deleteModal);
        setDeleteFlight(vuelo)
    }
    return (
        <tr key={flight.id} className={i % 2 === 0 ? "bg-gray-50" : "bg-white"} >
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.id}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.company.name}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.origin.name}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.destination.name}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.departure}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                {flight.arrival}
            </td>
            <td className="px-6 py-2 text-xs text-gray-500" >
                <Button type="primary" text="Edit" onClick={() => handleEdit(flight)} />
                <Button type="secondary" text="Delete" onClick={() => handleDelete(flight)} />
            </td>
        </tr>
    )
}

export default ItemRow