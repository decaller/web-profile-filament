<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Activity;
use App\Models\Publication;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Datlechin\FilamentMenuBuilder\Models\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@admin.com'],
            [
                'name' => 'School Staff',
                'password' => bcrypt('password'),
            ]
        );

        // 2. Settings
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_title' => 'Nexus Academy',
                'site_description' => 'A premier educational institution dedicated to excellence and innovation in learning.',
                'contact_email' => 'info@nexusacademy.edu',
                'contact_phone' => '+1 (555) 123-4567',
                'contact_address' => '123 Education Plaza, Innovation City, IC 54321',
                'social_links' => [
                    ['platform' => 'Facebook', 'url' => 'https://facebook.com'],
                    ['platform' => 'Instagram', 'url' => 'https://instagram.com'],
                    ['platform' => 'Twitter', 'url' => 'https://twitter.com'],
                ],
            ]
        );

        // 3. Content Resources
        
        // Testimonials
        $testimonials = [
            ['author_name' => 'Sarah Johnson', 'author_title' => 'Parent of Grade 8 Student', 'content' => 'Nexus Academy has completely transformed my daughter\'s attitude towards learning. The teachers are incredibly supportive.'],
            ['author_name' => 'Dr. Robert Miller', 'author_title' => 'Alumni, Class of 2018', 'content' => 'The foundation I received here was instrumental in my success at University. Truly a world-class environment.'],
            ['author_name' => 'Elena Rodriguez', 'author_title' => 'Academic Director', 'content' => 'We strive every day to provide an environment where every student can find their passion and excel.'],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['author_name' => $t['author_name']], array_merge($t, ['is_active' => true]));
        }

        // Posts
        for ($i = 1; $i <= 5; $i++) {
            Post::updateOrCreate(
                ['slug' => "news-item-$i"],
                [
                    'title' => "Modern Learning Trends in $i",
                    'content' => "<p>Discover how we are integrating modern technology and student-centered learning into our curriculum. This is news post number $i.</p><p>We focus on critical thinking and collaboration.</p>",
                    'published_at' => now()->subDays($i),
                ]
            );
        }

        // Activities
        for ($i = 1; $i <= 3; $i++) {
            Activity::updateOrCreate(
                ['slug' => "annual-science-fair-$i"],
                [
                    'title' => "Annual Science Fair $i",
                    'date' => now()->subMonths($i)->format('Y-m-d'),
                    'content' => "<p>Our students showcased incredible innovation at this year's Science Fair. From robotics to environmental solutions.</p>",
                    'gallery' => [],
                ]
            );
        }

        // Publications
        Publication::updateOrCreate(
            ['slug' => 'school-mag-autumn-2024'],
            [
                'title' => 'Autumn Magazine 2024',
                'description' => '<p>Read about our achievements and future plans in this semester\'s official magazine.</p>',
                'document_file' => 'publications/sample-mag.pdf', // Placeholder path
                'gallery' => [],
            ]
        );

        // 4. Pages with Blocks
        
        // HOME PAGE
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Welcome to Nexus Academy',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'title' => 'Building Future Leaders',
                            'subtitle' => 'Excellence in education for a changing world.',
                            'primary_button_label' => 'Explore Programs',
                            'primary_button_url' => '/programs',
                        ]
                    ],
                    [
                        'type' => 'challenge',
                        'data' => [
                            'heading' => 'Finding the Right Fit?',
                            'description' => '<p>Choosing the right school is one of the most important decisions you will make. You need an environment that challenges and supports.</p>'
                        ]
                    ],
                    [
                        'type' => 'solution',
                        'data' => [
                            'heading' => 'The Nexus Solution',
                            'description' => '<p>We provide a holistic approach to education, combining rigorous academics with character development and creative arts.</p>'
                        ]
                    ],
                    [
                        'type' => 'programs',
                        'data' => [
                            'heading' => 'Our Core Programs',
                            'items' => [
                                ['title' => 'STEM Excellence', 'description' => 'Advanced science and math integration.', 'icon' => 'heroicon-o-beaker'],
                                ['title' => 'Liberal Arts', 'description' => 'Developing critical thinking and global perspectives.', 'icon' => 'heroicon-o-globe-alt'],
                                ['title' => 'Athletics', 'description' => 'Teaching teamwork and perseverance.', 'icon' => 'heroicon-o-trophy'],
                            ]
                        ]
                    ],
                    [
                        'type' => 'recent_blogs',
                        'data' => ['heading' => 'Latest Updates', 'count' => 3]
                    ],
                    [
                        'type' => 'cta',
                        'data' => [
                            'heading' => 'Ready to Start Your Journey?',
                            'text' => 'Join our community today.',
                            'button_label' => 'Apply Now',
                            'button_url' => '/registration'
                        ]
                    ]
                ]
            ]
        );

        // ABOUT PAGE
        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'About Us',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => ['title' => 'Our Mission & Vision', 'subtitle' => 'Since 1995']
                    ],
                    [
                        'type' => 'dynamic_testimonials',
                        'data' => ['heading' => 'Voices of Our Community', 'count' => 3]
                    ],
                    [
                        'type' => 'faq',
                        'data' => [
                            'heading' => 'Common Questions',
                            'questions' => [
                                ['question' => 'What is our student-teacher ratio?', 'answer' => '<p>We maintain a 15:1 ratio to ensure personalized attention.</p>'],
                                ['question' => 'Do you offer scholarships?', 'answer' => '<p>Yes, we offer both merit and need-based financial aid.</p>'],
                            ]
                        ]
                    ]
                ]
            ]
        );

        // REGISTRATION PAGE
        Page::updateOrCreate(
            ['slug' => 'registration'],
            [
                'title' => 'Admission & Registration',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => ['title' => 'Enroll Your Child', 'subtitle' => 'Secure a spot for the next academic year']
                    ],
                    [
                        'type' => 'featured_publications',
                        'data' => ['heading' => 'Download Guidelines', 'count' => 3]
                    ]
                ]
            ]
        );

        // CONTACT PAGE
        Page::updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'Contact Us',
                'content' => [
                    [
                        'type' => 'recent_activities',
                        'data' => ['heading' => 'Visit Our Campus Activities', 'count' => 3]
                    ]
                ]
            ]
        );

        // 5. Menus
        $headerMenu = Menu::updateOrCreate(['name' => 'Header Menu'], ['is_visible' => true]);
        $footerMenu = Menu::updateOrCreate(['name' => 'Footer Menu'], ['is_visible' => true]);

        \DB::table('menu_locations')->updateOrInsert(
            ['location' => 'header'],
            ['menu_id' => $headerMenu->id]
        );
        \DB::table('menu_locations')->updateOrInsert(
            ['location' => 'footer'],
            ['menu_id' => $footerMenu->id]
        );

        // Add some menu items
        if ($headerMenu->menuItems()->count() === 0) {
            $headerMenu->menuItems()->createMany([
                ['title' => 'Home', 'url' => '/', 'order' => 1],
                ['title' => 'About Us', 'url' => '/about', 'order' => 2],
                ['title' => 'News', 'url' => '/blogs', 'order' => 3],
                ['title' => 'Activities', 'url' => '/activities', 'order' => 4],
                ['title' => 'Registration', 'url' => '/registration', 'order' => 5],
            ]);
        }
    }
}
