<?php 
include_once("dbconnection.php"); 

// --- 1. HANDLE DELETE ACTION ---
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Optional: Get the filename first to delete it from the folder
    $res = $conn->query("SELECT staff_img FROM leadership_staff WHERE id = $id");
    $row = $res->fetch_assoc();
    if($row['staff_img'] != 'default.jpg') {
        @unlink("uploads/" . $row['staff_img']); // Deletes file from folder
    }
    
    $conn->query("DELETE FROM leadership_staff WHERE id = $id");
    header("Location: index.php?msg=Deleted");
}

// --- 2. HANDLE EDIT FETCH ---
$edit_data = null;
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM leadership_staff WHERE id = $id");
    $edit_data = $res->fetch_assoc();
}

// --- 3. HANDLE INSERT / UPDATE ---
if(isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $role  = mysqli_real_escape_string($conn, $_POST['role']);
    $id    = $_POST['staff_id'];
    
    $img = $_FILES['image']['name'];
    
    if(!empty($img)) {
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$img);
        $img_sql = ", staff_img = '$img'";
    } else {
        $img_sql = "";
    }

    if(!empty($id)) {
        // UPDATE EXISTING
        $sql = "UPDATE leadership_staff SET first_name='$fname', last_name='$lname', user_role='$role' $img_sql WHERE id=$id";
    } else {
        // INSERT NEW
        $final_img = !empty($img) ? $img : 'default.jpg';
        $sql = "INSERT INTO leadership_staff (first_name, last_name, user_role, staff_img) VALUES ('$fname', '$lname', '$role', '$final_img')";
    }

    if($conn->query($sql)) {
        header("Location: index.php?msg=Success");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Leadership</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .thumb-img { width: 50px; height: 50px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-4"><?php echo $edit_data ? 'Edit' : 'Add'; ?> Leadership</h4>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="staff_id" value="<?php echo $edit_data['id'] ?? ''; ?>">
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $edit_data['first_name'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $edit_data['last_name'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="role" class="form-control" value="<?php echo $edit_data['user_role'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                        <?php if($edit_data): ?>
                            <small class="text-muted">Leave blank to keep current photo</small>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                        <?php echo $edit_data ? 'Update Member' : 'Add Member'; ?>
                    </button>
                    <?php if($edit_data): ?>
                        <a href="index.php" class="btn btn-link btn-block">Cancel Edit</a>
                    <?php endif; ?>
                </form>
            </div>
            <a href="leadership.php" class="btn btn-outline-info btn-block mt-3">View Public Page</a>
        </div>

        <div class="col-md-8">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-4">Current Staff List</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Img</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list = $conn->query("SELECT * FROM leadership_staff ORDER BY id DESC");
                        while($row = $list->fetch_assoc()):
                        ?>
                        <tr>
                            <td><img src="uploads/<?php echo $row['staff_img']; ?>" class="thumb-img"></td>
                            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                            <td><span class="badge badge-secondary"><?php echo $row['user_role']; ?></span></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="index.php?delete=<?php echo $row['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Delete this record?')">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>