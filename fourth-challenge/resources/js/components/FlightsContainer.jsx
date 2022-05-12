import React, { useContext } from 'react'
import AppContext from '../context/AppContext'
import FlightTable from './FlightTable'
import Modal from './Modal'
import EditFlight from './modals/EditFlight'
import DeleteFlight from './modals/DeleteFlight'
import AddFlight from './modals/AddFlight'
import Button from './Button'

const FlightsContainer = () => {

    const { editModal, deleteModal, addModal, setAddModal } = useContext(AppContext)

    const handleAdd = () => {
        setAddModal(!addModal);
    }

    return (
        <main className='py-16 flex justify-center'>
            <section>
                <div className='my-2'>
                    <Button type={"primary"} text={"Add flight"} onClick={handleAdd} />
                </div>
                <FlightTable />
                {editModal && (
                    <Modal>
                        <EditFlight />
                    </Modal>)}
                {deleteModal && (
                    <Modal>
                        <DeleteFlight />
                    </Modal>)}
                {addModal && (
                    <Modal>
                        <AddFlight />
                    </Modal>)}
            </section>
        </main>
    )
}

export default FlightsContainer