import React from 'react'
import ReactDOM from 'react-dom/client';
import FlightsContainer from '../components/FlightsContainer'
import AppContext from '../context/AppContext'
import useInitialState from '../hooks/useInitialState'


export const Flights = () => {

    const initialState = useInitialState();

    return (
        <AppContext.Provider value={initialState}>
            <FlightsContainer />
        </AppContext.Provider>
    )
}

if (document.getElementById("react")) {
    const domContainer = document.getElementById("react")
    const root = ReactDOM.createRoot(domContainer);
    root.render(<Flights />);
}
