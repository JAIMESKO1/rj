<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 500 - Erreur Serveur</title>
    <style>
        :root {
            --hue: 225;
            --bg: hsl(var(--hue), 10%, 90%);
            --fg: hsl(var(--hue), 10%, 10%);
            --primary: hsl(var(--hue), 90%, 45%);
            --trans-dur: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--bg);
            color: var(--fg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        .container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            transform-style: preserve-3d;
        }

        .error-code {
            font-size: 8rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        .error-code span {
            display: inline-block;
            transition: transform 0.3s, color 0.3s;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards 0.5s;
        }

        .error-message {
            font-size: 1.1rem;
            color: hsl(var(--hue), 10%, 30%);
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards 0.7s;
        }

        .button {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards 0.9s;
            position: relative;
            overflow: hidden;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .button:active::after {
            width: 300px;
            height: 300px;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .server {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem;
            position: relative;
            transform-style: preserve-3d;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: hsl(var(--hue), 10%, 10%);
                --fg: hsl(var(--hue), 10%, 90%);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="server">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"/>
                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"/>
                <line x1="6" y1="6" x2="6" y2="6"/>
                <line x1="6" y1="18" x2="6" y2="18"/>
            </svg>
        </div>
        <div class="error-code">
            <span>5</span>
            <span>0</span>
            <span>0</span>
        </div>
        <h1 class="error-title">Erreur Serveur Interne</h1>
        <p class="error-message">Oups ! Notre serveur rencontre quelques difficultés. Nos équipes techniques travaillent à résoudre le problème.</p>
        <a href="/" class="button">Retour à l'accueil</a>
    </div>

    <script>
        // Animation des chiffres
        const errorCode = document.querySelectorAll('.error-code span');
        errorCode.forEach((digit, index) => {
            digit.style.animationDelay = `${index * 0.1}s`;
            digit.addEventListener('mouseover', () => {
                digit.style.transform = 'scale(1.2) rotate(10deg)';
                digit.style.color = `hsl(${Math.random() * 360}, 80%, 60%)`;
            });
            digit.addEventListener('mouseout', () => {
                digit.style.transform = 'scale(1) rotate(0)';
                digit.style.color = '';
            });
        });

        // Effet de parallaxe
        document.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;
            const moveX = (clientX - centerX) / 50;
            const moveY = (clientY - centerY) / 50;

            document.querySelector('.container').style.transform = 
                `rotateX(${-moveY}deg) rotateY(${moveX}deg)`;
        });

        // Animation du serveur
        const server = document.querySelector('.server');
        server.addEventListener('click', () => {
            server.style.animation = 'none';
            server.offsetHeight; // Force reflow
            server.style.animation = 'float 6s ease-in-out infinite';
        });

        // Effet de vague sur le bouton
        document.querySelector('.button').addEventListener('mouseenter', function(e) {
            this.style.transform = 'translateY(-2px)';
        });
    </script>
</body>
</html>