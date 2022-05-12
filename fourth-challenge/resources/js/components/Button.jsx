import React from 'react'

const Button = ({ text, type, onClick }) => {

    const primary = "inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mx-1"
    const secondary = "inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mx-1 "

    return (
        <button type="button" className={type === "primary" ? primary : secondary} onClick={onClick}>{text}</button>


    )
}

export default Button