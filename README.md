# Anime Clothes Shopping Website 🛍️

A **full-stack anime-themed shopping website** offering an intuitive shopping experience for anime clothing enthusiasts. Built with a responsive frontend and a robust backend, it supports both user interaction and admin management.

- **Website:** [Akatsuki Clothes](http://mknguyen.great-site.net/index.php)
---

## 📖 Introduction

This website allows users to:
- **Search products** using a search bar.
- **Sign up and sign in** to their accounts.
- **Browse and select products** with size options.
- **Add items to a cart**, proceed to checkout, and make payments.
- Receive **email confirmation** for orders.

The **Admin Panel** includes features to:
- **Manage categories**, products, and orders.
- Perform **CRUD operations** (Create, Read, Update, Delete).
- Analyze sales performance and trends.

---

## 🛠️ Prerequisites

### Required Software
1. [XAMPP](https://www.apachefriends.org/index.html) - Local server for PHP and MySQL.
2. [Browser](https://www.google.com/chrome/) - Any modern browser like Chrome.
3. [VS Code](https://code.visualstudio.com/) - Code editor for making changes.

---

## 📂 System Structure

### **Frontend**
- Built with **HTML**, **CSS**, and **JavaScript**.
- Features a **responsive design** suitable for all devices.

### **Backend**
- Developed using **PHP** for server-side logic.
- Hosted on **XAMPP** with RESTful APIs.

### **Database**
- Uses **MySQL** to store user data, product details, and orders.

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/anime-clothes-shop.git
```

### 2. Setup the Project

#### Steps to Set Up:
1. **Place the Project Folder**:
   - Copy the project folder into the `htdocs` directory of your XAMPP installation.

2. **Database Configuration**:
   - Open your browser and navigate to `http://localhost/phpmyadmin`.
   - Create a new database named `anime_shop`.
   - Import the `anime_shop.sql` file located in the project folder to populate the database with the necessary tables and sample data.

3. **Update Configuration**:
   - If required, modify database connection settings in the backend PHP files to match your local environment. For example:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "anime_shop";
     ```

### 3. Start the Servers

- Launch the **XAMPP Control Panel**.
- Start the **Apache** and **MySQL** services.

### 4. Access the Website

- Open a browser and go to:
  ```plaintext
  http://localhost/anime-clothes-shop

## 📜 Features

### **User Side**
- **Search Products**: Easily find items using a responsive search bar.
- **Account Management**:
  - Sign up to create an account.
  - Log in to access personalized features.
- **Shopping and Checkout**:
  - Browse products and add items to the cart.
  - Select sizes, quantities, and checkout seamlessly.
- **Order Confirmation**:
  - Receive an email confirmation for your order.

### **Admin Side**
- **Category Management**: Add, update, or delete product categories.
- **Product Management**: Perform CRUD operations to manage inventory.
- **Order Management**: Track and process customer orders efficiently.
- **Sales Analytics**: View reports and analyze sales trends to optimize store performance.

---

## 🤝 Contributing

Contributions are welcome! Here's how to get started:

1. **Fork the Repository**:
   - Click the fork button at the top right of the repository page.

2. **Clone Your Fork**:
   ```bash
   git clone https://github.com/yourusername/anime-clothes-shop.git
   ```

## 📬 Contact

If you have any questions or feedback, feel free to reach out:

- **Email**: [mknguyen.dev.com](mailto:mknguyen.dev@gmail.com)
- **GitHub**: [Minh Nguyen](https://github.com/MinhNguyenCS)
- **LinkedIn**: [Minh Nguyen LinkedIn](https://www.linkedin.com/in/minhnguyenit)


