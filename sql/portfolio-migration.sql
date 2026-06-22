-- ============================================================
-- Portfolio Migration
-- Adds rich content fields to projects table and seeds 10 projects
-- Run on production: mysql -h localhost -u user -p ektamultp_isoftro < portfolio-migration.sql
-- ============================================================

-- Step 1: Add new columns for rich project detail template
ALTER TABLE projects ADD COLUMN challenge TEXT AFTER long_desc;
ALTER TABLE projects ADD COLUMN solution TEXT AFTER challenge;
ALTER TABLE projects ADD COLUMN results TEXT AFTER solution;
ALTER TABLE projects ADD COLUMN user_journey TEXT AFTER results;
ALTER TABLE projects ADD COLUMN how_it_works TEXT AFTER user_journey;
ALTER TABLE projects ADD COLUMN how_we_helped TEXT AFTER how_it_works;
ALTER TABLE projects ADD COLUMN features TEXT AFTER how_we_helped;
ALTER TABLE projects ADD COLUMN tech_stack_detail TEXT AFTER features;

-- Step 2: Update existing projects with rich content

-- 1. Easy Shopping ARS
UPDATE projects SET
short_desc = 'A complete ecommerce platform for the Nepali market with local payment gateway integration (eSewa, Khalti), product catalog, and admin dashboard.',
long_desc = 'Easy Shopping ARS is a full-featured ecommerce platform built for the growing Nepali online retail market. The platform supports multiple product categories including electronics, fashion, home appliances, and daily essentials. It features a modern shopping experience with advanced search, filtering, and personalized recommendations.',
challenge = 'The Nepali ecommerce landscape faces unique challenges: limited payment infrastructure, low trust in online transactions, and the need for cash-on-delivery alongside digital payments. ARS needed a platform that could handle all these scenarios while providing a smooth shopping experience.',
solution = 'We built a PHP and MySQL platform with a RESTful API architecture that integrates both eSewa and Khalti payment gateways alongside cash-on-delivery. The system includes a responsive frontend, real-time order tracking, push notifications for order updates, and a comprehensive admin dashboard for inventory and customer management.',
results = 'The platform successfully launched with a fully functional online store covering multiple product categories. Local payment gateway integration increased conversion rates, and the admin dashboard gave the team full control over products, orders, and customers.',
user_journey = 'A visitor lands on the homepage and browses product categories. They filter by price, brand, or category, add items to cart, and proceed to checkout. At checkout, they choose between eSewa, Khalti, or cash-on-delivery. After payment, they receive real-time order updates via push notification and can track their order status from their account dashboard.',
how_it_works = 'The platform uses a PHP backend with MySQL database for product, order, and customer data. The REST API serves data to the frontend. Payment gateways are integrated via their respective APIs. Push notifications use browser notification APIs. The admin panel provides CRUD for products, order management, and customer insights.',
how_we_helped = 'We designed and developed the entire platform from scratch including database schema, backend architecture, responsive frontend, payment integration, and admin dashboard. We also handled deployment on cPanel hosting.',
features = 'Multi-category product catalog\nAdvanced search with filters\nShopping cart with quantity management\neSewa and Khalti payment integration\nCash on delivery option\nUser accounts with order history\nReal-time order tracking\nPush notifications for order updates\nAdmin dashboard with analytics\nResponsive mobile-first design',
tech_stack_detail = 'The backend is built with vanilla PHP following MVC patterns. MySQL handles all data persistence with optimized queries. The REST API follows consistent endpoint conventions. Both eSewa and Khalti payment gateways are integrated server-side for secure transactions.',
sort_order = 1
WHERE slug = 'easy-shopping-ars';

-- 2. Divya Jyotish
UPDATE projects SET
short_desc = 'A comprehensive Hindu astrology platform with 20+ astrological modules, JWT authentication, device licensing, and both web and desktop applications.',
long_desc = 'Divya Jyotish is a production-grade Hindu astrology platform serving astrologers and enthusiasts through both web and desktop applications. The platform evolved from a JSONBin.io prototype into a full PHP and MySQL backend with sophisticated security, featuring JWT authentication, device licensing with hardware binding, and a registration queue system.',
challenge = 'The original prototype used JSONBin.io for data storage, which had severe limitations in querying, security, and scalability. The platform needed a proper backend with relational data modeling for complex astrological calculations, secure user authentication with device-level licensing, and support for both desktop and web interfaces from a single backend.',
solution = 'We rebuilt the entire backend with PHP and MySQL, implementing a REST API with JWT-based authentication with 30-day user tokens and 4-hour admin tokens. We designed a 7-table MySQL schema supporting users, devices, licenses, and astrological data. Device licensing uses hardware binding for piracy prevention with rate limiting and prepared statements for security.',
results = 'The platform now serves both web and desktop applications from a single, secure backend. The registration queue system manages new user onboarding, and the admin panel provides full oversight of users, devices, licenses, and system health.',
user_journey = 'Users download the desktop application or access the web version. They register with a time-based HH:MM password system, receive a JWT token valid for 30 days, and their device is registered via hardware binding. The admin approves licenses through the queue system. Once active, users access 20+ astrological modules including Kundali, Gochar, Prashna, Panchang, Vivah Milan, and more.',
how_it_works = 'The PHP REST API handles all business logic including user authentication via time-based passwords, JWT generation and validation, device licensing with hardware fingerprinting, and astrological calculations. MySQL stores all data with transactional integrity. Admin sessions are short-lived at 4 hours for security.',
how_we_helped = 'We performed the complete migration from JSONBin.io to a production PHP/MySQL backend. We designed the database schema, implemented JWT authentication, built the device licensing system, created the REST API, and developed the admin panel for full system oversight.',
features = 'Kundali (Birth Chart) generation\nGochar (Transit) calculations\nPrashna (Horary) analysis\nPanchang calendar\nVivah Milan (Matchmaking)\nVastu Shastra module\nNumerology calculations\nShani Sade Sati analysis\nMangal Dosha detection\nDasha system calculations\nDevice licensing with hardware binding\nJWT authentication (30-day user, 4-hour admin)\nRegistration queue system\nAdmin panel with full oversight',
tech_stack_detail = 'The backend uses vanilla PHP with prepared statements for all database operations. JWT tokens are generated and validated using HMAC-SHA256. The REST API features rate limiting, IP-based access control, and comprehensive error handling. The desktop application is built with Electron consuming the same API.',
sort_order = 2
WHERE slug = 'divya-jyotish';

-- 3. Ekta Cooperative Society
UPDATE projects SET
short_desc = 'A bilingual (Nepali/English) cooperative society management system with member management, KYC verification, savings, loans, and PWA support.',
long_desc = 'Ekta Cooperative Society is a comprehensive digital management platform for cooperative societies in Nepal. The system handles the complete lifecycle of cooperative operations from member registration and KYC verification to savings management, loan processing, and repayment tracking in a bilingual Nepali/English interface.',
challenge = 'Cooperative societies in Nepal traditionally rely on paper-based records, making data retrieval slow and error-prone. Members speak Nepali as their primary language, requiring a fully bilingual interface. The system needed to handle complex financial operations including multiple savings schemes, loan products with varying interest rates, and regulatory compliance.',
solution = 'We built a PHP and MySQL platform with a Progressive Web App (PWA) architecture for offline-capable access. The bilingual system uses dynamic language switching across all interfaces. Financial modules include multi-scheme savings accounts, loan management with automated EMI calculation, and detailed transaction histories.',
results = 'The cooperative digitized its entire member management and financial operations. Members can now access their accounts digitally, and staff process loans, deposits, and KYC through a unified dashboard.',
user_journey = 'A member visits the cooperative and is registered in the system with KYC document upload. They can choose from multiple savings schemes. When they need a loan, they apply through the system, and the admin reviews and approves with automated EMI scheduling. Members receive payment reminders and can track their savings growth and loan balance in real-time.',
how_it_works = 'The PHP backend manages member data, financial transactions, and content. MySQL stores all records with transaction support for financial integrity. The PWA capabilities allow offline access to cached content. Language switching toggles between Nepali and English across all pages.',
how_we_helped = 'We designed and developed the complete system including the bilingual architecture, financial modules, PWA implementation, and content management system. We also configured the hosting environment for the live deployment.',
features = 'Member registration and profile management\nKYC verification with document upload\nMultiple savings schemes with interest tracking\nLoan application, approval, and disbursement\nAutomated EMI scheduling and repayment tracking\nReal-time deposit monitoring\nBilingual Nepali/English interface\nPWA with offline capabilities\nAdmin dashboard with analytics\nContent management for notices and announcements',
tech_stack_detail = 'The platform is built with vanilla PHP following a modular architecture. MySQL handles financial data with transactional integrity. The PWA is implemented with a service worker for offline caching. The frontend uses Tailwind CSS for responsive design. Language switching is handled server-side with language files.',
sort_order = 3
WHERE slug = 'ekta-cooperative';

-- 4. Nepal ERP (Codex)
UPDATE projects SET
short_desc = 'A comprehensive academic ERP system built on Laravel with multi-tenant architecture, student management, attendance tracking, fee management, and ID card generation.',
long_desc = 'Nepal ERP (Codex) is an Enterprise Resource Planning system designed specifically for educational institutions in Nepal. Built on Laravel with a multi-tenant architecture, it enables a single deployment to serve multiple institutions with fully isolated data. The platform centralizes student management, academics, attendance, fees, and administrative operations.',
challenge = 'Educational institutions in Nepal have diverse requirements spanning admissions, academics, examinations, and administration. Existing solutions are either too expensive or not tailored to the Nepali education system. Institutions needed a unified platform that could handle everything from student enrollment to fee collection and report cards.',
solution = 'We built a Laravel-based system with modular architecture. Each module (students, academics, attendance, fees) is independently maintainable. Multi-tenant support allows hosting multiple institutions on a single deployment with isolated data. Role-based access control ensures teachers, staff, and admins see only what they need.',
results = 'The ERP now serves multiple educational institutions with a single codebase. Schools can manage the entire student lifecycle from admission to graduation through one platform.',
user_journey = 'An administrator logs in and manages students, courses, and fee structures. Teachers take attendance through the system and enter grades. Students and parents access the portal to view attendance records, exam results, and fee payment history. The system generates automated reports including report cards and attendance summaries.',
how_it_works = 'Laravel handles routing, authentication, and business logic. MySQL stores all institutional data with tenant isolation. Redis is used for caching. The REST API enables integration with third-party services. Modules are separated by concerns, making the system easy to extend.',
how_we_helped = 'We architected the multi-tenant system, built all core modules (students, academics, attendance, fees), implemented role-based access control, and deployed the solution on production servers.',
features = 'Multi-tenant architecture for multiple institutions\nStudent management (admissions, profiles, records)\nAcademic management (courses, classes, scheduling)\nAttendance tracking with reports\nFee management with collection and invoicing\nAutomated ID card generation\nRole-based access control\nSecure authentication with role dashboards\nREST API for integrations\nRedis caching for performance',
tech_stack_detail = 'Built on Laravel 11 with Eloquent ORM for database interactions. Multi-tenancy is implemented at the database level with tenant-aware queries. Redis handles session caching and queue management. The REST API follows Laravel API resource conventions with token-based authentication.',
sort_order = 4
WHERE slug = 'nepal-erp-codex';

-- 5. School Management System
UPDATE projects SET
short_desc = 'An all-in-one school administration platform with student management, attendance, exams, fees, timetable, and parent-teacher communication.',
long_desc = 'The School Management System is a comprehensive digital platform that replaces fragmented paper-based processes in Nepali educational institutions. It serves administrators, teachers, students, and parents through a unified interface covering enrollment, attendance, examinations, fee management, timetables, and communication.',
challenge = 'Nepali schools juggle multiple disconnected systems with separate registers for attendance, ledgers for fees, paper report cards, and notice boards. This fragmentation leads to data inconsistencies, lost records, and administrative overhead. Staff spend more time on paperwork than on teaching.',
solution = 'We built an integrated PHP and MySQL platform that connects all school operations in one system. Each module (students, attendance, exams, fees, timetable, reports) shares a common database, ensuring data consistency. Role-based dashboards give each user type a tailored experience.',
results = 'Schools using the system have eliminated paper registers and ledgers. Attendance tracking is real-time, report cards generate automatically, and fee collection is trackable with automated receipts.',
user_journey = 'The admin sets up the school structure including classes, subjects, teachers, and fee schedules. Teachers take daily attendance through the system and enter exam grades. Students and parents log in to view attendance, exam results, fee status, and receive school announcements. The system generates report cards and fee receipts automatically.',
how_it_works = 'The PHP backend serves data through a modular architecture. Each module is a separate component sharing the same MySQL database. Role-based authentication routes users to their appropriate dashboards. Reports are generated server-side and available for download.',
how_we_helped = 'We designed the complete system architecture, developed all modules, created role-based dashboards, implemented the reporting engine, and deployed the solution for multiple schools.',
features = 'Student enrollment and academic history\nDaily attendance tracking with reports\nExam scheduling and grade entry\nFee structure and collection management\nTimetable generation with conflict detection\nReport cards and progress reports\nParent-teacher messaging\nNotice board and announcements\nRole-based dashboards\nExportable reports',
tech_stack_detail = 'The platform uses vanilla PHP with a modular architecture. MySQL stores all school data with relational integrity. The frontend uses Bootstrap for responsive design. JavaScript handles client-side interactions and form validation. Reports are rendered server-side.',
sort_order = 5
WHERE slug = 'school-management-system';

-- 6. BIT College Library
UPDATE projects SET
short_desc = 'A digital library management system with book catalog, member management, check-in/check-out, fine management, reservations, and reports.',
long_desc = 'BIT College Library Management System replaces traditional paper-based library operations with a digital platform. The system manages the complete lifecycle of library resources including cataloging, check-outs, returns, fines, and reservations through an intuitive web interface supporting both student and teacher member types.',
challenge = 'The college library relied on manual registers for book check-outs and returns, making it difficult to track overdue items, manage fines, or generate usage reports. Students had no way to know if a book was available without visiting the library physically.',
solution = 'We developed a PHP and MySQL system with barcode-style ID entry for quick check-in/check-out. Due dates auto-calculate based on member type with different borrowing periods for students vs teachers. Overdue alerts and fine tracking are fully automated with configurable daily rates.',
results = 'Library operations are now fully digital. Staff process check-outs and returns in seconds with barcode ID entry. Overdue notifications are automatic, and the reports dashboard provides insights into circulation trends and popular titles.',
user_journey = 'A student searches the online catalog to find a book. If available, they visit the library where staff process the check-out with barcode entry. The system calculates the due date based on the student member type. If the book is late, fines are auto-calculated. Students can reserve books that are checked out and receive notifications when available.',
how_it_works = 'The PHP backend manages the book catalog, member records, and circulation transactions. MySQL tracks all data with relationships between books, members, and transactions. Fine calculations are automated based on configurable daily rates. The reports engine generates circulation statistics and popular title analytics.',
how_we_helped = 'We designed the database schema, built the complete circulation system, implemented fine management, created the reports dashboard, and deployed the solution for BIT College.',
features = 'Book catalog with search\nMember management (student/teacher types)\nBarcode-style check-in/check-out\nAuto-calculated due dates\nOverdue alerts and fine management\nBook reservations with notifications\nReports dashboard (circulation, popular titles)\nAdmin panel for system configuration',
tech_stack_detail = 'The system is built with vanilla PHP for backend logic. MySQL stores library data with tables for books, members, transactions, and fines. JavaScript provides a responsive frontend experience. The admin panel handles all system configuration and inventory oversight.',
sort_order = 6
WHERE slug = 'bit-college-library';

-- 7. News Portal
UPDATE projects SET
short_desc = 'A full-featured content publishing platform with category management, article publishing, full-text search, and SEO-friendly URLs.',
long_desc = 'The News Portal is a digital publishing platform designed for modern newsrooms. It enables editors to publish, categorize, and manage news articles through an intuitive admin panel, while readers enjoy a fast, responsive frontend optimized for both desktop and mobile with SEO-friendly URLs.',
challenge = 'Digital newsrooms need a platform that balances editorial flexibility with reader experience. Editors need to publish quickly across categories, while readers expect fast loading times, easy navigation, and searchable archives. The platform also needs to rank well in search engines.',
solution = 'We built a PHP and MySQL platform with a clean separation between admin backend and public frontend. The admin panel offers rich article editing with featured images, author attribution, and publish/draft status with scheduled publishing. The frontend is optimized for speed with responsive design and SEO-friendly URL structures.',
results = 'The platform enables rapid content publishing with categories, search, and SEO optimization. Editors can schedule articles in advance, and readers find content easily through search and category navigation.',
user_journey = 'An editor logs into the admin panel, creates a new article with title, content, and featured image, assigns it to a category, and publishes it or schedules it for later. On the frontend, a reader browses categories, searches for topics, and reads articles with clean typography and fast loading.',
how_it_works = 'The PHP backend routes requests to appropriate controllers. The admin panel provides CRUD for articles, categories, and users. The public frontend queries the database for published articles and serves them with SEO-friendly URLs generated from article slugs. Search uses MySQL full-text indexing.',
how_we_helped = 'We designed and developed the complete platform including the admin panel, public frontend, category system, search functionality, and SEO optimization.',
features = 'Hierarchical category management\nRich article editor with featured images\nPublish/draft and scheduled publishing\nFull-text search with category filters\nSEO-friendly URLs with custom slugs\nResponsive mobile-first design\nAdmin dashboard with analytics\nAuthor attribution system',
tech_stack_detail = 'The platform uses vanilla PHP with a custom routing system. MySQL handles content storage with full-text search indexes. The frontend is built with responsive HTML/CSS and vanilla JavaScript. URLs are clean and human-readable, generated from article slugs with customizable meta tags.',
sort_order = 7
WHERE slug = 'news-portal';

-- 8. Club Abhiyanta BIT
UPDATE projects SET
short_desc = 'A full-featured student club management portal with dynamic content, event management, gallery, membership registration, and team showcase.',
long_desc = 'Club Abhiyanta BIT is the official digital presence for the student tech club at BIT College. The platform provides public pages for showcasing club activities, programmes, and projects alongside a member dashboard and comprehensive admin panel. All content is database-driven with a modern Tailwind CSS frontend.',
challenge = 'The club needed an online presence to showcase its activities, attract new members, and manage events. Content needed to be easily updatable by club coordinators without technical skills, and the site needed to reflect the club tech-forward identity.',
solution = 'We built a PHP and MySQL platform with a comprehensive admin panel that lets club coordinators manage every aspect of the site including hero content, about section, gallery images, programmes, team members, and social links. The frontend uses Tailwind CSS for a modern, clean look.',
results = 'The club now has a fully-managed digital presence. New members register online, events are published through the admin panel, and the club activities are showcased with gallery images and programme details.',
user_journey = 'A visitor lands on the homepage and learns about the club mission, sees upcoming programmes, and browses the photo gallery. They can register for membership online through a form, and the admin reviews and approves. Team members are showcased with photos and social profiles. The admin updates content dynamically without touching code.',
how_it_works = 'The PHP backend serves dynamic content from MySQL. The admin panel provides forms for all content types including hero, about, gallery, programmes, team, and settings. The frontend queries the database and renders content with Tailwind CSS styling.',
how_we_helped = 'We designed and developed the complete portal including the dynamic content system, admin panel, membership workflow, gallery management, and event programme system.',
features = 'Dynamic hero section with editable content\nAbout page with mission, vision, history\nPhoto gallery with upload management\nProgramme and event management\nTeam member showcase with social profiles\nOnline membership registration with approval\nContact form with database storage\nAdmin panel for all site content\nCustomizable color scheme and CTAs',
tech_stack_detail = 'The platform uses vanilla PHP for server-side logic with MySQL for all content storage. The frontend is styled with Tailwind CSS CDN for a modern, responsive design. JavaScript handles interactive elements. The admin panel is fully self-contained, allowing non-technical coordinators to manage the site.',
sort_order = 8
WHERE slug = 'club-abhiyanta-bit';

-- Step 3: Insert new projects (skip if already exist)

-- 9. ChatBot Nepal
INSERT IGNORE INTO projects (title, slug, client_name, industry, country, short_desc, long_desc, challenge, solution, results, user_journey, how_it_works, how_we_helped, features, tech_stack, tech_stack_detail, status, year, sort_order, is_published)
SELECT 'ChatBot Nepal', 'chatbot-nepal', 'Nepal Cyber Firm', 'AI', 'Nepal',
'An AI-powered chatbot widget platform for Nepali businesses powered by Grok API, with subscription plans and local payment gateway integration.',
'ChatBot Nepal is a B2B SaaS platform that enables Nepali businesses to add an intelligent AI chatbot to their websites. Clients embed a simple script tag, and their visitors get an AI assistant that answers questions using the business own knowledge base including FAQs, services, pricing, and custom content. The platform features subscription-based pricing with eSewa and Khalti payment support.',
'Nepali businesses want AI-powered customer support but lack the technical resources to build and maintain chatbot systems. Existing global solutions do not understand the Nepali context, local language nuances, or integrate with local payment gateways. Businesses need a simple plug-and-play solution.',
'We built ChatBot Nepal on Laravel 13 with a Grok API backend for intelligent conversations. Businesses upload their knowledge base including FAQs, services, and pricing, embed a script tag on their site, and the chatbot handles customer queries automatically. The platform supports subscription tiers with eSewa and Khalti billing.',
'The platform is live and serving Nepali businesses with AI-powered customer support. Businesses can deploy a chatbot in minutes without technical expertise, and the subscription model makes it accessible to small and medium enterprises.',
'A business owner signs up, creates a chatbot, and uploads their knowledge base with FAQs, services, and policies. They copy a script tag and paste it on their website. Visitors now interact with the AI chatbot which answers questions based on the business knowledge. The owner tracks conversations and refines the knowledge base through the dashboard.',
'Laravel 13 handles user management, subscription billing, and chatbot configuration. The Grok API (xAI) processes natural language queries against the business knowledge base. The script tag loads the chat widget on the client website. Payments are processed through eSewa and Khalti integrations.',
'We designed the system architecture, built the complete Laravel application, integrated the Grok API for AI conversations, implemented the embeddable widget, connected eSewa and Khalti payment gateways, and deployed the platform.',
'AI-powered chatbot with Grok API\nKnowledge base management (FAQs, services, pricing)\nSimple embeddable script tag\nSubscription plans (monthly/yearly)\neSewa and Khalti payment integration\nConversation history dashboard\nCustomizable widget appearance\nMulti-business support\nAnalytics and insights',
'Laravel 13, PHP 8.2, MySQL, Grok API, Tailwind CSS, Alpine.js',
'The platform is built on Laravel 13 with Eloquent ORM and Blade templating. The Grok API (xAI) powers AI conversations via server-side API calls. Tailwind CSS 4 and Alpine.js provide the frontend experience. Payment gateways eSewa and Khalti are integrated through Laravel packages with Breeze handling authentication.',
'Live', '2025', 9, 1
WHERE NOT EXISTS (SELECT 1 FROM projects WHERE slug = 'chatbot-nepal');

-- 10. Recurlog CRM
INSERT IGNORE INTO projects (title, slug, client_name, industry, country, short_desc, long_desc, challenge, solution, results, user_journey, how_it_works, how_we_helped, features, tech_stack, tech_stack_detail, status, year, sort_order, is_published)
SELECT 'Recurlog CRM', 'recurlog-crm', 'iSoftro Solutions (in-house)', 'ERP/CRM', 'Nepal',
'A field service management CRM with customer management, staff scheduling, recurring/one-time tasks, order management, and a companion mobile app.',
'Recurlog is a field service management CRM designed for small field service businesses including HVAC, plumbing, repair, maintenance, and similar industries. The platform manages customers, staff, recurring and one-time service tasks, orders, notifications, and reports. It features a dual architecture with both web and mobile interfaces connected via a REST API.',
'Field service businesses struggle with scheduling, dispatching, and tracking service calls. Paper-based systems lead to missed appointments, lost customer data, and inefficient routing. Staff in the field have no access to customer history or job details without calling the office.',
'We built a full CRM with PHP and MySQL backend, a responsive web interface for office staff, and a React Native mobile app for field technicians. The REST API with JWT authentication connects both interfaces. Features include customer management, scheduling, recurring task automation, order management, and push notifications.',
'The platform handles the complete field service lifecycle from customer inquiry to job completion. Field technicians access job details, capture signatures, and update status in real-time from their mobile devices.',
'A customer calls for service. The office staff creates a work order, assigns a technician, and schedules the visit. The technician receives a push notification on their mobile app with job details and customer history. They complete the job, capture a digital signature, and mark it done. The customer receives a notification and the office has real-time visibility.',
'The PHP backend serves the web interface and REST API. MySQL stores all business data. The React Native mobile app (Gautam Todo) connects to the API for real-time updates. JWT tokens secure all API communications. Push notifications use Expo Push for mobile and Web Push for desktop with Chart.js for analytics dashboards.',
'We designed the complete system architecture, built the PHP web backend and REST API, developed the React Native mobile app, implemented PWA features, integrated push notifications, and deployed the solution.',
'Customer management with history\nStaff scheduling and dispatching\nRecurring task automation\nOne-time service orders\nReal-time job status tracking\nDigital signature capture\nPush notifications (mobile + web)\nREST API with JWT authentication\nAnalytics and reports dashboard\nPWA support for offline access\nRole-based access (admin, staff)',
'PHP, MySQL, React Native, Chart.js, PWA, JWT, REST API',
'The web platform uses vanilla PHP with MySQL for data persistence. The REST API follows RESTful conventions with JWT (HS256) authentication. The React Native mobile app uses Expo SDK with TanStack React Query for data fetching and Zustand for state management. Push notifications use Expo Push API with PWA features including service worker and web manifest.',
'Live', '2025', 10, 1
WHERE NOT EXISTS (SELECT 1 FROM projects WHERE slug = 'recurlog-crm');
