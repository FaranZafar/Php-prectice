<?php
 include_once("dbconnection.php");

 // Fetch all staff members ordered by their role
 $query = "SELECT * FROM staff ORDER BY UserRole ASC";
 $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; }
        .role-header { 
            border-left: 5px solid #007bff; 
            padding-left: 15px; 
            margin: 30px 0 20px; 
            color: #333;
            font-weight: 700;
        }
        .staff-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .staff-card:hover { transform: translateY(-3px); box-shadow: 0 8px 16px rgba(0,0,0,0.1); }
        .role-badge { font-size: 0.8rem; background: #e9ecef; color: #495057; }
    </style>
</head>
<body>

<div class="container py-5">
    <h1 class="text-center mb-5">University Staff Directory</h1>

    <?php 
    $current_role = ""; // Variable to track the role group
    
    if(mysqli_num_rows($result) > 0):
        while($row = mysqli_fetch_assoc($result)): 
            
            // Check if we have moved to a new role group
            if($current_role != $row['UserRole']): 
                // If this isn't the first group, close the previous row
                if($current_role != "") echo '</div>'; 
                
                $current_role = $row['UserRole'];
                ?>
                <h3 class="role-header"><?php echo htmlspecialchars($current_role); ?>s</h3>
                <div class="row">
            <?php endif; ?>

           <div class="col-md-4 mb-4">
    <div class="card staff-card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 1.2rem;">
                    <?php echo strtoupper(substr($row['FirstName'], 0, 1)); ?>
                </div>
                <div class="ml-3">
                    <h5 class="card-title mb-0">
                        <?php echo htmlspecialchars($row['FirstName'] . " " . $row['LastName']); ?>
                    </h5>
                    <span class="badge role-badge"><?php echo htmlspecialchars($row['UserRole']); ?></span>
                </div>
            </div>
            <p class="card-text text-muted small">
                <strong>Email:</strong> <?php echo htmlspecialchars($row['Email'] ?? $row['email'] ?? 'No Email'); ?><br>
                <strong>Phone:</strong> <?php echo htmlspecialchars($row['PhoneNo'] ?? 'N/A'); ?>
            </p>
            <a href="view_profile.php?id=<?php echo $row['StaffID']; ?>" class="btn btn-sm btn-outline-primary btn-block">View Profile</a>
        </div>
    </div>
</div>

        <?php endwhile; ?>
        </div> <?php else: ?>
        <div class="alert alert-info">No staff records found in the database.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>