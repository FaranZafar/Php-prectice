<?php
$file = 'data.json';
$programs = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($programs[$id]);
    file_put_contents($file, json_encode(array_values($programs)));
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_program = [
        "title" => htmlspecialchars($_POST['title']),
        "duration" => htmlspecialchars($_POST['duration']),
        "description" => htmlspecialchars($_POST['description'])
    ];
    if (isset($_POST['id']) && $_POST['id'] !== "") {
        $programs[$_POST['id']] = $new_program;
    } else {
        $programs[] = $new_program;
    }
    file_put_contents($file, json_encode($programs));
    header("Location: index.php");
    exit();
}

$edit_id = isset($_GET['edit']) ? $_GET['edit'] : null;
$edit_data = ($edit_id !== null) ? $programs[$edit_id] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Programs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h3><?php echo $edit_data ? "Edit Program" : "Create New Program"; ?></h3>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo $edit_data['duration'] ?? ''; ?>" placeholder="e.g. 4 Years | 8 Semesters" required>
                    </div>
                    <div class="form-group">
                        <label>Program Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $edit_data['title'] ?? ''; ?>" placeholder="e.g. BS Computer Science" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" required><?php echo $edit_data['description'] ?? ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save to program.php</button>
                    <?php if($edit_data): ?>
                        <a href="index.php" class="btn btn-link btn-block text-danger">Cancel Edit</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-sm p-4">
                <h3>Existing List</h3>
                <div class="list-group">
                    <?php foreach ($programs as $id => $p): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo $p['title']; ?></strong>
                        </div>
                        <div>
                            <a href="index.php?edit=<?php echo $id; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="index.php?delete=<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this program?')">Delete</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <a href="program.php" class="btn btn-primary btn-block">View Live Website</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>