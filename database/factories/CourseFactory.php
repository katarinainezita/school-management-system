<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = "";
        $description = "";

        $category = fake()->randomElement(["Cybersecurity", "Machine Learning", "Front End", "Backend", "Android", "IOS", "IoT"]);

        if($category == "Cybersecurity") {
            $title = "Foundation of Cybersecurity";
            $description = "This is the first course in the Google Cybersecurity Certificate. These courses will equip you with the skills you need to prepare for an entry-level cybersecurity job. 

            In this course, you will be introduced to the world of cybersecurity through an interactive curriculum developed by Google. You will identify significant events that led to the development of the cybersecurity field, explain the importance of cybersecurity in today's business operations, and explore the job responsibilities and skills of an entry-level cybersecurity analyst.";
        }
        else if($category == "Machine Learning"){
            $title = "Machine Learning with Python";
            $description = "Get ready to dive into the world of Machine Learning (ML) by using Python! This course is for you whether you want to advance your Data Science career or get started in Machine Learning and Deep Learning.  

            This course will begin with a gentle introduction to Machine Learning and what it is, with topics like supervised vs unsupervised learning, linear & non-linear regression, simple regression and more.  
            
            You will then dive into classification techniques using different classification algorithms, namely K-Nearest Neighbors (KNN), decision trees, and Logistic Regression. You’ll also learn about the importance and different types of clustering such as k-means, hierarchical clustering, and DBSCAN.";
        }
        else if($category == "Front End") {
            $title = "Introduction to Front-End Developer";
            $description = "Welcome to Introduction to Front-End Development, the first course in the Meta Front-End Developer program.  

            This course is a good place to start if you want to become a web developer. You will learn about the day-to-day responsibilities of a web developer and get a general understanding of the core and underlying technologies that power the internet. You will learn how front-end developers create websites and applications that work well and are easy to maintain.";
        }
        else if($category == "Backend") {
            $title = "Developing Backend Apps with Node.js and Express";
            $description = "Throughout the course, you will complete numerous hands-on labs to gain practical experience. At the end of the course, you will demonstrate your Node skills with a final project to build your portfolio.
 
            This course will help you succeed as a back-end or full-stack developer. It suits those in IT looking to step up in their careers or new graduates seeking to establish their server-side skills. This course suits those who need to manage cloud-centric projects.";
        }
        else if($category == "Android") {
            $title = "Advanced App Development in Android";
            $description = "This Specialization is intended for learners with basic knowledge in Android app development seeking to develop knowledge in computer graphics and virtual reality in Android. Through the 4 courses, you will learn basic computer graphics theories and practical implementations of 3D graphics, OpenGL ES, and Virtual Reality on Android which will prepare you to design and develop immersive 3D and virtual reality Android app.";
        }
        else if($category == "IOS") {
            $title = "iOs App Development with Swift";
            $description = "This Specialization covers the fundamentals of iOS application development in the Swift programming language. You’ll learn to use development tools such as XCode, design interfaces and interactions and evaluate their usability, and integrate camera, photo, and location information to enhance your app. In the final Capstone Project, you’ll apply your skills to create a fully-functioning photo editing app for iPhone, iPad, and Apple Watch. A Mac computer is required for success in this course.";
        }
        else if($category == "IoT") {
            $title = "An Introduction to Programming the Internet of Things (IOT) Specialization";
            $description = "This Specialization covers embedded systems, the Raspberry Pi Platform, and the Arduino environment for building devices that can control the physical world. In the final Capstone Project, you’ll apply the skills you learned by designing, building, and testing a microcontroller-based embedded system, producing a unique final project suitable for showcasing to future employers. Please note that this specialization does not offer discussion forums.";
        }

        return [
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'level' => fake()->randomElement(["Dasar", "Pemula", "Menengah", "Mahir"]),
            'photo' => 'course/default.jpeg',
            'draft' => false,
        ];
    }
}
