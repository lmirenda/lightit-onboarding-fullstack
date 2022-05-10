import React, { useState } from 'react'
import Container from '../components/Container'
import AppContext from '../context/AppContext'
import useInitialState from '../hooks/useInitialState'
import { useContext } from 'react'

export const Flights = () => {

    const initialState = useInitialState();

    return (
        <AppContext.Provider value={initialState}>
            <Container/>
        </AppContext.Provider>
    )
}
