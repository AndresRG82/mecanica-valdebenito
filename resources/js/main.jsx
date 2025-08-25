import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom'; // <- importar router
import App from './App';
import ThemeProvider from './utils/ThemeContext';

createRoot(document.getElementById('app')).render(
  <React.StrictMode>
    <ThemeProvider>
      <BrowserRouter> {/* <- envolver App */}
        <App />
      </BrowserRouter>
    </ThemeProvider>
  </React.StrictMode>
);
