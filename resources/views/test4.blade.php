<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }

        .section {
            display: flex;
            flex-direction: column;
            border: 1px solid #000;
            overflow: auto;
        }

        .section1 {
            background-color: #e0e0e0;
            flex: 3;
        }

        .section2 {
            background-color: #c0c0c0;
            flex: 2;
        }
    </style>
</head>
<body>
    <div class="section section1">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum erat nec enim eleifend, vel accumsan ligula bibendum.</p>
    </div>
    <div class="section section2">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum erat nec enim eleifend, vel accumsan ligula bibendum.</p>
    </div>
</body>
</html>
