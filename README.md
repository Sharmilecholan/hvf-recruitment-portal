# HVF Contract Recruitment Portal

This is a web-based recruitment portal built for **Heavy Vehicles Factory (HVF)** under **Armoured Vehicles Nigam Limited (AVNL)**, Ministry of Defence, Government of India. The system enables both **candidates** and **administrators** to manage recruitment efficiently.

## 📁 Project Structure

- `/candidate` – Candidate Dashboard and multi-step application form
- `/admin` – Admin Dashboard to manage job postings and applications
- `/assets` – CSS and image assets
- `/uploads` – Uploaded documents
- `db.php` – MySQL database connection
- `index.php` – Login page
- `logout.php` – Logout script

---

## 👤 Candidate Portal

The candidate completes the application in **4 steps**:

1. **Personal Information** – Name, DOB, gender, contact, address, job post.
2. **Educational Details** – Add multiple academic qualifications.
3. **Upload Documents** – Upload Aadhaar, photo, signature, marksheets, etc.
4. **Declaration & Eligibility** – Confirm eligibility and agree to terms.

✅ Upon final submission, all data is stored in the database and a success message is shown.

---

## 🛠️ Admin Dashboard

Accessible to users with `role = admin`. Features:

- **Job Management**  
  - View, create, and manage job postings  
  - Define title, eligibility, description, number of vacancies

- **View Applications**  
  - List of candidates applied for each job  
  - View detailed candidate data and uploaded documents

---

## 🧩 Technologies Used

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP (XAMPP)  
- **Database**: MySQL  
- **Version Control**: Git




