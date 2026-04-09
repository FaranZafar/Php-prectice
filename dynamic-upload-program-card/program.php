<!DOCTYPE html>
<html>
<head>
    <title>Our Programs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; padding-top: 50px; }
        /* Ensures cards have a uniform look and feel */
        .card { 
            border-radius: 15px; 
            border: none; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-5 text-center font-weight-bold">Academic Programs</h2>
        <div class="row">
            <?php
            $file = 'data.json';
            if (file_exists($file)) {
                $programs = json_decode(file_get_contents($file), true);
                foreach ($programs as $p) {
                    echo "
                    <div class='col-md-4 mb-4 d-flex align-items-stretch'>
                        <div class='card h-100 w-100'>
                            <div class='card-body d-flex flex-column'>
                                <div>
                                    <span class='badge badge-light text-warning mb-2' style='background-color: #fff3e0; padding: 8px 12px;'>{$p['duration']}</span>
                                    <h4 class='card-title font-weight-bold'>{$p['title']}</h4>
                                    <p class='card-text text-muted'>{$p['description']}</p>
                                </div>
                                <button class='btn btn-outline-primary btn-block mt-auto' style='border-radius: 20px;'>View Curriculum</button>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='col-12 text-center'>No programs added yet.</p>";
            }
            ?>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Admin Dashboard</a>
        </div>
    </div>
</body>
</html>