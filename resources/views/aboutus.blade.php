<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
    
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    
        header {
            text-align: center;
            margin-bottom: 20px;
        }
    
        header h1 {
            font-size: 2.5em;
            color: #333;
        }
    
        .about-section, .team-section {
            margin-bottom: 20px;
        }
    
        .about-section h2, .team-section h2 {
            font-size: 2em;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
    
        .about-section p, .team-section p {
            font-size: 1.2em;
            color: #666;
            line-height: 1.6;
        }
    
        .team-section {
            display: flex;
            justify-content: space-around;
        }
    
        .team-member {
            text-align: center;
            width: 45%;
        }
    
        .team-member img {
            width: 100%;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    
        .team-member h3 {
            font-size: 1.5em;
            color: #333;
        }
    
        .team-member p {
            font-size: 1.2em;
            color: #777;
        }
    
        .missionbutton {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #333;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    
        .missionbutton:hover {
            background-color: #555;
        }
    </style>
    <div class="container">
        <header>
            <h1>About Us</h1>
        </header>
        <section class="about-section">
            <h2>Our Mission</h2>
            <p id="mission">Welcome to the best booking services for our clients. Our mission is to simplify the process of planning and organizing events, making it effortless for you to create memorable experiences. Whether you're arranging a corporate conference, a wedding, a concert, or a private party, we offer a user-friendly platform that connects you with the best venues, vendors, and services. Our dedicated team is committed to providing exceptional customer service and innovative solutions to meet your unique needs. We provide you with the best venues so you can focus on enjoying your event while we take care of the details.</p>
        </section>
        <section class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-member">
                <img src="member1.jpg" alt="Team Member 1">
                <h3>Kok Yee</h3>
                <p>Project Manager</p>
            </div>            
            <div class="team-member">
                <img src="member2.jpg" alt="Team Member 2">
                <h3>Mohammed Kamal</h3>
                <p>Senior Programmer</p>
            </div>
            <div class="team-member">
                <img src="member2.jpg" alt="Team Member 2">
                <h3>Roneel Kumar</h3>
                <p>Sales and Marketing Manager </p>
            </div>        
                <div class="team-member">
                <img src="member2.jpg" alt="Team Member 2">
                <h3>Tanveer Singh</h3>
                <p>Junior Programmer/Designer</p>
            </div>
        </section>
        <button class="missionbutton" id="toggleMission">The best booking services for our clients</button>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const toggleButton = document.getElementById('toggleMission');
        const missionParagraph = document.getElementById('mission');

        toggleButton.addEventListener('click', () => {
            if (missionParagraph.style.display === 'none' || missionParagraph.style.display === '') {
                missionParagraph.style.display = 'block';
            } else {
                missionParagraph.style.display = 'none';
            }
        });
    });
</script>