// Importar la biblioteca de Firebase
import firebase from 'firebase/app';
import 'firebase/firestore';

// Inicializar Firebase
firebase.initializeApp({
    apiKey: "AIzaSyB9L3Zp3iMBb-e3WXXUzrbiJMeC4A6TV00",
    authDomain: "conti-event.firebaseapp.com",
    projectId: "conti-event",
});

// Crear un objeto de Firestore
const db = firebase.firestore();

// Función de autenticación
function autenticar_usuario(correo, contraseña) {
  // Verificar si el usuario existe en la base de datos
  db.collection('usuarios').where('correo', '==', correo).get().then((querySnapshot) => {
    if (querySnapshot.size > 0) {
      // Verificar la contraseña
      const usuario = querySnapshot.docs[0].data();
      if (usuario.contraseña === contraseña) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  });
}

// Función de registro
function registrar_usuario(nombre, apellidos, dni) {
  // Crear un nuevo documento de usuario en la base de datos
  db.collection('usuarios').add({
    nombre: nombre,
    apellidos: apellidos,
    dni: dni,
  });
}