{{-- <!DOCTYPE html>
<html>
<head>
    <title>Log Book Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .cover-page {
            text-align: center;
            margin-top: 100px;
        }
        .cover-page img {
            width: 200px;
            height: auto;
        }
        .section-title {
            font-size: 20px;
            margin: 20px 0 10px;
        }
        .log-entry {
            margin-bottom: 20px;
        }
        .signature-stamp {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="cover-page">
        <img src="{{ public_path('storage/' . $student->image) }}" alt="Student Image">
        <h1>Log Book Report</h1>
        <h2>Student: {{ $student->studentName }}</h2>
        <h2>Employer: {{ $employer->companyName }}</h2>
    </div>

    @for ($week = 1; $week <= 8; $week++)
        <div class="section">
            <h2 class="section-title">Week {{ $week }}</h2>
            @for ($day = 1; $day <= 5; $day++)
                <div class="log-entry">
                    <h3>Day {{ $day }}</h3>
                    <p>{{ $logBooks->firstWhere('week', $week)->{'day_' . (($week - 1) * 5 + $day)} }}</p>
                    <div class="signature-stamp">
                        <img src="{{ public_path('storage/' . $employer->supervisorSignature) }}" alt="Signature" width="100">
                        <img src="{{ public_path('storage/' . $employer->Muhuri) }}" alt="Stamp" width="100">
                    </div>
                </div>
            @endfor
        </div>
    @endfor
</body>
</html>
 --}}

 <!DOCTYPE html>
 <html>
 <head>
     <title>Log Book Report</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             margin: 0;
             padding: 0;
         }
         .cover-page {
             text-align: center;
             margin-top: 100px;
         }
         .cover-page img {
             width: 200px;
             height: auto;
         }
         .section-title {
             font-size: 20px;
             margin: 20px 0 10px;
         }
         .log-entry {
             margin-bottom: 20px;
         }
         .signature-stamp {
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-top: 20px;
         }
     </style>
 </head>
 <body>
     <div class="cover-page">
         <img src="{{ public_path('storage/' . $student->image) }}" alt="Student Image">
         <h1>Log Book Report</h1>
         <h2>Student: {{ $student->studentName }}</h2>
         <h2>Employer: {{ $employer->companyName }}</h2>
     </div>
 
     @for ($week = 1; $week <= 8; $week++)
         <div class="section">
             <h2 class="section-title">Week {{ $week }}</h2>
             @for ($day = 1; $day <= 5; $day++)
                 @php
                     $dayNumber = ($week - 1) * 5 + $day;
                 @endphp
                 <div class="log-entry">
                     <h3>Day {{ $day }}</h3>
                     <p>{{ $logs[$dayNumber] ?? 'No log entry' }}</p>
                     <div class="signature-stamp">
                         <img src="{{ public_path('storage/' . $employer->supervisorSignature) }}" alt="Signature" width="100">
                         <img src="{{ public_path('storage/' . $employer->Muhuri) }}" alt="Stamp" width="100">
                     </div>
                 </div>
             @endfor
         </div>
     @endfor
 </body>
 </html>
 