# 📋 Laravel Event Management Application

This is a simple and beginner-friendly **Smart Calendar and Event Management App** built with Laravel. It allows users to manage tasks, log timesheets, visualize reports, view tasks on a calendar, and export data to Excel.

---

## 🚀 Features

### ✅ Event Management
- Add, update, and delete tasks.
- Track Event status: **Pending**, **In Progress**, **Completed**.
- Pagination support for Event lists.

### 🔐 Authentication System
- Secure **Login** and **Sign Up** functionality.
- Only authenticated users can access and manage their events.
- Laravel's built-in auth system used for security and session handling.

### ✉️ Email Event Reminders
- Automatically sends **email reminders** to users before an upcoming event.
- Configurable reminder timing (e.g., 1 day before).
- Uses Laravel's notification system + Mail driver.

### 🕒 Timesheet Logging
- Log work hours against tasks.
- Add comments and view timesheet entries.

### 📅 Calendar Integration
- View tasks directly on a calendar.
- Tasks are color-coded based on priority:
  - **Urgent**: Red
  - **Important**: Yellow
  - **Normal**: Gray
- Click on a task to edit it.
- Click on a date to create a new task for that day.

### 📊 Interactive Reporting
- **Pie Chart**: Event status distribution.
- **Bar Chart**: Hours logged per Event.
- **Line Chart**: Daily work log.

### 📈 Dashboard Overview
- Summary of total tasks and hours worked.
- Pie chart showing Event statuses.

### 📥 Export Options
- Export timesheets to Excel using **Laravel Excel**.

### 💡 Clean UI
- Built with **Bootstrap 5** for a responsive and modern design.

---

## 🛠️ Tech Stack

| Layer       | Technology                |
|-------------|---------------------------|
| **Backend** | Laravel 9                 |
| **Frontend**| Blade + Bootstrap 5       |
| **Charts**  | Chart.js                  |
| **Calendar**| FullCalendar.js           |
| **Export**  | Maatwebsite Laravel Excel |
| **Auth**    | Laravel Breeze / Fortify  |
| **Mail**    | Laravel Mail & Scheduler  |
| **Database**| MySQL                     |

---

## 🔧 Setup Instructions

1. Clone the repository  
   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo