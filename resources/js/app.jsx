import { createRoot } from 'react-dom/client';
import React from 'react';
import { createInertiaApp } from '@inertiajs/react';
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init();

createInertiaApp({
    resolve: name => require(`./Pages/${name}`).default,
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
