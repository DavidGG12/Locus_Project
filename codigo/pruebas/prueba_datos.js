// Datos a enviar
const data = {
    nombre: 'John',
    apellido: 'Doe',
  };
  
  // Configurar la petición fetch
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  };
  
  // Realizar la petición fetch
  fetch('tu_archivo_php.php', requestOptions)
    .then(response => response.text())
    .then(result => {
      console.log(result);
      // Aquí puedes manejar la respuesta del servidor
    })
    .catch(error => {
      console.error('Error:', error);
    });
  