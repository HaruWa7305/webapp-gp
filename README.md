## Group 6
## Group Members:

| Name                                        | Matric No      |
|---------------------------------------------|----------------|
| Muhammad Hanif Faiq Bin Mazlan              | 2221773        |
| Isyraq Haziq Bin Mohd Ridza                 | 2225321        |
| Muhammad Waqiuddin Aqhar Bin Mohd Yatim     | 2314937        |
| Wan Ahmed Fauzizafry Bin Wan Khalid         | 2221141        |
| Mohamad Nur Hakimi Bin Asmadi               | 2213091        |

---

## Project Title

**Beanie: Laravel Coffee Shop Ordering System**

---

## Introduction

Beanie is an interactive and user-friendly Laravel-based web application designed for a coffee shop business. The platform enables customers to browse menus, place orders, and track their order statuses online. The system will also streamline the backend process for shop staff to manage products  and incoming orders efficiently. This project aims to digitalize the coffee shop experience while promoting ease and convenience for both customers and staff.

## Objectives

- To build a functional and responsive coffee shop ordering system using Laravel Model View Controller architecture.
- To provide customers with a seamless online ordering experience for drinks and food.
- To allow admin/staff to manage product inventory and order history through a dedicated dashboard.
- To implement user authentication and authorization (Admin vs Customer roles).
- To ensure all features are Shariah-compliant and ethical in operation.

---

## Features and Functionalities

### For Customers:

  The system provides a simple registration and login process. Users can sign up using their name, email, and password, and once logged in they can browse the coffee shop’s menu. Each menu item includes a name, price, description, and photo to help customers make informed choices. Customers can add items to their cart and place orders online. Before confirming, they can review their cart contents and once the order is placed, they receive a confirmation. All their past orders are saved in their account, allowing them to view order history and track the status of current orders. Additionally, there is a contact or feedback form that allows customers to send messages to the shop. They simply need to provide their name, email, and message. This creates a direct line of communication between the customers and the admin, enabling the coffee shop to receive feedback or respond to inquiries.

### For Admin/Staff:

  The system includes a secure login process for staff and administrators. Once logged in, the admin panel provides access to a centralized dashboard where staff can manage the entire coffee shop ordering system. Through this dashboard, they can view, add, edit, or remove menu items. Each item includes a name, price, description, and photo. This allows staff to keep the product inventory up-to-date and accurate.

Admins can also manage product , ensuring that the menu is organized and easy to navigate for customers. When a customer places an order, the admin panel will display the order details in real time, including item list, quantity, total amount, customer info, and order status.

Staff have the ability to update order statuses (e.g., Pending, Completed), which helps streamline operations and keep customers informed about the progress of their orders. All orders are recorded in the system.

Additionally, admins can view customer reviews and feedback submitted via the contact form. This enables them to monitor customer satisfaction and respond to any concerns, ensuring quality service and continuous improvement. The system ensures that all administrative functions are performed efficiently while maintaining data accuracy and security.

---

## ERD (Entity Relationship Diagram)
![Image](https://github.com/user-attachments/assets/1ab7a943-3de9-4a87-aa69-c82c6c04d9c7)

---

## Sequence Diagram
![sequence diagram](https://github.com/user-attachments/assets/dffddb51-2692-4001-93c2-b3132f7ebc20)

---

## Project system captured screen and explanation

USER INTERFACE

![Screenshot 2025-06-12 071729](https://github.com/user-attachments/assets/82ff923b-98c9-4cf6-83ce-30c97e62ee45)
![Screenshot 2025-06-12 071754](https://github.com/user-attachments/assets/54a445bf-55b5-46e1-9375-9fe59b1eb54a)

User Authentication

- Users can register, log in, and reset passwords using their email.
- Logged-in users can access their profile which displays their name and email.
   
 ![Screenshot 2025-06-12 071940](https://github.com/user-attachments/assets/e2bfa9f2-3c75-4b55-856c-f5c4c4756944)
 
 Home Page

- Welcome message and introduction to the coffee shop.
- Simple navigation to explore the menu and other pages.
   
 ![Screenshot 2025-06-12 071951](https://github.com/user-attachments/assets/c8484bae-8043-46af-ae36-f38bd587812a)
 
 About Page

- Brief introduction about Beanie Coffee Shop and its offerings.
- Display of a few featured menu items like espresso, cappuccino, and blueberry muffin.
    
 ![Screenshot 2025-06-12 072000](https://github.com/user-attachments/assets/85163e76-6436-4ac4-a5bb-9736484cd83b)

 Contact Page
 - Contact form for users to send inquiries or feedback directly.
    
 ![Screenshot 2025-06-12 073858](https://github.com/user-attachments/assets/4c989f97-9bc2-422d-af65-872172cdc73f)

 Menu & Order Page

- Customers can browse available drinks (Americano, Espresso, Latte, Cappuccino, Mocha).
- Each item includes price, description, and an "Add to Cart" button.

 ![Screenshot 2025-06-12 072052](https://github.com/user-attachments/assets/c35bf236-eabb-4daf-900f-bdff78110e45)

 Profile page
 - User can see their information and profile
   
 ![Order Status](https://github.com/user-attachments/assets/e6c14a5d-3c91-4807-af5a-130f71185897)
 Order Status Page
- After logging in, users can check the status of their orders.



ADMIN INTERFACE

![WhatsApp Image 2025-06-12 at 07 40 51_2e3fb021](https://github.com/user-attachments/assets/81aabd09-8d70-4093-a470-6a9deec1d786)

![WhatsApp Image 2025-06-12 at 07 40 51_f93aa553](https://github.com/user-attachments/assets/769533f3-e04e-4e25-a3f7-5e35d1ecdb19)

![WhatsApp Image 2025-06-12 at 07 40 51_330d7a72](https://github.com/user-attachments/assets/88cc095d-fdcd-4d53-9a9f-ed5da96f2b66)

Dashboard
- Admin can view all orders, check status (Pending/Completed), update status, or delete orders.

Manage Products
- Admin can add new products.
- Can update product quantity (increase/decrease).
- Can delete products.

Manage Users
- Admin can view all registered users.
- Can delete users if necessary.

Logout
-Admin can securely log out from the panel.

## Challenge/difficulties to develop the application

- Error during installation of packages: Sometimes errors happened when installing npm packages due to version conflicts or missing dependencies.
- JavaScript runtime errors: Unexpected bugs happened when frontend scripts didn’t run properly due to small coding mistakes.
- Testing & Debugging: Finding and fixing errors took a lot of time, especially when different parts of the code affected each other.
- Merge Conflict: When multiple team members worked on the same files, it caused conflicts while merging the code, which required careful checking and fixing.



## References


---
