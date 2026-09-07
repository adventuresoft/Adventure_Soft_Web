<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Portfolio;
use App\Models\Client;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\JobPosting;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Super Admin User
        User::updateOrCreate(
            ['email' => 'imran.molla@gmail.com'],
            [
                'name' => 'Imran Molla',
                'password' => Hash::make('molla123456'),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        // 2. Services Seeding
        $services = [
            [
                'title' => 'Enterprise Custom Software',
                'slug' => 'enterprise-custom-software',
                'icon' => 'code-bracket',
                'short_description' => 'Architecting scalable, resilient, mission-critical enterprise platforms tailored for global industry leaders.',
                'long_description' => 'Adventure Soft designs and engineers high-throughput enterprise software tailored specifically to your complex business workflows. From legacy modernization to cloud-native microservices.',
                'features' => ['Microservices Architecture', 'High Concurrency Processing', 'SOC2 & HIPAA Compliant', 'Automated CI/CD Pipelines'],
                'display_order' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Web Application Engineering',
                'slug' => 'web-application-engineering',
                'icon' => 'globe-alt',
                'short_description' => 'Ultra-fast, progressive web applications powered by modern frontend frameworks and robust cloud APIs.',
                'long_description' => 'We create visually captivating, lightning-fast web applications built for scale. Utilizing modern frameworks like React, Next.js, and Laravel, we ensure optimal performance, SEO, and user retention.',
                'features' => ['Single Page & SSR Apps', 'Sub-second LCP Performance', 'PWA Offline Capabilities', 'API-First Headless Systems'],
                'display_order' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'icon' => 'device-phone-mobile',
                'short_description' => 'Native iOS & Android apps built for fluid touch interactions, biometric security, and offline syncing.',
                'long_description' => 'From fintech mobile wallets to healthcare remote monitoring apps, our mobile engineering team delivers cross-platform and native solutions with pixel-perfect UI and seamless backend integration.',
                'features' => ['Flutter & React Native', 'Native Swift & Kotlin', 'Biometric Auth Integration', 'Offline Data Storage'],
                'display_order' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'Cloud Infrastructure & DevOps',
                'slug' => 'cloud-infrastructure-devops',
                'icon' => 'cloud',
                'short_description' => 'Automated cloud orchestration, Kubernetes clusters, zero-downtime deployments, and AWS/Azure scaling.',
                'long_description' => 'Transform your infrastructure with infrastructure-as-code (Terraform), Docker containerization, Kubernetes orchestration, and 24/7 proactive cloud security monitoring.',
                'features' => ['Kubernetes & Docker', 'Multi-Cloud AWS/Azure/GCP', 'Zero-Downtime Deployments', 'Cost Optimization Audits'],
                'display_order' => 4,
                'is_featured' => true,
            ],
            [
                'title' => 'AI & Machine Learning Solutions',
                'slug' => 'ai-machine-learning-solutions',
                'icon' => 'sparkles',
                'short_description' => 'Predictive analytics, custom LLM integration, Computer Vision, and intelligent process automation.',
                'long_description' => 'Empower your enterprise with custom artificial intelligence. We integrate OpenAI, Claude, LLaMA models, custom NLP pipelines, and computer vision models into your core business applications.',
                'features' => ['Custom LLM Fine-Tuning', 'Retrieval-Augmented Gen (RAG)', 'Computer Vision & OCR', 'Predictive Data Analytics'],
                'display_order' => 5,
                'is_featured' => true,
            ],
            [
                'title' => 'Software QA & Automation',
                'slug' => 'software-qa-automation',
                'icon' => 'check-badge',
                'short_description' => 'Comprehensive end-to-end automated testing suites ensuring 99.9% bug-free deployments.',
                'long_description' => 'Our dedicated QA engineers build continuous automated testing frameworks using Playwright, Cypress, Selenium, and JMeter for stress testing under peak user traffic.',
                'features' => ['Automated E2E Testing', 'Load & Stress Testing', 'Security Vulnerability Audits', 'Continuous Integration Suites'],
                'display_order' => 6,
                'is_featured' => true,
            ],
            [
                'title' => 'Dedicated Developers & Team Augmentation',
                'slug' => 'dedicated-developers-team-augmentation',
                'icon' => 'user-group',
                'short_description' => 'Scale your in-house engineering team with senior offshore developers, technical leads, and DevOps engineers.',
                'long_description' => 'Extend your core development team with battle-tested senior engineers from Adventure Soft. We handle hiring, onboarding, payroll, and technical oversight so your product scales seamlessly.',
                'features' => ['Top 1% Vetted Engineers', 'Zero Onboarding Overhead', 'Direct Slack & Jira Integration', 'Flexible Monthly Retainers'],
                'display_order' => 7,
                'is_featured' => true,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::updateOrCreate(['slug' => $serviceData['slug']], $serviceData);
        }

        // 3. Technologies Seeding (4 items per category)
        $techs = [
            // Backend Engineering
            ['name' => 'Laravel / PHP', 'category' => 'backend', 'icon' => 'laravel', 'description' => 'Robust MVC architecture, elegant Eloquent ORM, and enterprise-grade RESTful API systems.', 'is_featured' => true],
            ['name' => 'Node.js / Express', 'category' => 'backend', 'icon' => 'nodejs', 'description' => 'High-concurrency, asynchronous event-driven backend runtimes and real-time WebSockets.', 'is_featured' => true],
            ['name' => 'Python / Django / FastAPI', 'category' => 'backend', 'icon' => 'python', 'description' => 'Asynchronous microservices, high-throughput APIs, and AI pipeline orchestration.', 'is_featured' => true],
            ['name' => 'Go / Golang', 'category' => 'backend', 'icon' => 'go', 'description' => 'Ultra-low latency compiled backend microservices engineered for high concurrency.', 'is_featured' => true],

            // Frontend Engineering
            ['name' => 'React.js / Next.js', 'category' => 'frontend', 'icon' => 'react', 'description' => 'Server-side rendered (SSR) web applications and lightning-fast reactive user interfaces.', 'is_featured' => true],
            ['name' => 'Vue.js / Nuxt.js', 'category' => 'frontend', 'icon' => 'vuejs', 'description' => 'Progressive, reactive UI frameworks with modular component ecosystems and fast rendering.', 'is_featured' => true],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'icon' => 'tailwindcss', 'description' => 'Utility-first modern design architecture delivering bespoke, responsive UI experiences.', 'is_featured' => true],
            ['name' => 'TypeScript / Angular', 'category' => 'frontend', 'icon' => 'typescript', 'description' => 'Strictly typed client architectures and enterprise web applications with solid scalability.', 'is_featured' => true],

            // Mobile Engineering
            ['name' => 'Flutter / Dart', 'category' => 'mobile', 'icon' => 'flutter', 'description' => 'Cross-platform native compilation delivering fluid 120fps UI on iOS and Android.', 'is_featured' => true],
            ['name' => 'React Native', 'category' => 'mobile', 'icon' => 'react-native', 'description' => 'Native bridge mobile apps sharing logic with React web codebases seamlessly.', 'is_featured' => true],
            ['name' => 'iOS / Swift', 'category' => 'mobile', 'icon' => 'swift', 'description' => 'Native Apple platform development with SwiftUI, high performance, and biometric security.', 'is_featured' => true],
            ['name' => 'Android / Kotlin', 'category' => 'mobile', 'icon' => 'kotlin', 'description' => 'Modern native Android apps utilizing Jetpack Compose and coroutines.', 'is_featured' => true],

            // Database & Storage
            ['name' => 'MySQL / MariaDB', 'category' => 'database', 'icon' => 'mysql', 'description' => 'ACID-compliant relational database management for mission-critical transaction volumes.', 'is_featured' => true],
            ['name' => 'PostgreSQL / Supabase', 'category' => 'database', 'icon' => 'postgresql', 'description' => 'Advanced relational & JSON database systems with spatial indexing and strict data integrity.', 'is_featured' => true],
            ['name' => 'MongoDB / NoSQL', 'category' => 'database', 'icon' => 'mongodb', 'description' => 'Flexible schema, document-oriented NoSQL storage for large-scale distributed big data.', 'is_featured' => true],
            ['name' => 'Redis / In-Memory Cache', 'category' => 'database', 'icon' => 'redis', 'description' => 'Sub-millisecond latency in-memory data store for caching, message queues, and pub/sub.', 'is_featured' => true],

            // Cloud & DevOps
            ['name' => 'Docker Containerization', 'category' => 'devops', 'icon' => 'docker', 'description' => 'Standardized application containers ensuring reproducible environments across staging and prod.', 'is_featured' => true],
            ['name' => 'Kubernetes Orchestration', 'category' => 'devops', 'icon' => 'kubernetes', 'description' => 'Automated deployment, multi-region autoscaling, and resilient container cluster operations.', 'is_featured' => true],
            ['name' => 'AWS & Google Cloud', 'category' => 'devops', 'icon' => 'aws', 'description' => 'High-availability multi-cloud architecture, serverless computing, and enterprise VPCs.', 'is_featured' => true],
            ['name' => 'CI/CD & GitHub Actions', 'category' => 'devops', 'icon' => 'githubactions', 'description' => 'Automated end-to-end test pipelines, security scanning, and zero-downtime deployments.', 'is_featured' => true],

            // AI & Machine Learning
            ['name' => 'OpenAI / Claude LLMs', 'category' => 'ai_ml', 'icon' => 'openai', 'description' => 'Custom Large Language Model fine-tuning, RAG semantic pipelines, and autonomous AI agents.', 'is_featured' => true],
            ['name' => 'PyTorch Deep Learning', 'category' => 'ai_ml', 'icon' => 'pytorch', 'description' => 'Dynamic neural network modeling, GPU-accelerated training, and research prototyping.', 'is_featured' => true],
            ['name' => 'TensorFlow & Keras', 'category' => 'ai_ml', 'icon' => 'tensorflow', 'description' => 'Production-scale ML workflows, distributed training, and edge device AI deployments.', 'is_featured' => true],
            ['name' => 'Computer Vision & OpenCV', 'category' => 'ai_ml', 'icon' => 'opencv', 'description' => 'Real-time image classification, facial recognition, OCR parsing, and object detection.', 'is_featured' => true],
        ];

        foreach ($techs as $techData) {
            Technology::updateOrCreate(['name' => $techData['name']], $techData);
        }

        // 4. Clients Seeding
        $clients = [
            ['name' => 'Global FinTech Corp', 'logo' => 'client-1.svg', 'display_order' => 1],
            ['name' => 'HealthCare Plus USA', 'logo' => 'client-2.svg', 'display_order' => 2],
            ['name' => 'Nordic Logistics', 'logo' => 'client-3.svg', 'display_order' => 3],
            ['name' => 'Apex Retail Global', 'logo' => 'client-4.svg', 'display_order' => 4],
            ['name' => 'CyberTrust Security', 'logo' => 'client-5.svg', 'display_order' => 5],
        ];

        foreach ($clients as $clientData) {
            Client::updateOrCreate(['name' => $clientData['name']], $clientData);
        }

        // 5. Portfolios & Projects Seeding
        $portfolios = [
            [
                'title' => 'CLMS — Certificate & License Management Solution',
                'slug' => 'clms-certificate-license-management-solution',
                'client_name' => 'Local Government Division, Ministry of Local Government, Bangladesh',
                'category' => 'GovTech & E-Governance',
                'thumbnail' => 'portfolio-clms.jpg',
                'challenge' => 'The Ministry of Local Government required a unified digital platform for citizens to apply for, manage, and verify government certificates and business licenses securely and rapidly across local directorates.',
                'solution' => 'Adventure Soft engineered a high-concurrency e-governance platform featuring Citizen Login portals, Admin & Monitoring Workflows, automated digital certificate generation, and live application status tracking.',
                'impact_metrics' => ['Applications Processed' => '1,000,000+', 'Service Delivery Time' => '80% Faster', 'Security Rating' => '100% Encrypted'],
                'tech_stack' => ['Laravel', 'MySQL', 'Redis', 'Tailwind CSS', 'REST APIs'],
                'project_url' => 'https://clms.com.bd/',
                'is_featured' => true,
            ],
            [
                'title' => 'RBBD — Rebuilding Bangladesh (রিবিল্ডিং বাংলাদেশ)',
                'slug' => 'rbbd-rebuilding-bangladesh',
                'client_name' => 'Rebuilding Bangladesh Foundation',
                'category' => 'Social Impact & Non-Profit Tech',
                'thumbnail' => 'portfolio-rbbd.jpg',
                'challenge' => 'Developing a comprehensive digital ecosystem to connect donors and volunteers with underprivileged children needing education, healthcare, emergency treatment, and safe shelter.',
                'solution' => 'Engineered a modern web platform supporting transparent online donation processing, volunteer registration modules, campaign project showcases, and real-time impact tracking.',
                'impact_metrics' => ['Children Supported' => '50,000+', 'Active Volunteers' => '10,000+', 'Donation Security' => 'Instant & Verified'],
                'tech_stack' => ['Laravel', 'React', 'MySQL', 'Tailwind CSS', 'Payment Gateway Integration'],
                'project_url' => 'https://rbbd.org.bd/',
                'is_featured' => true,
            ],
            [
                'title' => 'NexGen Global Banking & FinTech Engine',
                'slug' => 'nexgen-global-banking-fintech-engine',
                'client_name' => 'Global FinTech Corp (USA)',
                'category' => 'FinTech & Web App',
                'thumbnail' => 'portfolio-fintech.jpg',
                'challenge' => 'Client required sub-second cross-border remittance processing with multi-currency wallet operations handling 500,000 requests/minute.',
                'solution' => 'Engineered microservices backend in Laravel & Node.js connected to high-availability MySQL & Redis clusters.',
                'impact_metrics' => ['Transaction Processing Speed' => '+450%', 'Downtime' => '0.00%', 'Annual Cost Savings' => '$1.2M'],
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Docker'],
                'project_url' => 'https://adventuresoft.com',
                'is_featured' => true,
            ],
            [
                'title' => 'AI-Powered TeleMedicine & Remote Health Platform',
                'slug' => 'ai-powered-telemedicine-remote-health',
                'client_name' => 'HealthCare Plus (Nordics)',
                'category' => 'Healthcare & AI',
                'thumbnail' => 'portfolio-health.jpg',
                'challenge' => 'Building a HIPAA-compliant portal with AI preliminary diagnosis, webRTC real-time video, and electronic health records.',
                'solution' => 'Developed custom Flutter mobile app and web portal backed by Python AI models and encrypted database architecture.',
                'impact_metrics' => ['Active Patients' => '250,000+', 'Consultation Time Saved' => '35%'],
                'tech_stack' => ['Flutter', 'Python', 'React', 'AWS', 'OpenAI'],
                'project_url' => 'https://adventuresoft.com',
                'is_featured' => true,
            ],
            [
                'title' => 'Automated Supply Chain & Logistics Control Hub',
                'slug' => 'automated-supply-chain-logistics-control-hub',
                'client_name' => 'Nordic Logistics (Sweden)',
                'category' => 'Enterprise SaaS',
                'thumbnail' => 'portfolio-logistics.jpg',
                'challenge' => 'Real-time GPS tracking and automated route optimization for 10,000 freight vehicles across Europe.',
                'solution' => 'Created interactive WebGL map dashboards with websockets telemetry and automated dispatch engine.',
                'impact_metrics' => ['Fuel Consumption Reduced' => '18%', 'On-Time Deliveries' => '99.4%'],
                'tech_stack' => ['Laravel', 'React', 'PostgreSQL', 'WebSockets', 'Google Maps API'],
                'project_url' => 'https://adventuresoft.com',
                'is_featured' => true,
            ],
        ];

        foreach ($portfolios as $portfolioData) {
            Portfolio::updateOrCreate(['slug' => $portfolioData['slug']], $portfolioData);
        }

        // 6. Testimonials Seeding
        $testimonials = [
            [
                'client_name' => 'Marcus Vance',
                'designation' => 'Chief Technology Officer',
                'company' => 'Global FinTech Corp, USA',
                'comment' => 'Adventure Soft delivered our banking portal 3 weeks ahead of schedule. Their engineering quality, security standards, and attention to micro-animations surpass high-profile Silicon Valley agencies.',
                'rating' => 5,
            ],
            [
                'client_name' => 'Elena Lindqvist',
                'designation' => 'VP of Digital Innovation',
                'company' => 'Nordic Health Systems, Sweden',
                'comment' => 'Working with Adventure Soft has transformed our software delivery pipeline. Their team built our AI health portal seamlessly. Highly recommended!',
                'rating' => 5,
            ],
            [
                'client_name' => 'David Sterling',
                'designation' => 'Founder & CEO',
                'company' => 'Sterling Logistics EU',
                'comment' => 'The aesthetic, speed, and real-time tracking capabilities of our logistics dashboard are second to none. Adventure Soft is our go-to tech partner.',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonialData) {
            Testimonial::updateOrCreate(['client_name' => $testimonialData['client_name']], $testimonialData);
        }

        // 7. Team Members Seeding
        $teams = [
            [
                'name' => 'Tareq Jamil Sarkar',
                'designation' => 'Founder & Chief Executive Officer',
                'department' => 'Executive Leadership',
                'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                'bio' => 'Visionary tech leader with 10+ years driving global enterprise digital transformation and high-performance software engineering.',
                'social_links' => ['linkedin' => 'https://linkedin.com', 'github' => 'https://github.com'],
                'display_order' => 1,
            ],
            [
                'name' => 'Alexander Wright',
                'designation' => 'Head of Software Architecture',
                'department' => 'Engineering',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80',
                'bio' => 'Specializing in distributed systems, microservices, cloud security, and ultra-scalable backend architectures.',
                'social_links' => ['linkedin' => 'https://linkedin.com'],
                'display_order' => 2,
            ],
            [
                'name' => 'Sophia Chen',
                'designation' => 'Lead UI/UX & Creative Director',
                'department' => 'Design & Frontend',
                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80',
                'bio' => 'Passionate about crafting motion-rich, glassmorphic interfaces that captivate users and maximize conversion rates.',
                'social_links' => ['dribbble' => 'https://dribbble.com'],
                'display_order' => 3,
            ],
        ];

        foreach ($teams as $teamData) {
            Team::updateOrCreate(['name' => $teamData['name']], $teamData);
        }

        // 8. Job Postings Seeding
        $jobs = [
            [
                'title' => 'Senior Full-Stack Engineer (Laravel & React)',
                'slug' => 'senior-full-stack-engineer-laravel-react',
                'department' => 'Engineering',
                'job_type' => 'full_time',
                'experience_level' => '5+ Years',
                'location' => 'Dhaka, Bangladesh / Hybrid',
                'salary_range' => '৳ 1,50,000 - ৳ 2,50,000 / month',
                'description' => 'We are seeking a Senior Full-Stack Engineer to lead complex web architecture projects for international clients.',
                'requirements' => "1. 5+ years of hands-on experience in Laravel & Modern React.\n2. Deep knowledge of MySQL optimization & Redis.\n3. Experience with Docker & CI/CD.",
                'deadline' => now()->addDays(30),
            ],
            [
                'title' => 'Lead UI/UX & Motion Designer',
                'slug' => 'lead-ui-ux-motion-designer',
                'department' => 'Design',
                'job_type' => 'full_time',
                'experience_level' => '4+ Years',
                'location' => 'Dhaka, Bangladesh / Remote',
                'salary_range' => '৳ 1,20,000 - ৳ 1,80,000 / month',
                'description' => 'Design cutting-edge glassmorphic web & mobile interfaces with rich GSAP animations.',
                'requirements' => "1. Mastery in Figma, Rive, and GSAP animations.\n2. Proven portfolio of modern SaaS & agency websites.",
                'deadline' => now()->addDays(30),
            ],
        ];

        foreach ($jobs as $jobData) {
            JobPosting::updateOrCreate(['slug' => $jobData['slug']], $jobData);
        }

        // 9. Site Settings Seeding
        $settings = [
            'site_name' => 'Adventure Soft',
            'tagline' => 'Engineering Future-Proof Software for Global Enterprises',
            'contact_email' => 'advsoftbd@gmail.com',
            'contact_phone' => '01612302124',
            'office_address' => 'J.S Tower- lift 5, Merul Badda, Dhaka-1212',
            'facebook_url' => 'https://facebook.com/adventuresoft',
            'linkedin_url' => 'https://linkedin.com/company/adventuresoft',
            'twitter_url' => 'https://twitter.com/adventuresoft',
            'github_url' => 'https://github.com/adventuresoft',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
