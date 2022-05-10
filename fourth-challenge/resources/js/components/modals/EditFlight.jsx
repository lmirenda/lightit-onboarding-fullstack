import React, { useContext, useEffect, useState } from 'react'
import AppContext from '../../context/AppContext'
import Button from '../Button'
import SelectInput from '../SelectInput'
import axios from 'axios'

const EditFlight = () => {

  useEffect(() => {
    if (editFlight !== undefined) {
      const arrivalDate = editFlight.arrival.substring(0, 9) + "T" + editFlight.arrival.substring(11, 16)
      console.log(arrivalDate)
      setUpdatedArrival(arrivalDate)
    }
  }, [])


  const { editFlight, state, updateFlights, saveFlights, setEditModal, editModal } = useContext(AppContext)
  const [updatedCompany, setUpdatedCompany] = useState(editFlight.company.id)
  const [updatedOrigin, setUpdatedOrigin] = useState(editFlight.origin.id)
  const [updatedDestination, setUpdatedDestination] = useState(editFlight.destination.id)
  const [updatedDeparture, setUpdatedDeparture] = useState(editFlight.departure)
  const [updatedArrival, setUpdatedArrival] = useState(editFlight.arrival)

  const updateFlight = async () => {
    /*  console.log(updatedCompany, updatedOrigin, updatedDestination, updatedDeparture, updatedArrival) */

    let updatedFlight = {
      'origin_city_id': updatedOrigin,
      'destination_city_id': updatedDestination,
      'company_id': updatedCompany,
      'departure': updatedDeparture,
      'arrival': updatedArrival
    }
    const res = await axios.put(`/manage/flights/${editFlight.id}`, updatedFlight
    )
      .then(resp => {
        updateFlights(resp.data,"edit")
        setEditModal(!editModal)
      })
  }
  return (

    <div>
      <div className="flex justify-end " onClick={() => setEditModal(!editModal)}>
        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
          <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <h2 className="mb-2 ">Edit Flight</h2>
      <SelectInput id={"company"} label={"Company"} onChange={setUpdatedCompany} defaultValue={editFlight.company.id} options={state.companies} />
      <div className='flex mt-4'>
        <SelectInput id={"origin"} label={"Origin City"} onChange={setUpdatedOrigin} defaultValue={editFlight.origin.id} options={state.cities} />
        <SelectInput id={"destination"} label={"Destination City"} onChange={setUpdatedDestination} defaultValue={editFlight.destination.id}
          options={state.cities.filter(city => city.id !== parseInt(updatedOrigin))} />
      </div>


      <div className='flex my-4'>
        <div className='mr-2 w-full'>
          <label htmlFor="departure">Departure:</label><br />
          <input className="border w-full rounded p-1" type="datetime-local" id="departure" max={updatedArrival} name="departure" onChange={e => setUpdatedDeparture(e.target.value)} />
        </div>
        <div className=' w-full' >
          <label htmlFor="arrival">Arrival:</label><br />
          <input className="border w-full rounded p-1" type="datetime-local" id="arrival" name="arrival" min={updatedDeparture} onChange={e => setUpdatedArrival(e.target.value)} />
        </div>
      </div>
      <Button text={"Save changes"} type={"primary"} onClick={updateFlight} />

    </div>
  )
}

export default EditFlight