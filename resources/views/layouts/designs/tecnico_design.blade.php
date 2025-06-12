<style>
    :root {
        --tecnico-purple: #a07ac3; /* morado lila medio */
        --tecnico-purple-dark: #291057; /* vino más oscuro */
        --tecnico-purple-accent: #caa5e4;
        --tecnico-bg-light: #f6f2fb;
        --tecnico-text-dark: #352e40;
        --tecnico-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        --base-font-size: 15px;
    }

    html {
        font-size: var(--base-font-size);
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--tecnico-bg-light);
        color: var(--tecnico-text-dark);
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* SIDEBAR */
    .sidebar {
        width: 240px;
        min-height: 100vh;
        background: linear-gradient(180deg, var(--tecnico-purple-dark), var(--tecnico-purple));
    }

    .sidebar .nav-link {
        color: #f2e8fb;
        font-weight: 500;
        padding: 0.6rem 1rem;
        border-radius: 0.3rem;
        transition: background 0.2s ease;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
        background-color: #ffffff22;
        color: #fff;
    }

    /* NAVBAR */
    .tecnico-navbar {
        background-color: #ffffff;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    }

    /* MAIN */
    main.container {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* HEADINGS */
    h1, h2, h3, h4, h5, h6 {
        font-weight: 700;
        color: var(--tecnico-purple-dark);
    }

    /* CARDS */
    .card-custom {
        background-color: #ffffff;
        border-radius: 0.8rem;
        box-shadow: var(--tecnico-shadow);
        padding: 1.8rem;
    }

    /* BUTTONS */
    .btn-tecnico {
        background-color: var(--tecnico-purple);
        color: #fff;
        font-weight: 600;
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: 0.5rem;
    }

    .btn-tecnico:hover {
        background-color: var(--tecnico-purple-dark);
    }

    .btn-outline-tecnico {
        border: 2px solid var(--tecnico-purple);
        color: var(--tecnico-purple);
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.45rem 1.2rem;
    }

    .btn-outline-tecnico:hover {
        background-color: var(--tecnico-purple);
        color: #fff;
    }

    /* FORMS */
    input.form-control,
    textarea.form-control,
    select.form-control {
        border-radius: 0.5rem;
        border: 1px solid #d3c0e6;
        padding: 0.6rem 1rem;
        background-color: #ffffff;
        transition: all 0.2s ease-in-out;
    }

    input:focus, textarea:focus, select:focus {
        border-color: var(--tecnico-purple);
        box-shadow: 0 0 0 0.15rem rgba(160, 122, 195, 0.25);
    }

    label.form-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--tecnico-purple-dark);
    }

    /* ALERTS */
    .alert-success {
        background-color: #e9daf7;
        color: #4c1c73;
        border: 1px solid #c6a4e4;
        border-radius: 0.6rem;
        padding: 0.8rem 1.2rem;
    }

    .alert-danger {
        background-color: #fceaea;
        color: #842029;
        border: 1px solid #f5c2c7;
        border-radius: 0.6rem;
        padding: 0.8rem 1.2rem;
    }

    /* FOOTER */
    footer {
        background-color: var(--tecnico-purple-dark);
        color: #f4f4f4;
        font-size: 0.85rem;
        position: relative;
        text-align: center;
        padding: 1rem 0;
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background-color: var(--tecnico-purple-accent);
        border-radius: 2px;
    }

    .footer-social {
        margin-top: 0.8rem;
    }

    .footer-social a {
        color: #e6d3f1;
        margin: 0 0.5rem;
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .footer-social a:hover {
        color: var(--tecnico-purple-accent);
    }

    /* RESPONSIVE */
    @media (max-width: 991.98px) {
        .sidebar {
            display: none;
        }

        .main-content {
            width: 100%;
        }
    }
</style>
