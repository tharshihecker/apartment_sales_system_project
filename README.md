# 🏢 Apartment Sales System

A complete and responsive **Apartment Sales Management System** built with **PHP**, **MySQL**, and **Bootstrap**. Designed for real estate companies to easily manage apartments, customers, and sales workflows — all in one place.

---

## 🚀 Features

- 🔐 Admin Authentication  
- 🏘️ Add / Edit / Delete Apartments  
- 👥 Manage Buyer Details  
- 📄 Record and Track Apartment Sales  
- 📊 Dashboard with Real-Time Statistics  
- 📁 Generate and Print Reports  
- ⚙️ Secure Admin Panel Interface

---

## 🛠️ Tech Stack

- PHP – Backend logic  
- MySQL – Database  
- HTML5 / CSS3 – Structure and design  
- Bootstrap – Responsive layout  
- JavaScript – Interactivity and UI behavior

---

## 📂 Folder Structure

apartment_sales_system_project/
├── admin/ → Admin dashboard pages
├── config/ → Database connection file
├── includes/ → Shared components (header/footer)
├── css/ → Stylesheets
├── js/ → JavaScript files
├── images/ → Uploaded apartment images
└── index.php → Login entry point

yaml
Copy
Edit

---

## 🔧 Setup Instructions

### 📥 Clone the repository

```bash
git clone https://github.com/tharshihecker/apartment_sales_system_project.git
🛠 Import the Database
Use phpMyAdmin or MySQL CLI to import the provided .sql file.

⚙️ Configure DB Connection
Open config/db.php and update:

php
Copy
Edit
$conn = new mysqli("localhost", "root", "", "apartment_sales");
🚀 Run the Project
Start XAMPP, Laragon, or run:

bash
Copy
Edit
php -S localhost:8000
Then visit: http://localhost/apartment_sales_system_project/

🧪 Default Admin Login
Username	Password
admin	admin123

(Check admin table in the DB if login fails)

📌 Future Enhancements
👤 Multi-role support (Admin, Agent, Buyer)

🖼 Apartment image galleries

💳 Payment gateway integration

📈 Interactive charts and analytics

📧 Email notifications

🤝 Contributing
We welcome all contributions! Fork the project, improve it, and submit a pull request. Let’s build it better together 🚀

📄 License
Licensed under the MIT License – free for personal and commercial use.

"Do anything you want with it, just don’t remove the original credit or blame us if it breaks."

