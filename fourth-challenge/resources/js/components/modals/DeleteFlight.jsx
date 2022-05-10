import React, { useContext } from 'react'
import AppContext from '../../context/AppContext'
import Button from '../Button'

const DeleteFlight = () => {
    const { deleteFlight, setDeleteModal, deleteModal,updateFlights } = useContext(AppContext)
    console.log(deleteFlight)



    const handleDeleteFlight = async () => {
        const res = await axios.delete(`/manage/flights/${deleteFlight.id}`
        ).then(res => {
           updateFlights(deleteFlight,"delete");
           setDeleteModal(!deleteModal)
        })
    }
    return (
        <div>
            <div className="flex justify-end " onClick={() => setDeleteModal(!deleteModal)}>
                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h2 className="my-2 ">Do you want to delete <strong>{deleteFlight.company.name}</strong>'s flight with destination <strong>{deleteFlight.destination.name}</strong> ?</h2>
            <div className='full flex'>
                <Button type={"secondary"} text={"Cancel"} onClick={() => { setDeleteModal(!deleteModal) }} />
                <Button type={"primary"} text={"Delete"} onClick={handleDeleteFlight} />
            </div>
        </div>
    )
}

export default DeleteFlight