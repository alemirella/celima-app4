describe('Página principal', () => {
  it('debería cargar correctamente', () => {
    cy.visit('http://localhost:8000'); // o usa Cypress.env('APP_URL')
    cy.contains('Bienvenido'); // Cambia esto por texto real que esté en tu HTML
  });
});
