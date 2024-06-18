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
              text-align: justify;
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
              display: inline-block;
              border-bottom: 2px dotted #000000;
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
  
          p i {
              font-style: italic;
          }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        /* Add this CSS class to your existing style block */
        .line-img {
            display: inline-block;
            border-bottom: 2px dotted #000000;
        }

      </style>
  </head>
  <body>
      <div class="container">
          <!-- Cover Page -->
          <h1 class="uppercase">{{ $student->university }}</h1>
          <div class="logo">
              <img src="{{ public_path('storage/' . $student->universityLogo) }}" alt="Institute Logo">
          </div>
          <h2>STUDENT LOG BOOK</h2>
          <h2>FOR FIELD PRACTICAL TRAINING</h2>
          <div class="year">
            <span>{{ date('Y') }}/{{ date('Y') + 1 }}</span>
          </div>
  
          <!-- Details Page -->
          <div>
             <p class="aim">The aim of the logbook is to ensure that a student is actively involved throughout the field work.</p>
          </div>
  
          <div class="section">
              <p>Name of the Student: <span class="line capitalize">{{ $student->studentName }}</span></p>
              <p>Reg. No: <span class="line uppercase">{{ $student->registrationID }}</span> </p>
              <p>Programme of Study: <span class="line">{{ $student->course }}</span> </p>
              <p>Year: <span class="line">{{ $student->studyYear }}</span> </p>
          </div>
  
          <div class="section">
              <h4>[To be filled by IFM Staff]</h4>
              <p>Name of IFM Field Visit Supervisor: ..........................................................................</p>
              <p>Date of visiting: .......................................................... Signature: ......................</p>
              <p>Observation and comments: ....................................................................................</p>
              <p>..............................................................................................................</p>
              <p>Suggestions to students: .....................................................................................</p>
          </div>
  
          <div class="section">
              <h4>Host Supervisor</h4>
              <p>This work has been checked by host supervisor: ...............................................................</p>
              <p>Date Reported for field work: .................. Date Finished the Attachment: ........................</p>
              <p>Total Number of days worked: .................................................................................</p>
              <p>Host Organization worked for: <span class="line capitalize">{{ $employer->companyName }}</span></p>
              <p>Location: <span class="line capitalize">{{ $employer->location }}</span> </p>
              <p>Host supervisors name: <span class="line capitalize">{{ $employer->supervisorName }}</span> </p>
              <p>Position: <span class="line capitalize">{{ $employer->supervisorPosition }}</span> </p>
              <p>Mobile No: <span class="line">{{ $employer->supervisorPhone }} </span>  Email: <span class="line">{{ $employer->supervisorEmail }}</span> </p>
              <p>Signature: <img class="line-img" src="{{ public_path('storage/' . $employer->supervisorSignature) }}" alt="Signature" width="100"></p><p>Official Stamp: <img class="line-img" src="{{ public_path('storage/' . $employer->Muhuri) }}" alt="Stamp" width="100"></p>
          </div>
  
          <p class="note">Every day student will make a summarized entry of the work done and lessons learnt. These entries will be checked by host supervisor for accuracy and relevancy and confirmed by Institute field report writing supervisor.</p>
          <p class="warning">Entries not signed will not be accepted for assessment.</p>
          {{-- @for ($week = 1; $week <= 8; $week++)
             <!-- First Week Page -->
             <h3>WEEK {{ $week }}</h3>
     
             <div class="section">
                 <p>Department: ...................................... Section: ............................................................</p>
                 <p>Date (From): ...................................... To: ...............................................................</p>
             </div>
     
             <div class="section">
                 <p>Brief Description of Tasks Undertaken in the first week:</p>
                 @for ($day = 1; $day <= 5; $day++)
                     @php
                         $dayNumber = ($week - 1) * 5 + $day;
                     @endphp
                     <p>Day {{ $day }}</p>
                     <div class="line">{{ $logs[$dayNumber] ?? 'No log entry' }}</div>
                 @endfor
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
             </div>
      
             <!-- Third HTML Block Integration -->
             <div class="section">
                 <h2>Weekly Comments by Host Supervisors</h2>
                 <p>Supervisor's Name: <span class="line capitalize">{{ $employer->supervisorName }}</span></p>
                 <p>Comments (If any): ..................................................................................................</p>
                 <p><i>Signature:</i> <img class="line-img" src="{{ public_path('storage/' . $employer->supervisorSignature) }}" alt="Signature" width="100"> <i>Official Stamp:</i> <img class="line-img" src="{{ public_path('storage/' . $employer->Muhuri) }}" alt="Stamp" width="100"> Date.........................</p>
             </div>
          @endfor --}}
          @for ($week = 1; $week <= 8; $week++)
            <h3>WEEK {{ $week }}</h3>

            <div class="section">
                <p>Department: ...................................... Section: ............................................................</p>
                <p>Date (From): ...................................... To: ...............................................................</p>
            </div>

            <div class="section">
                <p>Brief Description of Tasks Undertaken in the week:</p>
                @for ($day = 1; $day <= 5; $day++)
                    @php
                        $dayNumber = ($week - 1) * 5 + $day;
                    @endphp
                    <p>Day {{ $day }}</p>
                    <div class="line">{{ $logs[$dayNumber] ?? 'No log entry' }}</div>
                @endfor
            </div>

            <div class="section">
                <h2>Weekly Comments by Host Supervisors</h2>
                <p>Supervisor's Name: <span class="line capitalize">{{ $employer->supervisorName }}</span></p>
                <p>Comments (If any): ..................................................................................................</p>
                <p><i>Signature:</i> <img class="line-img" src="{{ public_path('storage/' . $employer->supervisorSignature) }}" alt="Signature" width="100"> <i>Official Stamp:</i> <img class="line-img" src="{{ public_path('storage/' . $employer->Muhuri) }}" alt="Stamp" width="100"> Date.........................</p>
            </div>
        @endfor

      </div>
  </body>
  </html>
  
  
  