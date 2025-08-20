import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import { InertiaLink } from '@inertiajs/inertia-react';

export default function App({ children }) {
    return (
        <div>
            <nav>
                <InertiaLink href="/">Home</InertiaLink>
            </nav>
            <main>{children}</main>
        </div>
    );
}
