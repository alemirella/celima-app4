<style>
    :root {
        --celima-admin-blue: #004f6b;
        --celima-admin-accent: #007b94;
        --celima-admin-light: #e3f7fb;
        --celima-admin-bg: #f5f8fa;
        --celima-admin-dark: #022531;
        --celima-admin-gray: #6c7a89;
        --celima-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        --base-font-size: 15px;
    }
    
    html {
        font-size: var(--base-font-size);
    }
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--celima-admin-bg);
        color: var(--celima-admin-dark);
        line-height: 1.6;
        overflow-x: hidden;
    }
    
    /* SIDEBAR */
    .sidebar {
        width: 240px;
        background: linear-gradient(180deg, var(--celima-admin-blue), var(--celima-admin-accent));
        min-height: 100vh;
    }
    
    .sidebar .nav-link {
        color: #d9f2f6;
        font-weight: 500;
        padding: 0.6rem 1rem;
        transition: background 0.2s ease;
        border-radius: 0.3rem;
    }
    
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
        background-color: #ffffff22;
        color: #fff;
    }
    
    /* NAVBAR HEADER */
    .admin-navbar {
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
    
    /* TEXT */
    h1, h2, h3 {
        font-weight: 700;
        color: var(--celima-admin-dark);
    }
    
    /* BUTTONS */
    .btn-primary {
        background-color: var(--celima-admin-blue);
        border: none;
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.5rem 1.2rem;
    }
    
    .btn-primary:hover {
        background-color: var(--celima-admin-accent);
    }
    
    /* FORMS */
    input.form-control,
    textarea.form-control,
    select.form-control {
        border-radius: 0.5rem;
        border: 1px solid #cbdfe5;
        padding: 0.6rem 1rem;
        background-color: #ffffff;
    }
    
    input.form-control:focus,
    textarea.form-control:focus,
    select.form-control:focus {
        border-color: var(--celima-admin-blue);
        box-shadow: 0 0 0 0.15rem rgba(0, 123, 138, 0.2);
    }
    
    label.form-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--celima-admin-dark);
    }
    
    /* CARDS */
    .card-custom {
        background-color: #ffffff;
        border-radius: 0.8rem;
        box-shadow: var(--celima-shadow);
        padding: 1.8rem;
    }
    
    /* ALERTS */
    .alert {
        border-radius: 0.6rem;
        padding: 0.8rem 1.2rem;
    }
    
    .alert-success {
        background-color: #d1f7e2;
        color: #155724;
        border: 1px solid #a3e4c2;
    }
    
    .alert-danger {
        background-color: #fceaea;
        color: #842029;
        border: 1px solid #f5c2c7;
    }
    
    /* FOOTER */
    footer {
        background-color: var(--celima-admin-blue);
        color: #e3f2f5;
        font-size: 0.85rem;
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
        background-color: #00c2d3;
        border-radius: 2px;
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
        color: #00c2d3;
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
    