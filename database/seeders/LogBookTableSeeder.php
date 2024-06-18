<?php

namespace Database\Seeders;

use App\Models\LogBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=LogBookSeeder
        // Example: Update existing LogBook entry with activities
        $logBookEntry = LogBook::findOrFail(3); // Find the LogBook entry by its ID

        if ($logBookEntry) {
            // Update the activities for days 1 to 40
            $logBookEntry->day_1 = "Requirement Gathering: Interacting with stakeholders to understand software requirements.";
            $logBookEntry->day_2 = "Analysis: Analyzing requirements and creating functional specifications.";
            $logBookEntry->day_3 = "Design: Designing software architecture and database schema.";
            $logBookEntry->day_4 = "Prototyping: Creating prototypes or wireframes for UI design.";
            $logBookEntry->day_5 = "Coding: Writing code in programming languages such as Java, Python, C#, etc.";
            $logBookEntry->day_6 = "Testing: Performing unit testing to ensure individual components work correctly.";
            $logBookEntry->day_7 = "Integration Testing: Testing integrated modules to verify interaction.";
            $logBookEntry->day_8 = "System Testing: Testing the entire system to ensure all components work together.";
            $logBookEntry->day_9 = "Debugging: Identifying and fixing bugs or issues in the code.";
            $logBookEntry->day_10 = "Version Control: Using tools like Git to manage code versions and collaboration.";
            $logBookEntry->day_11 = "Code Review: Participating in peer code reviews to ensure code quality.";
            $logBookEntry->day_12 = "Documentation: Writing technical documentation for code, APIs, or system architecture.";
            $logBookEntry->day_13 = "Deployment Planning: Planning the deployment process for software releases.";
            $logBookEntry->day_14 = "Continuous Integration/Delivery (CI/CD): Implementing CI/CD pipelines for automated builds and deployments.";
            $logBookEntry->day_15 = "Database Management: Designing, optimizing, and maintaining databases (SQL or NoSQL).";
            $logBookEntry->day_16 = "UI/UX Design: Working on UI and UX design improvements.";
            $logBookEntry->day_17 = "Performance Testing: Analyzing software performance and optimizing code.";
            $logBookEntry->day_18 = "Security Testing: Conducting security assessments and implementing secure coding practices.";
            $logBookEntry->day_19 = "Client Meetings: Participating in client meetings for project updates or requirements.";
            $logBookEntry->day_20 = "Project Management: Assisting in project planning, scheduling, and resource allocation.";
            $logBookEntry->day_21 = "Agile/Scrum Meetings: Participating in agile or scrum ceremonies.";
            $logBookEntry->day_22 = "Customer Support: Providing technical support and troubleshooting for end-users.";
            $logBookEntry->day_23 = "Training: Conducting training sessions for end-users or internal teams.";
            $logBookEntry->day_24 = "Research and Development: Exploring new technologies or frameworks.";
            $logBookEntry->day_25 = "Risk Assessment: Identifying potential risks and proposing mitigation strategies.";
            $logBookEntry->day_26 = "Change Management: Implementing changes in software based on user feedback.";
            $logBookEntry->day_27 = "Quality Assurance: Ensuring software quality through testing methodologies.";
            $logBookEntry->day_28 = "Compliance: Ensuring software complies with industry standards and regulations.";
            $logBookEntry->day_29 = "Performance Optimization: Optimizing software performance through refactoring.";
            $logBookEntry->day_30 = "Backup and Recovery: Implementing backup and recovery strategies.";
            $logBookEntry->day_31 = "User Acceptance Testing (UAT): Conducting UAT with stakeholders.";
            $logBookEntry->day_32 = "Feature Development: Developing new features or enhancements.";
            $logBookEntry->day_33 = "Code Refactoring: Refactoring existing code for readability and performance.";
            $logBookEntry->day_34 = "Technical Debt Management: Addressing technical debt through refactoring.";
            $logBookEntry->day_35 = "API Integration: Integrating with third-party APIs for functionality.";
            $logBookEntry->day_36 = "Performance Monitoring: Monitoring application performance and responding to issues.";
            $logBookEntry->day_37 = "Patch Management: Applying patches or updates to software components.";
            $logBookEntry->day_38 = "Continuous Learning: Staying updated with new technologies and trends.";
            $logBookEntry->day_39 = "Comprehensive Testing: Conducting end-to-end testing across environments.";
            $logBookEntry->day_40 = "Feedback Analysis: Analyzing user feedback and improving software.";

            // Save the updated entry
            $logBookEntry->save();
        }
    }
}
