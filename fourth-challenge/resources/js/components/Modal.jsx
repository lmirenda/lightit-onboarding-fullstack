import React from 'react';
import ReactDOM from 'react-dom';


function Modal({ children }) {
  return ReactDOM.createPortal(
    <div className='fixed bg-gray-700 top-0 left-0 z-15 h-full w-full bg-opacity-60 flex items-center justify-center' >
      <div className='bg-white p-4 rounded w-1/3'>
        {children}
      </div>
    </div>
    ,
    document.getElementById('modal')
  )
}

export default Modal