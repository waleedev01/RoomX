# Cloud-Based Instant Messaging Application

## Team UG3 - IN3046: Cloud Computing

**Date:** 07/11/2022  
**Mentor:** Dr. Gokop Goteng

### Team Members:
- Abul Chowdhury
- Andreea Cafingiu
- Sarah Bugshan
- Waleed Hassan

---

## Project Overview

Developed for the Cloud Computing module, this project introduces a web-based instant messaging application using Amazon Web Services (AWS). It allows users to communicate in private and public chat rooms, exchange messages and images, and connect with others based on room settings.

---

## Key Features

1. **User Registration and Authentication:** Secure login with username and password.
2. **Room Creation and Management:** Ability to create, join, and manage private or public chat rooms.
3. **Message and Image Exchange:** Users can share text messages and images within rooms.
4. **Location-Based Public Rooms:** Public rooms have a location attribute for local connections.
5. **Cloud Storage Integration:** Amazon Cloud Storage is used for storing and sharing images.

---

## Architecture and Implementation

- **Front-End:** Developed using HTML5 and CSS3.
- **Back-End:** Built with PHP, integrated with Amazon RDS or Cloud Datastore for storing contact details.
- **Data Management:** Utilizes Amazon Cloud SQL for data storage, linked to images in Amazon Cloud Storage.
- **Deployment:** AWS Elastic Beanstalk for hosting and deployment.

---

## Scalability and Performance

- **Autoscaling:** Implements Amazon RDS storage autoscaling to handle variable workloads.
- **Vertical Scaling:** Adjusts DB instance type or size to manage peak traffic times.

---

## Team Contributions

- **Abul Chowdhury:** Coding, GUI Design, Testing
- **Andreea Cafingiu:** Testing, Coding, GUI Design, AWS Elastic Beanstalk Setup, System Analysis
- **Sarah Bugshan:** GUI Design, Coding
- **Waleed Hassan:** Team Leader, Coding, Amazon RDS and Cloud Storage Setup, System Analysis



