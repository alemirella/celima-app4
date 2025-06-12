<style>
:root {
    --celima-blue: #00a6c4;
    --celima-blue-dark: #007892;
    --celima-light: #dff3f7;
    --celima-bg: #f1f5f7;
    --celima-dark: #022b3a;
    --celima-gray: #5d6d7e;
    --celima-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    --base-font-size: 15px;
}

html {
    font-size: var(--base-font-size);
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--celima-bg);
    color: var(--celima-dark);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-top: 4rem;
    line-height: 1.6;
}

/* NAVBAR CLARA */
.navbar {
    background-color: var(--celima-blue);
    color: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
    padding: 0.6rem 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    border-bottom: none;
}

.navbar-scrolled {
    background-color: var(--celima-blue-dark);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
}

.navbar-brand {
    color: #ffffff !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 800;
    font-size: 1.5rem;
    letter-spacing: -0.5px;
}

.navbar-toggler {
    border: none;
}

.navbar-toggler-icon {
    filter: brightness(0.2) invert(1);
}

.navbar-nav .nav-link {
    color: #eafcff !important;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.4rem 0.8rem;
    border-radius: 0.3rem;
    transition: background 0.2s ease, color 0.2s ease;
}

.navbar-nav .nav-link.active,
.navbar-nav .nav-link:hover {
    background-color: #ffffff33;
    color: #ffffff !important;
}

/* MAIN */
main.container {
    padding-top: 2rem;
    padding-bottom: 2.5rem;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

h1 {
    font-size: 1.9rem;
    font-weight: 700;
    color: var(--celima-dark);
    margin-bottom: 1.5rem;
    text-align: center;
}

/* BOTONES */
.btn-primary {
    background-color: var(--celima-blue-dark);
    border: none;
    font-weight: 600;
    border-radius: 0.5rem;
    padding: 0.5rem 1.2rem;
    font-size: 0.95rem;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #005f72;
    color: #ffffff;
}

/* FORMULARIOS */
input.form-control,
textarea.form-control {
    border-radius: 0.5rem;
    border: 1px solid #cbdfe5;
    padding: 0.6rem 1rem;
    font-size: 0.95rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff;
}

input.form-control:focus,
textarea.form-control:focus {
    border-color: var(--celima-blue);
    box-shadow: 0 0 0 0.15rem rgba(0, 166, 196, 0.2);
}

label.form-label {
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--celima-dark);
    margin-bottom: 0.4rem;
}

/* ALERTAS */
.alert {
    border-radius: 0.6rem;
    padding: 0.8rem 1.2rem;
    font-size: 0.95rem;
    box-shadow: var(--celima-shadow);
}

.alert-success {
    background-color: #daf5e4;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #fbeaea;
    color: #842029;
    border: 1px solid #f5c2c7;
}

/* CARDS */
.card-custom {
    background-color: #ffffff;
    border-radius: 0.8rem;
    box-shadow: var(--celima-shadow);
    padding: 1.8rem;
    transition: transform 0.2s ease;
}

.card-custom:hover {
    transform: translateY(-3px);
}

/* FOOTER OSCURO */
footer {
    background-color: var(--celima-dark);
    color: #e3f2f5;
    padding: 1rem 0;
    text-align: center;
    font-size: 0.85rem;
    font-weight: 500;
    margin-top: auto;
}

/* RESPONSIVE */
@media (min-width: 768px) {
    main.container {
        max-width: 840px;
    }

    .navbar-nav .nav-link {
        margin-left: 0.3rem;
    }
}

/* ANIMACIONES */
.fade-slide-up {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.fade-slide-up.show {
    opacity: 1;
    transform: translateY(0);
}

/* ACORDEÓN */
.collapsible-header {
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    padding: 1rem;
    border-radius: 0.5rem;
    background-color: var(--celima-light);
    margin-bottom: 0.5rem;
    transition: background-color 0.3s ease;
}

.collapsible-header:hover {
    background-color: #cdeaf0;
}

.collapsible-arrow {
    transition: transform 0.3s ease;
}

.collapsible-arrow.rotate {
    transform: rotate(90deg);
}

.collapsible-content {
    display: none;
    padding: 0.75rem 1rem 1rem;
    background-color: #ffffff;
    border-radius: 0.5rem;
    box-shadow: var(--celima-shadow);
    margin-bottom: 1rem;
}

/* Animación navbar al cargar */
.navbar {
    animation: navbarFadeIn 0.5s ease-in-out;
}

@keyframes navbarFadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Footer decorativo y social */
footer {
    background-color: var(--celima-dark);
    color: #e3f2f5;
    padding: 2rem 0 1rem;
    text-align: center;
    font-size: 0.85rem;
    font-weight: 500;
    margin-top: auto;
    position: relative;
}

footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background-color: var(--celima-blue);
    border-radius: 2px;
    margin-bottom: 1rem;
}

.footer-social {
    margin-top: 0.8rem;
}

.footer-social a {
    color: #e3f2f5;
    margin: 0 0.5rem;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.footer-social a:hover {
    color: var(--celima-blue);
}

</style>