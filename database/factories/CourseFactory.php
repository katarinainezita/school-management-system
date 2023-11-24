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

        $category = fake()->unique()->randomElement(["Cybersecurity", "Machine Learning", "Front End", "Backend", "Android", "IOS", "IoT", "Cloud Computing", "Data Science", "Economy"]);

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
        else if($category == "Cloud Computing"){
            $title = "Introduction to Information Technology and AWS Cloud";
            $description = "Technology is omnipresent, but how did we get here? And what does the future hold for a world that's increasingly connected, mobile and data-rich? This course is intended to give learners enough technical context to understand how to build solutions in the cloud starting from zero technical knowledge. Before diving into the cloud, we will cover the basics of: how do computers work (including software and operating systems), an introduction to information technology, the basics of modern IT infrastructure, and the cloud careers that will be increasingly in-demand. We will then move into the world of internet connected networks (the Internet), covering local hosts, web servers, web applications, web security, the inner workings of a website and the differences between static and dynamic content. We'll close the course by introducing Cloud Computing, its role in our world, the differences between public, private and hybrid, and why APIs are so important.";
        }
        else if($category == "Data Science"){
            $title = "Foundations of Data Science";
            $description = "This is the first of seven courses in the Google Advanced Data Analytics Certificate, which will help develop the skills needed to apply for more advanced data professional roles, such as an entry-level data scientist or advanced-level data analyst. Data professionals analyze data to help businesses make better decisions. To do this, they use powerful techniques like data storytelling, statistics, and machine learning. In this course, you’ll begin your learning journey by exploring the role of data professionals in the workplace. You’ll also learn about the project workflow PACE (Plan, Analyze, Construct, Execute) and how it can help you organize data projects.";
        }
        else if ($category == "Economy"){
            $title = "Game Theory";
            $description = "Popularized by movies such as \"A Beautiful Mind,\" game theory is the mathematical modeling of strategic interaction among rational (and irrational) agents. Beyond what we call `games' in common language, such as chess, poker, soccer, etc., it includes the modeling of conflict among nations, political campaigns, competition among firms, and trading behavior in markets such as the NYSE. How could you begin to model keyword auctions, and peer to peer file-sharing networks, without accounting for the incentives of the people using them? The course will provide the basics: representing games and strategies, the extensive form (which computer scientists call game trees), Bayesian games (modeling things like auctions), repeated and stochastic games, and more. We'll include a variety of examples including classic games and a few applications.";
        }

        return [
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'level' => fake()->randomElement(["Basic", "Beginner", "Intermediate", "Advanced"]),
            'photo' => 'course/default.jpeg',
            'draft' => false,
        ];
    }
}
