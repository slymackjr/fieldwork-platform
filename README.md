<a name="readme-top"></a>

<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/slymackjr/fieldwork-platform">
    <img src="screenshots/logo.png" alt="Logo">
    <h3 align="center">Fieldwork Platform</h3>
  </a>

  <h3 align="center">Connecting Students with Practical Training Opportunities</h3>

  <p align="center">
    Fieldwork Platform is an innovative online system designed to facilitate the connection between students seeking practical field training and employers offering such opportunities.
    <br />
    <a href="https://github.com/slymackjr/fieldwork-platform"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/slymackjr/fieldwork-platform/issues">Report Bug</a>
    ·
    <a href="https://github.com/slymackjr/fieldwork-platform/issues">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#introduction">Introduction</a>
    </li>
    <li>
      <a href="#design-and-implementation">Design and Implementation</a>
      <ul>
        <li><a href="#user-experience-design">User Experience Design</a></li>
        <li><a href="#user-interface-design">User Interface Design</a></li>
        <li><a href="#database-system">Database System</a></li>
        <li><a href="#logic-implementations">Logic Implementations</a></li>
        <li><a href="#use-case-diagram">Use Case Diagram</a></li>
      </ul>
    </li>
    <li>
      <a href="#conclusion">Conclusion</a>
    </li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
    <li><a href="#figures">Figures</a></li>
  </ol>
</details>

<!-- INTRODUCTION -->
## Introduction

### Overview
The Fieldwork Platform is an innovative online system designed to facilitate the connection between students seeking practical field training and employers offering such opportunities. This platform aims to bridge the gap between academic learning and practical experience by providing a streamlined, user-friendly interface where students can explore various field training opportunities, apply for positions, and manage their applications effectively. Employers can easily post available positions, review student applications, and track the progress and attendance of students during the training period.

### Features
- **Student Registration and Profile Management:** Allows students to register, complete their profiles, and upload necessary documents.
- **Field Training Opportunities:** Students can view and apply for multiple training opportunities.
- **Employer Registration and Profile Management:** Enables employers to register, complete profiles, and post training opportunities.
- **Application Management:** Employers can review, accept, or reject student applications.
- **Attendance and Log Book Management:** Employers can record student attendance, and students can fill out and download their log books.

<!-- DESIGN AND IMPLEMENTATION -->
## Design and Implementation

### User Experience Design
The user experience design of the Fieldwork Platform prioritizes ease of use and accessibility. Upon accessing the system, users are prompted to log in with their credentials. Students who are not yet registered can easily create an account, after which they can complete their profiles to gain full access to the platform's features.

### User Interface Design
The user interface design of the Fieldwork Platform employs modern web technologies to deliver a visually appealing and functional experience. The client-side presentation is crafted using HTML for structure and CSS for styling, ensuring that the platform is both attractive and intuitive. The server-side logic is implemented using PHP, which handles the application logic and interacts with the database. This separation of concerns between client-side and server-side components ensures that the platform is responsive and efficient.

### Database System
The database system design includes an Entity-Relationship Diagram (ERD) to model the data structure, ensuring that the platform can efficiently manage user information, field training opportunities, applications, and attendance records. 

![Entity Relationship Diagram](screenshots/Picture2.png)
*Figure 1: Entity Relationship Diagram*

### Logic Implementations
- **Data Validation:** Ensures that all user inputs are properly validated before processing.
- **Cookies and Query Strings:** Manages user sessions and navigation through cookies and query strings.
- **OOP (Object-Oriented Programming):** Utilizes OOP principles to organize and structure the application logic.
- **Error Exception Handling:** Implements robust error handling mechanisms to ensure smooth operation.
- **File Handling:** Manages file uploads and downloads, particularly for student log books.
- **Design Patterns:** Applies design patterns to enhance code reusability and maintainability.
- **Security Aspects:** Implements security measures to protect user data, including password security and middleware integration to prevent unauthorized access.

### Use Case Diagram
Below is the use case diagram illustrating the interactions between students and employers on the Fieldwork Platform:

![Use Case Diagram](screenshots/Picture1.png)
*Figure 2: Use case Diagram*

<!-- CONCLUSION -->
## Conclusion

The Fieldwork Platform provides a comprehensive solution for managing field training opportunities, connecting students with practical training experiences, and streamlining the application and monitoring process for employers. With a focus on user-friendly design, efficient data management, and robust security measures, the platform effectively bridges the gap between academic learning and practical field experience.

<!-- CONTACT -->
## Contact

Peter Patrick Wagalla - [LinkedIn](https://www.linkedin.com/in/peter-patrick-wagalla)  
Jofrey Nyamasheki - [LinkedIn](https://www.linkedin.com/in/jofrey-nyamasheki-9bb8781ab)

Project Link: [https://github.com/slymackjr/fieldwork-platform](https://github.com/slymackjr/fieldwork-platform)

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

- [Choose an Open Source License](https://choosealicense.com)
- [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
- [Img Shields](https://shields.io)
- [GitHub Pages](https://pages.github.com)
- [Font Awesome](https://fontawesome.com)

<!-- FIGURES -->
## Figures

Below are the figures representing various aspects of the Fieldwork Platform:


![Home Page](screenshots/Picture4.png)
*Figure 3: Home page*

![Contact Page](screenshots/Picture5.png)
*Figure 4: Contact Page*

![Fieldwork Details Page](screenshots/Picture6.png)
*Figure 5: Fieldwork Details Page*

![Student Login Page](screenshots/Picture7.png)
*Figure 6: Student Login Page*

![Student Register Page](screenshots/Picture8.png)
*Figure 7: Student Register Page*

![Employer Login Page](screenshots/Picture9.png)
*Figure 8: Employer Login Page*

![Employer Register Page](screenshots/Picture10.png)
*Figure 9: Employer Register Page*

![Student Dashboard Page](screenshots/Picture14.png)
*Figure 10: Student Dashboard Page*

![Student Profile Page](screenshots/Picture12.png)
*Figure 11: Student Profile Page*

![Student Log Book Page](screenshots/Picture13.png)
*Figure 12: Student Log Book Page*

![Employer Dashboard Page](screenshots/Picture11.png)
*Figure 13: Employer Dashboard Page*

![Employer Profile Page](screenshots/Picture15.png)
*Figure 14: Employer Profile Page*

![Attendance Page](screenshots/Picture16.png)
*Figure 15: Attendance Page*

![Edit Attendance Page](screenshots/Picture17.png)
*Figure 16: Edit Attendance Page*

![Edit Fieldwork Post](screenshots/Picture18.png)
*Figure 17: Edit Fieldwork Post*

![Class Diagram](screenshots/Picture19.jpg)
*Figure 18: Class diagram*

![Site Map](screenshots/Picture3.jpg)
*Figure 19: Site Map*

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/slymackjr/fieldwork-platform.svg?style=for-the-badge&color=4EA94B
[contributors-url]: https://github.com/slymackjr/fieldwork-platform/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/slymackjr/fieldwork-platform.svg?style=for-the-badge
[forks-url]: https://github.com/slymackjr/fieldwork-platform/network/members
[stars-shield]: https://img.shields.io/github/stars/slymackjr/fieldwork-platform.svg?style=for-the-badge
[stars-url]: https://github.com/slymackjr/fieldwork-platform/stargazers
[issues-shield]: https://img.shields.io/github/issues/slymackjr/fieldwork-platform.svg?style=for-the-badge
[issues-url]: https://github.com/slymackjr/fieldwork-platform/issues
[license-shield]: https://img.shields.io/github/license/slymackjr/fieldwork-platform.svg?style=for-the-badge
[license-url]: https://github.com/slymackjr/fieldwork-platform/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/jofrey-nyamasheki-9bb8781ab
