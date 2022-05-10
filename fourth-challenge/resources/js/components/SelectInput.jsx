import React from 'react'

const SelectInput = ({ id, label, onChange, defaultValue, options }) => {
    return (
        <div className='w-full mr-2'>
            <label htmlFor={id} className="block text-sm font-medium text-gray-700">{label}</label>
            <select onChange={(e) => onChange(e.target.value)} id={id} name={id} defaultValue={defaultValue} className="border mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                {options.map((element) => <option value={element.id} key={element.id} id={element.id} >{element.name}</option>)}
            </select>
        </div>
    )
}

export default SelectInput