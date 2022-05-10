import React, { useContext } from 'react'
import AppContext from '../context/AppContext'
import Table from './Table'
import Modal from './Modal'
import EditFlight from './modals/EditFlight'
import DeleteFlight from './modals/DeleteFlight'
import AddFlight from './modals/AddFlight'
import Button from './Button'

const Container = () => {

    const { editModal, deleteModal, addModal, setAddModal } = useContext(AppContext)

    const handleAdd = () => {
        setAddModal(!addModal);
    }

    return (
        <div className='py-16 flex justify-center'>
            <div >
                <div className='my-2'>
                    <Button type={"primary"} text={"Add flight"} onClick={handleAdd} />
                </div>
                <Table />
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
            </div>

        </div>
    )
}

export default Container