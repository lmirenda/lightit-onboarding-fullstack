import React from 'react'

const DatePicker = ({ id, min, max, label, onChange }) => {
    return (
        <div>
            <label htmlFor="departure">Departure:</label><br />
            <input className="border" type="datetime-local" id="departure" name="departure" onChange={e => setUpdatedDeparture(e.target.value)} />
        </div>
    )
}

export default DatePicker