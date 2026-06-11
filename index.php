<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BenPoly CBT Platform - Exam Instructions</title>
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <style>
        /* --- Global Reset --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            
            /* Disable Text Selection Globally during exam */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Print Media Query: Hide everything if trying to print (Ctrl+P) */
        @media print {
            body { display: none !important; }
        }

        body {
            background-color: #e0e4e8;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* --- Instruction Overlay Specific Layout Styles --- */
        .instruction-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                              url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1600&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            z-index: 100;
            transition: opacity 0.4s ease, visibility 0.4s;
        }

        .instruction-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 80%; /* Slightly wider to easily read technical text */
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 30px 35px;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-box {
            width: 65px;
            height: 65px;
            background-color: skyblue;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 6px;
            box-shadow: 0 4px 10px rgba(43, 76, 126, 0.3);
            margin-bottom: 15px;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            fill: #ffffff;
        }

        .logo-text {
            color: #ffffff;
            font-size: 0.45rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-top: 2px;
            text-transform: uppercase;
        }

        .main-heading {
            color: #111111;
            font-size: 1.45rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sub-heading {
            color: #2b4c7e;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Structured Instructions List */
        .rules-container {
            width: 100%;
            background: #f8f9fa;
            border-left: 4px solid #2b4c7e;
            border-radius: 4px;
            padding: 18px 20px;
            margin-bottom: 25px;
            max-height: 280px;
            overflow-y: auto;
        }

        .rules-list {
            list-style-type: none;
        }

        .rules-list li {
            font-size: 0.9rem;
            color: #444;
            line-height: 1.5;
            margin-bottom: 12px;
            position: relative;
            padding-left: 20px;
        }

        .rules-list li::before {
            content: "•";
            color: #d32f2f;
            font-weight: bold;
            font-size: 1.2rem;
            position: absolute;
            left: 0;
            top: -2px;
        }

        .rules-list li strong {
            color: #111;
        }

        .start-btn {
            width: 100%;
            background-color: skyblue;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(43, 76, 126, 0.3);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .start-btn:hover {
            background-color: #1d3557;
        }

        .start-btn:active {
            transform: scale(0.99);
        }

        /* --- CBT Main App Specific Layout Styles --- */
        #main-app-content {
            display: none; 
            flex-direction: column;
            height: 100vh;
            width: 100%;
            background-color: #e0e4e8;
        }

        header {
            background-color: #2b4c7e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 10;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-placeholder {
            width: 50px;
            height: 50px;
            background-color: #f4c430; 
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #2b4c7e;
            font-size: 11px;
            text-align: center;
            border: 2px solid white;
            line-height: 1.2;
        }

        .title-container h1 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .title-container h2 {
            font-size: 1.1rem;
            font-weight: normal;
            opacity: 0.9;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            overflow: hidden;
            border: 2px solid white;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            font-size: 0.85rem;
            text-align: right;
        }

        .submit-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.85rem;
            gap: 3px;
            opacity: 0.9;
            transition: opacity 0.2s;
        }

        .submit-btn:hover {
            opacity: 1;
        }

        .submit-icon {
            font-size: 1.4rem;
        }

        .badge-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .course-badge {
            background-color: black;
            color: white;
            padding: 6px 24px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 1rem;
        }

        .main-container {
            display: flex;
            flex: 1;
            padding: 20px 40px;
            gap: 40px;
            align-items: flex-start;
            overflow: hidden;
        }

        .quiz-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 25px;
            height: 100%;
        }

        .question-box {
            background-color: white;
            border-radius: 15px;
            padding: 35px;
            width: 100%;
            min-height: 180px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            font-size: 1.1rem;
            color: #222;
            line-height: 1.5;
        }

        .options-box {
            padding-left: 15px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .option-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            color: #333;
            cursor: pointer;
            width: fit-content;
        }

        .option-label input[type="radio"] {
            transform: scale(1.2);
            cursor: pointer;
        }

        .sidebar {
            width: 260px;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2px;
            background-color: #bcbcbc;
        }

        .grid-btn {
            background-color: white;
            border: none;
            height: 38px;
            font-size: 0.9rem;
            color: #333;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.2s;
        }

        .grid-btn:hover {
            background-color: #f0f0f0;
        }

        .grid-btn.active {
            background-color: #c8e6c9; 
            font-weight: bold;
        }
        
        .grid-btn.answered {
            border: 2px solid #2b4c7e;
        }

        .footer-controls {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .timer-box {
            background-color: #d32f2f;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 12px 35px;
            border-radius: 10px;
            min-width: 130px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
        }

        .nav-btn {
            background-color: white;
            color: #222;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .nav-btn:hover {
            background-color: #f7f7f7;
        }

        .arrow {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .arrow-left {
            transform: rotate(180deg);
        }

        .results-dashboard {
            background-color: white;
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }

        .results-dashboard h2 {
            color: #2b4c7e;
            margin-bottom: 20px;
        }

        .score-display {
            font-size: 3.5rem;
            font-weight: bold;
            color: #2e7d32;
            margin: 20px 0;
        }

        .stats-details {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .termination-reason {
            color: #d32f2f;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="instruction-wrapper" id="instructionsOverlay">
        <div class="instruction-card">
            <div class="logo-box">
                <!-- <svg class="logo-icon" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5.18 11.3l6.82 3.72 6.82-3.72L12 15l-6.82-3.7z"/>
                </svg>
                <div class="logo-text">OAU CBT</div> -->
                <img src="logo.jpg" alt="logo" width="100%">
            </div>

            <h1 class="main-heading">Benue State Polytechnic Ugbokolo</h1>
            <p class="sub-heading">Course Assessment: GNS 101 (60 Questions)</p>

            <div class="rules-container">
                <ul class="rules-list">
                    <li><strong>Full-Screen Enforcement:</strong> Clicking start will trigger full-screen mode. Exiting full screen manually at any time will instantly log you out and terminate your test.</li>
                    <li><strong>Tab Tracking Restrictions:</strong> Do not open other tabs, windows, or applications. If the dashboard registers a loss of focus (Alt+Tab, background minimize, system updates), your workspace closes instantly.</li>
                    <li><strong>Input Interactions Intercepted:</strong> Right-clicking, selecting text, copying elements, pasting text strings, or printing configurations are hard-blocked by proctor settings.</li>
                    <li><strong>Automatic Evaluations:</strong> The test runs for exactly 49 minutes and 53 seconds. If your clock counts down to 00:00, answers clear into system databases via auto-submission.</li>
                    <li><strong>Network Logs:</strong> Any external activity anomalies logged by system trackers are subject to assessment invalidation. Please remain centered and attentive.</li>
                </ul>
            </div>

            <button type="button" class="start-btn" onclick="startSecureExam()">I Agree, Start Examination</button>
        </div>
    </div>

    <div id="main-app-content">
        <header>
            <div class="header-left">
                <div class="logo-placeholder">OAU<br>CBT</div>
                <div class="title-container">
                    <h1>Benue State Polytechnic Ugbokolo</h1>
                    <h2>Computer Based Test (CBT) Platform</h2>
                </div>
            </div>
            <div class="header-right">
                <div class="profile-container">
                    <div class="user-info">
                        <p style="font-weight: bold;" id="display-user-name">Welcome, Student</p>
                        <p style="opacity: 0.85;" id="display-user-role">CSC WORKSPACE</p>
                    </div>
                    <div class="avatar">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="User Profile">
                    </div>
                </div>
                <button class="submit-btn" id="header-submit-btn" onclick="submitExam()">
                    <span class="submit-icon">⎋</span>
                    <span>Submit</span>
                </button>
            </div>
        </header>

        <div class="badge-container">
            <div class="course-badge">CSC 201</div>
        </div>

        <div class="main-container" id="exam-workspace">
            <div class="quiz-area">
                <div class="question-box" id="question-text"></div>
                <div class="options-box" id="options-container"></div>
            </div>
            <div class="sidebar" id="navigation-grid"></div>
        </div>

        <div class="footer-controls" id="footer-nav-controls">
            <button class="nav-btn" id="prev-button" onclick="previousQuestion()">
                <span class="arrow arrow-left">➔</span>
                <span>PREV</span>
            </button>
            <div class="timer-box" id="countdown-timer">49:53</div>
            <button class="nav-btn" id="next-button" onclick="nextQuestion()">
                <span>NEXT</span>
                <span class="arrow">➔</span>
            </button>
        </div>
    </div>

    <script>
        // --- Questions Dataset Array ---
        const questionsDataset = [
            {
                text: "Which of the following is not a keyword?",
                options: { A: "eval", B: "assert", C: "nonlocal", D: "pass" },
                correctAnswer: "A",
                selected: null
            },
            {
                text: "What is the primary function of an operating system's kernel?",
                options: { A: "Database management", B: "Resource allocation and hardware abstraction", C: "Compiling code statements", D: "Web page rendering" },
                correctAnswer: "B",
                selected: null
            },
            {
                text: "Which data structure operates on a Last-In, First-Out (LIFO) basis?",
                options: { A: "Queue", B: "Array", C: "Stack", D: "Linked List" },
                correctAnswer: "C",
                selected: null
            },
            {
                text: "What is the time complexity of searching in a perfectly balanced Binary Search Tree (BST)?",
                options: { A: "O(1)", B: "O(n)", C: "O(n log n)", D: "O(log n)" },
                correctAnswer: "D",
                selected: null
            },
            {
                text: "Which protocol is primarily used to securely transfer files over a network connection?",
                options: { A: "HTTP", B: "SFTP", C: "SMTP", D: "IMAP" },
                correctAnswer: "B",
                selected: null
            }
        ];

        for (let i = 6; i <= 60; i++) {
            const keys = ["A", "B", "C", "D"];
            const randomKey = keys[(i % 4)];
            questionsDataset.push({
                text: `This is a sample examination text question block for Computer Science Question ${i}.`,
                options: { 
                    A: `Sample Answer Variant A for item ${i}`, 
                    B: `Sample Answer Variant B for item ${i}`, 
                    C: `Sample Answer Variant C for item ${i}`, 
                    D: `Sample Answer Variant D for item ${i}` 
                },
                correctAnswer: randomKey,
                selected: null
            });
        }

        // --- Application Tracking Properties ---
        let currentQuestionIndex = 0; 
        const totalQuestionsCount = questionsDataset.length;
        let totalSeconds = (49 * 60) + 53;
        let timerInterval = null;
        let isExamActive = false;

        // --- Handling Instructions Screen Layout Transition ---
        function startSecureExam() {
            // Request Fullscreen Mode immediately via User Action Interaction
            activateFullscreen();

            document.getElementById('instructionsOverlay').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('instructionsOverlay').style.display = 'none';
                document.getElementById('main-app-content').style.display = 'flex';
                
                buildNavigationGrid();
                loadQuestion(0);
                startTimerEngine();
                
                // Arm security protocols
                isExamActive = true;
                activateLockdownProtocols();
            }, 400);
        }

        // --- Fullscreen API Handler ---
        function activateFullscreen() {
            const element = document.documentElement;
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.webkitRequestFullscreen) { /* Safari */
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { /* IE11 */
                element.msRequestFullscreen();
            }
        }

        // --- CRITICAL SECURITY LOCKDOWN CONTROLS ---
        function activateLockdownProtocols() {
            // 1. Prevent Right Click Menu
            document.addEventListener('contextmenu', event => event.preventDefault());

            // 2. Prevent Copying
            document.addEventListener('copy', event => {
                event.preventDefault();
                alert("Security Violation: Copy operations are restricted.");
            });

            // 3. Prevent Pasting
            document.addEventListener('paste', event => {
                event.preventDefault();
                alert("Security Violation: Paste operations are restricted.");
            });

            // 4. Block Command Keys (Ctrl+P, Ctrl+S)
            document.addEventListener('keydown', event => {
                if ((event.ctrlKey || event.metaKey) && event.key === 'p') {
                    event.preventDefault();
                    alert("Printing restricted.");
                }
                if ((event.ctrlKey || event.metaKey) && event.key === 's') {
                    event.preventDefault();
                }
                if (event.key === 'PrintScreen') {
                    navigator.clipboard.writeText(""); 
                    alert("Screenshots are logged.");
                }
            });

            // 5. Track Tab Leaving / Minimizing
            document.addEventListener('visibilitychange', () => {
                if (document.hidden && isExamActive) {
                    terminateExamDueToViolation("Tab switched / User left exam window context.");
                }
            });

            // 6. Track Alt+Tab / Loss of Window Focus
            window.addEventListener('blur', () => {
                if (isExamActive) {
                    terminateExamDueToViolation("Window focus lost (Alt+Tab / App Switch detected).");
                }
            });

            // 7. Auto-detect exiting Fullscreen and flag as violation
            document.addEventListener('fullscreenchange', () => {
                if (!document.fullscreenElement && isExamActive) {
                    terminateExamDueToViolation("Exited secure fullscreen testing layout.");
                }
            });
        }

        // --- Immediate Forced Termination Routine ---
        function terminateExamDueToViolation(reason) {
            isExamActive = false;
            if (timerInterval) clearInterval(timerInterval);
            calculateAndShowScore(true, reason);
        }

        // --- Countdown Timer Engine ---
        function startTimerEngine() {
            const timerElement = document.getElementById('countdown-timer');
            timerInterval = setInterval(() => {
                if (totalSeconds <= 0) {
                    clearInterval(timerInterval);
                    timerElement.textContent = "00:00";
                    isExamActive = false;
                    calculateAndShowScore(false);
                    alert("Time is up! Your test has been submitted automatically.");
                    return;
                }
                totalSeconds--;
                let minutes = Math.floor(totalSeconds / 60);
                let seconds = totalSeconds % 60;
                timerElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }, 1000);
        }

        // --- Navigation Map Construction ---
        const gridContainer = document.getElementById('navigation-grid');
        function buildNavigationGrid() {
            gridContainer.innerHTML = '';
            for (let i = 0; i < totalQuestionsCount; i++) {
                const button = document.createElement('button');
                button.className = 'grid-btn';
                button.id = `grid-btn-${i}`;
                button.textContent = i + 1; 
                if (i === currentQuestionIndex) {
                    button.classList.add('active');
                }
                button.onclick = () => loadQuestion(i);
                gridContainer.appendChild(button);
            }
        }

        // --- Load Selected Active Question ---
        function loadQuestion(arrayIndex) {
            currentQuestionIndex = arrayIndex;
            
            document.querySelectorAll('.grid-btn').forEach((btn, idx) => {
                if (idx === arrayIndex) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            const targetQuestion = questionsDataset[arrayIndex];
            document.getElementById('question-text').textContent = `${arrayIndex + 1}. ${targetQuestion.text}`;

            const optionsContainer = document.getElementById('options-container');
            optionsContainer.innerHTML = '';

            Object.entries(targetQuestion.options).forEach(([key, value]) => {
                const label = document.createElement('label');
                label.className = 'option-label';

                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'quiz-option';
                radio.value = key;
                
                if (targetQuestion.selected === key) {
                    radio.checked = true;
                }

                radio.onchange = () => {
                    if(isExamActive) {
                        questionsDataset[arrayIndex].selected = key;
                        document.getElementById(`grid-btn-${arrayIndex}`).classList.add('answered');
                    }
                };

                label.appendChild(radio);
                label.appendChild(document.createTextNode(`(${key}) ${value}`));
                optionsContainer.appendChild(label);
            });

            const prevBtn = document.getElementById('prev-button');
            const nextBtn = document.getElementById('next-button');

            prevBtn.style.visibility = (arrayIndex === 0) ? 'hidden' : 'visible';
            nextBtn.style.visibility = (arrayIndex === totalQuestionsCount - 1) ? 'hidden' : 'visible';
        }

        function nextQuestion() {
            if (currentQuestionIndex < totalQuestionsCount - 1) {
                loadQuestion(currentQuestionIndex + 1);
            }
        }

        function previousQuestion() {
            if (currentQuestionIndex > 0) {
                loadQuestion(currentQuestionIndex - 1);
            }
        }

        // --- Processing Results Dashboard Page ---
        function calculateAndShowScore(wasViolated = false, violationReason = "") {
            isExamActive = false;
            if (timerInterval) clearInterval(timerInterval);
            
            let finalScore = 0;
            let answeredCount = 0;

            questionsDataset.forEach(q => {
                if (q.selected !== null) answeredCount++;
                if (q.selected === q.correctAnswer) {
                    finalScore++;
                }
            });

            const percentage = ((finalScore / totalQuestionsCount) * 100).toFixed(1);

            document.getElementById('exam-workspace').style.display = 'none';
            document.getElementById('footer-nav-controls').style.display = 'none';
            document.getElementById('header-submit-btn').style.display = 'none';

            const resultDashboard = document.createElement('div');
            resultDashboard.className = 'results-dashboard';
            
            if (wasViolated) {
                resultDashboard.innerHTML = `
                    <h2 style="color:#d32f2f;">EXAM TERMINATED</h2>
                    <p class="termination-reason">Violation Tracker: ${violationReason}</p>
                    <p>Due to safety policy protocols, your answers have been auto-submitted.</p>
                    <div class="score-display" style="color:#d32f2f;">${percentage}%</div>
                    <div class="stats-details">
                        <p><strong>Total Questions:</strong> ${totalQuestionsCount}</p>
                        <p><strong>Correct Answers Calculated:</strong> ${finalScore}</p>
                    </div>
                `;
            } else {
                resultDashboard.innerHTML = `
                    <h2>Examination Completed</h2>
                    <p>Your session answers have been evaluated successfully.</p>
                    <div class="score-display">${percentage}%</div>
                    <div class="stats-details">
                        <p><strong>Total Questions:</strong> ${totalQuestionsCount}</p>
                        <p><strong>Questions Attempted:</strong> ${answeredCount}</p>
                        <p><strong>Correct Answers:</strong> ${finalScore}</p>
                    </div>
                `;
            }

            resultDashboard.innerHTML += `<p style="color: #666; font-size: 0.9rem;">Benue State Polytechnic Ugbokolo CBT Secure Portal</p>`;
            document.getElementById('main-app-content').appendChild(resultDashboard);
            
            if (document.fullscreenElement) {
                document.exitFullscreen().catch(err => console.log(err));
            }
        }

        function submitExam() {
            const confirmation = confirm("Are you sure you want to finalize and submit your CBT exam?");
            if (confirmation) {
                calculateAndShowScore(false);
            }
        }
    </script>
</body>
</html>