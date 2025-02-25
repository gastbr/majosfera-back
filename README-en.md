[![Licencia: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![Estado del Despliegue](https://github.com/gastbr/majosfera-back/actions/workflows/deploy.yml/badge.svg)](https://github.com/gastbr/majosfera-back/actions/workflows/deploy.yml)

[Español](README.md) | **English**

<div align="center"><img src="https://github.com/gastbr/majosfera-front/blob/gaston/public/logo-dark-nobg.png?raw=true" alt="Logo Majosfera" width="400" /></div>

# Majosfera 🌍💙

## 📌 Description

**Majosfera** is an online store dedicated to **non-profit associations** that want to sell products to finance their causes. The platform allows associations to register their stores, manage products, and receive orders from customers interested in supporting their work.

The project is divided into two repositories:
- **Backend:** [`majosfera-back`](https://github.com/tu-usuario/majosfera-back), developed in **Laravel** with **Orion**.
- **Frontend:** [`majosfera-front`](https://github.com/tu-usuario/majosfera-front), developed in **React** with **Tailwind CSS**.

The database used is **MariaDB**.

## 🚀 Features

- User authentication system with roles (users, administrators, and store managers).
- REST API in Laravel using Orion for efficient resource management.
- Modern frontend in React with Tailwind CSS.
- Integrated payments and orders.
- Store and association management.
- Automated deployment with GitHub Actions.

---

## 🛠 Installation and Setup

### 📌 Prerequisites

- Node.js (>= 18.0)
- npm (>= 8.0)
- Laravel (>= 10)
- MariaDB
- Composer

### 🔧 Installation

1. Clone the backend repository:

   ```sh
   git clone https://github.com/tu-usuario/majosfera-back.git
   cd majosfera-back
   ```

2. Install backend dependencies:

   ```sh
   composer install
   ```

3. Configure the `.env` file in the backend:

   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

   Edit the database credentials and storage service settings.

4. Run migrations and seed the database:

   ```sh
   php artisan migrate --seed
   ```

5. Start the backend server:

   ```sh
   php artisan serve
   ```

6. In another terminal, clone the frontend repository:

   ```sh
   git clone https://github.com/tu-usuario/majosfera-front.git
   cd majosfera-front
   ```

7. Install frontend dependencies:

   ```sh
   npm install
   ```

8. Start the frontend:

   ```sh
   npm start
   ```

---

## 🌐 Automated Deployment

The project uses **GitHub Actions** for continuous deployment. Every time a push is made to the `prod` branch, workflows are triggered for:

- **Frontend:** Deployed on **Vercel/Render**.
- **Backend:** Deployed on **an SSH server or DigitalOcean**.
- **Database:** Managed on a separate server.

### 📜 Workflows

- `deploy.yml`: Automates the backend and frontend deployment.
- `build.yml`: Runs tests and verifies the build before deployment.

You can check the status in the **badges** above 👆.

---

## 📄 License

This project is licensed under **GNU GPLv3**. See the `LICENSE` file for more details.

---

## 🤝 Contributions

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a branch with your feature (`git checkout -b feature-new`).
3. Commit your changes (`git commit -m 'Added new feature'`).
4. Push to the branch (`git push origin feature-new`).
5. Open a **Pull Request**.

---

## 📬 Contact

If you have any questions or suggestions, you can open an **issue**. 🚀

