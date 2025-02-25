[![Licencia: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![Estado del Despliegue](https://github.com/gastbr/majosfera-back/actions/workflows/deploy.yml/badge.svg)](https://github.com/gastbr/majosfera-back/actions/workflows/deploy.yml)

**Español** | [English](README-en.md)

<div align="center"><img src="https://github.com/gastbr/majosfera-front/blob/gaston/public/logo-dark-nobg.png?raw=true" alt="Logo Majosfera" width="400" /></div>

# Majosfera 🌍💙

## 📌 Descripción

**Majosfera** es una tienda en línea dedicada a **asociaciones sin ánimo de lucro** que desean vender productos para financiar sus causas. La plataforma permite a las asociaciones registrar sus tiendas, gestionar productos y recibir pedidos de clientes interesados en apoyar su labor.

El proyecto está dividido en dos repositorios:
- **Backend:** [`majosfera-back`](https://github.com/gastbr/majosfera-back), desarrollado en **Laravel** con **Orion**.
- **Frontend:** [`majosfera-front`](https://github.com/gastbr/majosfera-front), desarrollado en **React** con **Tailwind CSS**.

La base de datos utilizada es **MariaDB**.

## 🚀 Características

- Sistema de autenticación con roles de usuario (usuarios, administradores y gestores de tiendas).
- API REST en Laravel utilizando Orion para gestión eficiente de recursos.
- Frontend moderno en React con Tailwind CSS.
- Pagos y pedidos integrados.
- Gestión de tiendas y asociaciones.
- Despliegue automatizado con GitHub Actions.

---

## 🛠 Instalación y configuración

### 📌 Prerrequisitos

- Node.js (>= 18.0)
- npm (>= 8.0)
- Laravel (>= 10)
- MariaDB
- Composer

### 🔧 Instalación

1. Clona el repositorio del backend:

   ```sh
   git clone https://github.com/tu-usuario/majosfera-back.git
   cd majosfera-back
   ```

2. Instala las dependencias del backend:

   ```sh
   composer install
   ```

3. Configura el archivo `.env` en el backend:

   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

   Edita las credenciales de la base de datos y del servicio de almacenamiento.

4. Ejecuta las migraciones y seedeo de la base de datos:

   ```sh
   php artisan migrate --seed
   ```

5. Inicia el servidor backend:

   ```sh
   php artisan serve
   ```

6. En otro terminal, clona el repositorio del frontend:

   ```sh
   git clone https://github.com/tu-usuario/majosfera-front.git
   cd majosfera-front
   ```

7. Instala las dependencias del frontend:

   ```sh
   npm install
   ```

8. Inicia el frontend:

   ```sh
   npm start
   ```

---

## 🌐 Despliegue Automatizado

El proyecto usa **GitHub Actions** para el despliegue continuo. Cada vez que se hace push en la rama `prod`, se ejecutan workflows para:

- **Frontend:** Desplegado en **Vercel/Render**.
- **Backend:** Desplegado en **un servidor SSH o DigitalOcean**.
- **Base de Datos:** Gestionada en un servidor separado.

### 📜 Workflows

- `deploy.yml`: Automatiza el despliegue de backend y frontend.
- `build.yml`: Ejecuta tests y verifica el build antes del despliegue.

Puedes ver el estado en los **badges** arriba 👆.

---

## 📄 Licencia

Este proyecto está bajo la licencia **GNU GPLv3**. Consulta el archivo `LICENSE` para más detalles.

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Para contribuir:

1. Haz un fork del repositorio.
2. Crea una rama con tu funcionalidad (`git checkout -b feature-nueva`).
3. Haz commit de tus cambios (`git commit -m 'Agregada nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature-nueva`).
5. Abre un **Pull Request**.

---

## 📬 Contacto

Si tienes dudas o sugerencias, puedes abrir un **issue**. 🚀

