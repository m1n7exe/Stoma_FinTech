<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sustainability & Lifestyle Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #2a9d8f;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 2rem;
            color: #2a9d8f;
            margin-bottom: 10px;
            border-bottom: 2px solid #2a9d8f;
            padding-bottom: 10px;
        }

        .section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .values {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .value-card {
            background-color: #f9f9f9;
            padding: 20px;
            flex: 1;
            min-width: 220px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .value-card h3 {
            color: #2a9d8f;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .value-card p {
            font-size: 1rem;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2a9d8f;
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <header>About Us</header>

    <div class="container">

        <!-- Company Mission -->
        <div class="section">
            <h2>Our Mission</h2>
            <p>
                Our mission is to empower individuals to live more sustainable and mindful lifestyles. We aim to provide tools and insights that help people track their financial habits while promoting environmentally conscious decisions.
            </p>
        </div>

        <!-- Company Values -->
        <div class="section">
            <h2>Our Values</h2>
            <div class="values">
                <div class="value-card">
                    <h3>Sustainability</h3>
                    <p>We believe in building a greener, more sustainable future for everyone.</p>
                </div>
                <div class="value-card">
                    <h3>Innovation</h3>
                    <p>We leverage cutting-edge technology to deliver the best solutions.</p>
                </div>
                <div class="value-card">
                    <h3>Transparency</h3>
                    <p>We foster trust through clear, open communication and accountability.</p>
                </div>
                <div class="value-card">
                    <h3>Empowerment</h3>
                    <p>We empower individuals to take control of their financial and environmental impact.</p>
                </div>
            </div>
        </div>

        <!-- Company Services -->
        <div class="section">
            <h2>Our Services</h2>
            <p>
                Our platform provides a comprehensive suite of tools to help users track their financial decisions and their impact on the environment. With features like real-time expense tracking, goal setting, sustainability charts, and reward systems, we make it easy to stay on top of your financial health and sustainable choices.
            </p>
        </div>

    </div>

    <footer>
        &copy; 2024 Sustainability & Lifestyle Tracker. All Rights Reserved.
    </footer>

</body>
</html>
