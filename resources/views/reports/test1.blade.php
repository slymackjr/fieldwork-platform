 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Student Log Book</title>
     <style>
         /* General Styles */
         body {
             font-family: Arial, sans-serif;
             background-color: #fff;
             margin: 0;
             padding: 0;
             display: flex;
             justify-content: center; /* Center horizontally */
             align-items: center; /* Center vertically */
            /*  min-height: 100vh; */
         }
 
         .container {
             width: 90%;
             max-width: 800px;
             padding: 20px;
             box-sizing: border-box;
         }
 
         h1, h2, h3 {
             color: #2f5597;
             margin: 10px 0;
             text-align: center;
         }
 
         p {
             font-size: 16px;
             line-height: 1.6;
             margin-bottom: 10px;
         }
 
         .logo {
            text-align: center; /* Center the logo using text-align */
            margin: 20px 0;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

 
         .year {
             text-align: center;
             margin-top: 20px;
         }
 
         .year span {
             display: inline-block;
             padding: 10px 20px;
             background: linear-gradient(to right, #c0c0c0 0%, #2f5597 100%);
             color: #fff;
             font-weight: bold;
             border-radius: 5px;
             box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
         }
 
         .note, .warning {
             margin-top: 20px;
             text-align: justify; /* Justify text */
             font-style: italic;
         }
 
         .warning {
             font-weight: bold;
         }
 
         .section {
             margin-bottom: 20px;
         }
 
         .section h4 {
             font-size: 16px;
             margin-top: 20px;
             text-align: center;
         }
 
         .line {
             border-bottom: 1px dashed #333;
             margin: 5px 0;
         }
 
         .aim {
             text-align: center;
             margin-bottom: 20px;
             font-style: italic;
         }
 
         h3 {
             text-align: left;
             margin-bottom: 20px;
             font-size: 18px;
             color: #2f5597;
         }
 
         /* Responsive adjustments */
         @media (max-width: 600px) {
             .container {
                 margin: 10px;
             }
         }
 
         /* Additional Styles for Combined Sections */
         .lines {
             border-bottom: 1px dotted #000;
             height: 150px; /* Adjust this height as needed for the lines */
             margin-bottom: 20px;
             position: relative;
         }
 
         .lines::after {
             content: "";
             display: block;
             border-bottom: 1px dotted #000;
             height: 150px; /* Adjust this height as needed for the lines */
             position: absolute;
             left: 0;
             right: 0;
             top: 0;
         }
 
         .lines.short {
             height: 80px; /* Adjust this height for shorter sections */
         }
 
         p i {
             font-style: italic;
         }
     </style>
 </head>
 <body>
     <div class="container">
         <!-- Cover Page -->
         <h1>INSTITUTE OF FINANCE MANAGEMENT</h1>
         <div class="logo">
             <img src="{{asset('img/logo.png')}}" alt="Institute Logo">
         </div>
         <h2>STUDENT LOG BOOK</h2>
         <h2>FOR FIELD PRACTICAL TRAINING</h2>
         <div class="year">
             <span>2022/2023</span>
         </div>
 
         <!-- Details Page -->
         <div>
            <p class="aim">The aim of the logbook is to ensure that a student is actively involved throughout the field work.</p>
         </div>
 
         <div class="section">
             <p>Name of the Student: ....................................................................................</p>
             <p>Reg. No: .........................................................</p>
             <p>Programme of Study: ....................................................................................</p>
             <p>Year: .........................................................</p>
         </div>
 
         <div class="section">
             <h4>[To be filled by students]</h4>
             <p>Host Organization worked for: .............................................................................................</p>
             <p>Organization Address: .....................................................................................................</p>
             <p>Telephone(s): ..................................... Email: .................................................................</p>
             <p>Name of the Contact Person: ..............................................................................................</p>
             <p>Position: .............................................. Office Tel: .....................................</p>
             <p>Mobile: ............................................. Email: .................................................................</p>
         </div>
 
         <div class="section">
             <h4>[To be filled by IFM Staff]</h4>
             <p>Name of IFM Field Visit Supervisor: ..........................................................................................................</p>
             <p>Date of visiting: .......................................................... Signature: ............................................................</p>
             <p>Observation and comments: .........................................................................................................................</p>
             <p>......................................................................................................................................................................</p>
             <p>Suggestions to students: ................................................................................................................................</p>
         </div>
 
         <div class="section">
             <h4>To be filled by Host Supervisor</h4>
             <p>This work has been checked by host supervisor: ........................................................................................</p>
             <p>Date Reported for field work: ...................................... Date Finished the Attachment: .......................</p>
             <p>Total Number of days worked: ....................................................................................................................</p>
             <p>Host supervisors name: .................................................. Department: .......................................................</p>
             <p>Position: ................................................................. Office Tel: ............................................................</p>
             <p>Mobile No: ........................................................... Signature & Official Stamp: ........................................</p>
         </div>
 
         <p class="note">Every day student will make a summarized entry of the work done and lessons learnt. These entries will be checked by host supervisor for accuracy and relevancy and confirmed by Institute field report writing supervisor.</p>
         <p class="warning">Entries not signed will not be accepted for assessment.</p>
 
         <!-- First Week Page -->
         <h3>FIRST WEEK</h3>
 
         <div class="section">
             <p>Department: ................................................................. Section: ............................................................</p>
             <p>Date (From): ................................................................. To: ...............................................................</p>
         </div>
 
         <div class="section">
             <p>Brief Description of Tasks Undertaken in the first week:</p>
 
             <p>Day 1</p>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
 
             <p>Day 2</p>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
 
             <p>Day 3</p>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
 
             <p>Day 4</p>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>

             <p>Day 5</p>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
         </div>
 
         <div class="section">
             <h2>Lessons Learned in the first week of field practical Training:</h2>
             <p>Date (From)..................................................To..................................................</p>
 
             <h3>Day1</h3>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
 
             <h3>Day2</h3>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
 
             <h3>Day3</h3>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
         </div>
 
         <!-- Third HTML Block Integration -->
         <div class="section">
             <h3>Day4</h3>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
 
             <h3>Day5</h3>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
 
             <p>Name of Head of department/Section.................................................................</p>
             <p>Comments (If any): ..................................................................................................</p>
             <p>Signature: ............................................... Date........................................</p>
 
             <h2>Weekly Comments by Host Supervisors</h2>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <div class="line"></div>
             <p>Name: ............................................... Signature: ........................................</p>
             <p>Date..................................................</p>
             <p><i>Official Stamp:</i> ..................................................</p>
         </div>
     </div>
 </body>
 </html>
 
 
 