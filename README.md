# Un libro a sorpresa

repositories:<br>
`un_libro_a_sorpresa_back`<br>
`un_libro_a_sorpresa_front` *( coming soon )*

Questo è il progetto di **un e-commerce che vende esperienze di lettura aumentata**: **un libro a sorpresa**, scelto dai librai sulla base delle **preferenze** dell'utente, tante **espansioni digitali** per arricchire la lettura e un segnalibro. L'utente può scegliere tra tre **diverse modalità di acquisto**: singolo, regalo, abbonamento. Le box sono, inoltre, personalizzabili con **più opzioni di packaging** e con l'**aggiunta di altri prodotti** a tema. 

## Scelte tecniche

- **React**+**JavaScript**+**Vite**, per il front-end e l'interfaccia utente/cliente
    - **React Router** per la navigazione
    - **TanStack Query** (e **Context**) per la gestione dei dati lato client
    - **Axios** per le chiamate API

- **Laravel** (**PHP**) per il *gestionale integrato* dell'e-commerce e gli *endpoint API* che verranno consumati dal front-end
    - **Breeze** e **Sanctum** per l'autenticazione
    - **Spatie** per ruoli e permessi.

- **Stripe** per i pagamenti e **MySQL** come database