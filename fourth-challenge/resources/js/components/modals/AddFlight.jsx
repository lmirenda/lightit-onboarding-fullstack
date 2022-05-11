import React, { useContext, useEffect, useState } from 'react'
import AppContext from '../../context/AppContext'
import Button from '../Button'
import SelectInput from '../SelectInput'
import axios from 'axios'

const AddFlight = () => {



  const { state, updateFlights, setAddModal, addModal } = useContext(AppContext)
  const [company, setCompany] = useState()
  const [origin, setOrigin] = useState()
  const [destination, setDestination] = useState()
  const [departure, setDeparture] = useState()
  const [arrival, setArrival] = useState()
  const [errorMessage, setErrorMessage] = useState("")

  const addFlight = async () => {

    if (!company || !origin || !destination || !departure || !arrival) {
      setErrorMessage("All fields must be completed")
    }
    else if (parseInt(origin) === parseInt(destination)) {
      setErrorMessage("Origin city cannot be the same as arrival city")
    }
    else if (departure > arrival) {
      setErrorMessage("Arrival time cannot be before departure time")
    }
    else {
      setErrorMessage("")

      let newFlight = {
        'origin_city_id': origin,
        'destination_city_id': destination,
        'company_id': company,
        'departure': departure,
        'arrival': arrival
      }
      const res = await axios.post(`/manage/flights/`, newFlight
      )
        .then(resp => {
          updateFlights(resp.data, "add")
          setAddModal(!addModal)
        })
    }
  }

  return (

    <div>
      <div className="flex justify-end " onClick={() => setAddModal(!addModal)}>
        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
          <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <h2 className="mb-2 ">Add Flight</h2>
      <SelectInput id={"company"} label={"Company"} onChange={setCompany} placeholder={"Select company"} options={state.companies} />
      <div className='flex mt-4'>
        <SelectInput id={"origin"} label={"Origin City"} onChange={setOrigin} placeholder={"Select departure city"} options={state.cities} />
        <SelectInput id={"destination"} label={"Destination City"} placeholder={"Select arrival city"} onChange={setDestination}
          options={state.cities.filter(city => city.id !== parseInt(origin))} />
      </div>


      <div className='flex my-4'>
        <div className='mr-2 w-full'>
          <label htmlFor="departure">Departure:</label><br />
          <input className="border w-full rounded p-1" type="datetime-local" id="departure"/*  max={arrival} */ name="departure" onChange={e => setDeparture(e.target.value)} />
        </div>
        <div className=' w-full' >
          <label htmlFor="arrival">Arrival:</label><br />
          <input className="border w-full rounded p-1" type="datetime-local" id="arrival" name="arrival" /* min={departure} */ onChange={e => setArrival(e.target.value)} />
        </div>
      </div>
      <p>{errorMessage}</p>
      <Button text={"Add flight"} type={"primary"} onClick={addFlight} />
    </div>
  )
}

export default AddFlight