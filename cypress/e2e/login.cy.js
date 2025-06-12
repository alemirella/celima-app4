describe('Formulario de Login', () => {
  it('debería mostrar el campo de email', () => {
    cy.visit('http://localhost:8000/login');
    cy.get('input[type="email"]').should('exist');
  });
});
