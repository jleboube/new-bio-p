```
project-root/
├── docker-compose.yml
├── Dockerfile
├── .env
├── init.sql
└── src/
    ├── index.php
    ├── login.php
    ├── register.php
    ├── dashboard.php
    ├── edit_profile.php
    ├── admin.php
    ├── logout.php
    ├── config/
    │   └── database.php
    ├── includes/
    │   └── auth.php
    └── css/
        └── style.css
```
Deployment Commands:

# Clone or create project directory
mkdir professional-bio-site
cd professional-bio-site

# Add all the files above
# Then run:
docker-compose up -d

# Access services:
# Website: http://localhost:8080
# phpMyAdmin: http://localhost:8090
# Default admin login: admin@yourdomain.com / password
