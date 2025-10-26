<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'title' => 'Welcome to My Blog',
                'slug' => 'welcome-to-my-blog',
                'content' => '<p>Welcome to my personal blog where I share my thoughts, experiences, and knowledge about web development, programming, and technology in general.</p><p>In this first post, I want to introduce myself and explain what you can expect from this blog in the future.</p><p>Stay tuned for more interesting articles!</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Getting Started with Laravel',
                'slug' => 'getting-started-with-laravel',
                'content' => '<p>Laravel is a powerful PHP framework that has gained immense popularity in recent years. In this comprehensive guide, we will explore the basics of Laravel and how to get started with building web applications.</p><p>We will cover topics such as routing, controllers, models, and views. We will also discuss best practices and common pitfalls to avoid.</p><p>Whether you are a beginner or an experienced developer, this guide will provide valuable insights into the Laravel ecosystem.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Understanding MVC Architecture',
                'slug' => 'understanding-mvc-architecture',
                'content' => '<p>Model-View-Controller (MVC) is a software architectural pattern that separates an application into three interconnected components. This separation allows for efficient code organization and makes applications easier to maintain and scale.</p><p>In this article, we will dive deep into the MVC pattern, explaining each component and how they work together to create robust web applications.</p><p>We will also look at practical examples and discuss how MVC is implemented in popular frameworks like Laravel and Rails.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [   
                'user_id' => 1,
                'title' => 'Best Practices for RESTful API Design',
                'slug' => 'best-practices-restful-api-design',
                'content' => '<p>Designing RESTful APIs can be challenging, especially when dealing with complex business logic and various data requirements. In this comprehensive guide, we will explore best practices for creating robust, scalable, and maintainable APIs.</p><p>We will cover topics such as resource naming, HTTP methods, status codes, pagination, filtering, and error handling. We will also discuss security considerations and performance optimization techniques.</p><p>By the end of this article, you will have a solid understanding of how to design APIs that are both developer-friendly and production-ready.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Introduction to Vue.js',
                'slug' => 'introduction-to-vuejs',
                'content' => '<p>Vue.js is a progressive JavaScript framework for building user interfaces. It is designed from the ground up to be incrementally adoptable, and the core library focuses on the view layer only.</p><p>In this tutorial, we will learn the fundamentals of Vue.js, including data binding, directives, components, and event handling. We will also explore more advanced concepts like computed properties, watchers, and lifecycle hooks.</p><p>By the end of this tutorial, you will be able to build interactive web applications using Vue.js and understand how it compares to other popular frameworks.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Database Design Principles',
                'slug' => 'database-design-principles',
                'content' => '<p>Good database design is crucial for building scalable and maintainable applications. In this comprehensive guide, we will explore the fundamental principles of database design and how to apply them in practice.</p><p>We will discuss concepts such as normalization, relationships, indexing, and query optimization. We will also cover common design patterns and anti-patterns, and learn how to make informed decisions about database structure.</p><p>Whether you are working with relational or NoSQL databases, this article will provide valuable insights into creating efficient database schemas.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Git Workflow for Teams',
                'slug' => 'git-workflow-for-teams',
                'content' => '<p>Effective version control is essential for collaborative software development. In this article, we will explore various Git workflows that are commonly used in professional development teams.</p><p>We will discuss branching strategies, merge vs rebase, pull requests, code reviews, and conflict resolution. We will also look at tools and practices that can help streamline the development process.</p><p>By the end of this guide, you will have a solid understanding of how to work effectively with Git in a team environment.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 1,
                'title' => 'Introduction to Docker',
                'slug' => 'introduction-to-docker',
                'content' => '<p>Docker has revolutionized the way we build, ship, and run applications. In this comprehensive guide, we will explore Docker and containerization concepts from the ground up.</p><p>We will cover topics such as Docker images, containers, volumes, networks, and Docker Compose. We will also discuss best practices for containerizing applications and deploying them to production environments.</p><p>By the end of this tutorial, you will be able to containerize your applications and understand how Docker can improve your development workflow.</p>',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'CSS Flexbox and Grid Layout',
                'slug' => 'css-flexbox-and-grid-layout',
                'content' => '<p>Modern CSS layout techniques like Flexbox and Grid have transformed the way we build responsive web interfaces. In this tutorial, we will explore both layout systems and learn when to use each one.</p><p>We will dive deep into Flexbox properties and concepts, then move on to CSS Grid and its powerful two-dimensional layout capabilities. We will also look at practical examples and real-world use cases.</p><p>By the end of this tutorial, you will be able to create complex, responsive layouts with ease using these modern CSS techniques.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'JavaScript ES6+ Features',
                'slug' => 'javascript-es6-features',
                'content' => '<p>ECMAScript 2015 (ES6) and subsequent versions have introduced many powerful features to JavaScript. In this comprehensive guide, we will explore the most important new features and how to use them effectively.</p><p>We will cover topics such as arrow functions, destructuring, spread operator, template literals, classes, modules, and async/await. We will also discuss how to use these features to write cleaner, more maintainable code.</p><p>Whether you are new to modern JavaScript or looking to refresh your knowledge, this guide will help you stay up to date with the latest JavaScript features.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
        
        // Add more posts to trigger pagination
        $additionalPosts = [
            [
                'user_id' => 2,
                'title' => 'Building RESTful APIs with Express.js',
                'slug' => 'building-restful-apis-express',
                'content' => '<p>Express.js is one of the most popular web frameworks for Node.js. In this tutorial, we will learn how to build RESTful APIs using Express.js.</p><p>We will cover topics such as routing, middleware, error handling, and database integration. We will also discuss best practices for API design and security.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Introduction to React Hooks',
                'slug' => 'introduction-react-hooks',
                'content' => '<p>React Hooks revolutionized how we write functional components in React. In this guide, we will explore the built-in hooks and learn how to create custom hooks.</p><p>We will cover useState, useEffect, useContext, and more. We will also look at practical examples and common patterns.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Advanced SQL Queries',
                'slug' => 'advanced-sql-queries',
                'content' => '<p>Mastering SQL is essential for any backend developer. This article covers advanced SQL concepts including joins, subqueries, window functions, and CTEs.</p><p>We will work through practical examples and learn how to optimize query performance.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Understanding Web Security',
                'slug' => 'understanding-web-security',
                'content' => '<p>Web security is crucial for protecting user data and maintaining trust. In this comprehensive guide, we will explore common vulnerabilities and best practices.</p><p>We will cover topics such as XSS, CSRF, SQL injection, authentication, and HTTPS.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'GraphQL vs REST: Choosing the Right API',
                'slug' => 'graphql-vs-rest',
                'content' => '<p>GraphQL and REST serve different purposes and have their own strengths. This article will help you understand when to use each approach.</p><p>We will compare their features, performance, and use cases to help you make informed decisions.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'Progressive Web Apps (PWA)',
                'slug' => 'progressive-web-apps',
                'content' => '<p>Progressive Web Apps combine the best of web and mobile apps. In this guide, we will learn how to build PWAs using modern web technologies.</p><p>We will cover service workers, caching strategies, push notifications, and app manifest.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 2,
                'title' => 'TypeScript Fundamentals',
                'slug' => 'typescript-fundamentals',
                'content' => '<p>TypeScript adds static type checking to JavaScript, making code more robust and maintainable. This guide covers the fundamentals of TypeScript.</p><p>We will explore types, interfaces, classes, generics, and how to configure TypeScript in your project.</p>',
                'author' => 'John Doe',
                'published' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Serverless Architecture Explained',
                'slug' => 'serverless-architecture',
                'content' => '<p>Serverless architecture allows developers to build and run applications without managing servers. Learn the benefits and challenges of going serverless.</p><p>We will explore AWS Lambda, Azure Functions, and best practices for serverless development.</p>',
                'author' => 'Jane Doe',
                'published' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Microservices Communication Patterns',
                'slug' => 'microservices-communication',
                'content' => '<p>In a microservices architecture, services need to communicate efficiently. This article explores various communication patterns and when to use them.</p><p>We will cover synchronous vs asynchronous communication, message queues, API gateways, and more.</p>',
                'author' => 'Jane Doe',
                'published' => true,
            ],
            [
                'user_id' => 3,
                'title' => 'Performance Optimization Techniques',
                'slug' => 'performance-optimization',
                'content' => '<p>Website performance is critical for user experience and SEO. This guide covers various optimization techniques for both frontend and backend.</p><p>We will discuss caching, lazy loading, code splitting, database optimization, and CDN strategies.</p>',
                'author' => 'Jane Doe',
                'published' => true,
            ],
        ];
        
        foreach ($additionalPosts as $post) {
            Post::create($post);
        }
    }
}
