<?php

use function PHPSTORM_META\type;

require_once('../model/func.php');

class admin
{
    private static $instance = null;
    private $func;

    private function __construct()
    {
        $this->func = Func::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new admin();
        }
        return self::$instance;
    }

    public function login($data)
    {
        session_start();
        $email = $this->func->escapeString($data['email']);
        $pswd = ($data['pswd']);

        // Check if the email exists
        $checkEmailQuery = "SELECT email, password FROM admins WHERE email=$email";
        $result = $this->func->selectQuery($checkEmailQuery);

        if ($result && count($result) > 0) {
            // Email exists, now check the password
            $storedPassword = $result[0]['password'];
            if ($storedPassword === $pswd) {
                $_SESSION['email'] = $email;
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
            }
        } else {
            // Check if any user has the given password to provide a more specific error message
            $checkPasswordQuery = "SELECT email FROM admins WHERE password='$pswd'";
            $passwordResult = $this->func->selectQuery($checkPasswordQuery);

            if ($passwordResult && count($passwordResult) > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email and password']);
            }
        }
        exit; // Ensure no additional output
    }

    public function fetchAllProfile()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT u.id, u.name, u.email, u.phone, u.created_at, u.updated_at,
                         p.gender,p.profile_picture
                  FROM users u
                  JOIN user_profiles p ON u.id = p.user_id";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }

    public function fetchRecentProfile()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT u.id, u.name, u.email, u.phone, u.created_at, u.updated_at,
       p.gender, p.profile_picture
FROM users u
JOIN user_profiles p ON u.id = p.user_id
WHERE u.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
ORDER BY u.created_at DESC;
";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }

    public function fetchServices()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT id,title,link,description,created_at,updated_at FROM quick_access";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }
    public function fetchReview()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT id,review_text,name,location,image_name,user_id FROM reviews";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }
    public function fetchRecentCouples()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT id,image,name,location,link FROM couples";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }
    public function fetchPhotoGalary()
    {
        // SQL query to fetch all accounts and their profile information
        $query = "SELECT id,image_name,category,description FROM gallery_images";

        $result = $this->func->selectQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found.']);
        }
    }
    public function addNewUser($data)
    {
        if (!isset($data['email']) || !isset($data['name']) || !isset($data['phone']) || !isset($data['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        // Extract data from $data array and escape it
        $email = $this->func->escapeString($data['email']);
        $name = $this->func->escapeString($data['name']);
        $phone = $this->func->escapeString($data['phone']);
        $password = $this->func->escapeString(md5($data['password']));


        // Check if email or phone number already exists
        $emailCheckQuery = "SELECT * FROM users WHERE email = $email";
        $phoneCheckQuery = "SELECT * FROM users WHERE phone = $phone";

        if ($this->func->selectQuery($emailCheckQuery)) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
            return;
        }

        if ($this->func->selectQuery($phoneCheckQuery)) {
            echo json_encode(['status' => 'error', 'message' => 'Phone number already exists']);
            return;
        }

        // Insert into users table
        $userQuery = "INSERT INTO users (name, email, phone, password) VALUES ($name, $email, $phone,$password)";
        $userResult = $this->func->executeQuery($userQuery);

        if ($userResult) {
            // Get the last inserted user ID        
            echo json_encode(['status' => 'success', 'message' => 'User added successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add user profile.']);
        }
    }

    public function deleteUsers($data)
    {
        // SQL query to fetch all accounts and their profile information
        if (!isset($data['id']) ) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        $id=$data['id'];

        $query = "DELETE FROM users WHERE id = {$id}";

        $result = $this->func->executeQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'deletion failed']);
        }
    }
    public function deleteSevices($data)
    {
        // SQL query to fetch all accounts and their profile information
        if (!isset($data['id']) ) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        $id=$data['id'];

        $query = "DELETE FROM quick_access WHERE id = {$id}";

        $result = $this->func->executeQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'deletion failed']);
        }
    }
    public function deleteReviews($data)
    {
        // SQL query to fetch all accounts and their profile information
        if (!isset($data['id']) ) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        $id=$data['id'];

        $query = "DELETE FROM reviews WHERE id = {$id}";

        $result = $this->func->executeQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'deletion failed']);
        }
    }
    public function deleteRecentCouple($data)
    {
        // SQL query to fetch all accounts and their profile information
        if (!isset($data['id']) ) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        $id=$data['id'];

        $query = "DELETE FROM couples WHERE id = {$id}";

        $result = $this->func->executeQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'deletion failed']);
        }
    }
    public function deleteGalleryPhoto($data)
    {
        // SQL query to fetch all accounts and their profile information
        if (!isset($data['id']) ) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            return;
        }
        $id=$data['id'];

        $query = "DELETE FROM gallery_images WHERE id = {$id}";

        $result = $this->func->executeQuery($query);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success'
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'deletion failed']);
        }
    }
    public function addReview()
    {
        // Check if POST data is set
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
        $reviewer_name = isset($_POST['reviewer_name']) ? $_POST['reviewer_name'] : null;
        $reviewer_city = isset($_POST['reviewer_city']) ? $_POST['reviewer_city'] : null;
        $review_text = isset($_POST['review_text']) ? $_POST['review_text'] : null;
    
        // Handle file upload
        $image_name = null;
        if (isset($_FILES['image_name']) && $_FILES['image_name']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image_name']['tmp_name'];
            $fileName = $_FILES['image_name']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
    
            // Define the upload directory and file path
            $uploadDir = __DIR__ . '/../../assets/images/user/'; // Absolute path
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;
    
            // Make sure the directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
            }
    
            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $image_name = $newFileName;
            } else {
                $image_name = null;
            }
        }
    
        // Escape values to prevent SQL injection
        $user_id = ($user_id);
        $reviewer_name = $this->func->escapeString($reviewer_name);
        $reviewer_city = $this->func->escapeString($reviewer_city);
        $review_text = $this->func->escapeString($review_text);
        $image_name = $this->func->escapeString($image_name);
    
        // Prepare SQL statement to insert data
        $query = "INSERT INTO reviews (user_id, image_name, review_text, name, location) 
                  VALUES ($user_id, $image_name, $review_text, $reviewer_name, $reviewer_city)";
        $result = $this->func->executeQuery($query);
    
        // Execute the query
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            // Print SQL error for debugging
            echo json_encode(['status' => 'error', 'message' => 'Failed to insert review']);
        }
    }
    

    public function addCouple()
    {
        // Collect POST data
        $couples_name = isset($_POST['couples_name']) ? $_POST['couples_name'] : null;
        $couples_city = isset($_POST['couples_city']) ? $_POST['couples_city'] : null;
        $page_link = isset($_POST['page_link']) ? $_POST['page_link'] : null;
        
        // Handle file upload
        $image_name = null;
        if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gallery_image']['tmp_name'];
            $fileName = $_FILES['gallery_image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
    
            // Define the upload directory and file path
            $uploadDir = __DIR__ . '/../../assets/images/couples/'; // Absolute path
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;
    
            // Make sure the directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
            }
    
            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $image_name = $newFileName;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
                return;
            }
        }
    
        // Escape values to prevent SQL injection
        $couples_name = $this->func->escapeString($couples_name);
        $couples_city = $this->func->escapeString($couples_city);
        $page_link = $this->func->escapeString($page_link);
        $image_name = $this->func->escapeString($image_name);
    
        // Prepare SQL statement to insert data
        $query = "INSERT INTO couples (name, location, image, link) 
                  VALUES ($couples_name, $couples_city, $image_name, $page_link)";
        $result = $this->func->executeQuery($query);
    
        // Execute the query
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            // Print SQL error for debugging
            echo json_encode(['status' => 'error', 'message' => 'Failed to insert couple']);
        }
    }
    
    public function addGalleryPhoto()
{
    $couples_name = isset($_POST['couples_name']) ? $_POST['couples_name'] : null;
    $couples_city = isset($_POST['couples_city']) ? $_POST['couples_city'] : null;
    $image_name = null;

    if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['gallery_image']['tmp_name'];
        $fileName = $_FILES['gallery_image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Define the upload directory and file path
        $uploadDir = __DIR__ . '/../../assets/images/gallery/';
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $destPath = $uploadDir . $newFileName;

        // Make sure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Move the file to the upload directory
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $image_name = $newFileName;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
            exit;
        }
    }

    $couples_name = $this->func->escapeString($couples_name);
    $couples_city = $this->func->escapeString($couples_city);
    $image_name = $this->func->escapeString($image_name);

    $query = "INSERT INTO gallery_images (category, description, image_name) VALUES ($couples_name, $couples_city, $image_name)";
    $result = $this->func->executeQuery($query);

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert gallery photo']);
    }
}

public function updateService()
{
    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $sub_title = $_POST['sub_title'];
    $link = $_POST['link'];

    // Escape input to prevent SQL injection
    $service_name = $this->func->escapeString($service_name);
    $sub_title = $this->func->escapeString($sub_title);
    $link = $this->func->escapeString($link);

    $query = "UPDATE quick_access SET title=$service_name, description=$sub_title, link=$link WHERE id=$service_id";
    
    $result = $this->func->executeQuery($query);

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update service']);
    }
}
    
public function updateReview()
{
    $review_id = ($_POST['review_id']);
    $user_id = ($_POST['user_id']);
    $reviewer_name = $this->func->escapeString($_POST['reviewer_name']);
    $reviewer_city = $this->func->escapeString($_POST['reviewer_city']);
    $review_comments = $this->func->escapeString($_POST['review_comments']);

    // Initialize image name
    $imageName = '';

    // Check if a new image file was uploaded
    if (isset($_FILES['reviewer_image']) && $_FILES['reviewer_image']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload
        $image = $_FILES['reviewer_image'];
        $imageName = basename($image['name']);
        $imageTmpName = $image['tmp_name'];
        $imagePath = __DIR__ . '/../../assets/images/user/' . $imageName; // Updated path to use __DIR__

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit;
        }
    }

    // Prepare the SQL query
    if ($imageName) {
        $updateQuery = "UPDATE reviews SET name=$reviewer_name, location=$reviewer_city, review_text=$review_comments, image_name=$imageName, user_id=$user_id WHERE id=$review_id";
    } else {
        $updateQuery = "UPDATE reviews SET name=$reviewer_name, location=$reviewer_city, review_text=$review_comments, user_id=$user_id WHERE id=$review_id";
    }

    // Execute the query
    $result = $this->func->executeQuery($updateQuery);

    // Check for query execution success
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Review updated successfully!']);
    } else {
  
        echo json_encode(['status' => 'error', 'message' => 'Failed to update review: ']);
    }
}
public function updateCouple()
{
    $couple_id = $_POST['couple_id'];
    $couples_name = $this->func->escapeString($_POST['couples_name']);
    $couples_city = $this->func->escapeString($_POST['couples_city']);
    $page_link = $this->func->escapeString($_POST['page_link']);

    // Initialize image name
    $imageName = '';

    // Check if a new image file was uploaded
    if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'][0] == UPLOAD_ERR_OK) {
        // Handle file upload
        $image = $_FILES['gallery_image'];
        $imageName = basename($image['name']);
        $imageTmpName = $image['tmp_name'];
        $imagePath = __DIR__ . '/../../assets/images/couples/' . $imageName; // Updated path to use __DIR__

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit;
        }
    }

    // Prepare the SQL query
    if ($imageName) {
        $updateQuery = "UPDATE couples SET name=$couples_name, loaction=$couples_city, link=$page_link, image=$imageName WHERE id=$couple_id";
    } else {
        $updateQuery = "UPDATE couples SET name=$couples_name, location=$couples_city, link=$page_link WHERE id=$couple_id";
    }

    // Execute the query
    $result = $this->func->executeQuery($updateQuery);

    // Check for query execution success
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Couple updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update couple: ']);
    }
}
public function updateGalleryPhoto()
{
    // Check if required fields are set
    if (!isset($_POST['photo_id']) || !isset($_POST['category']) || !isset($_POST['description'])) {
        echo json_encode(['status' => 'error', 'message' => 'Required form data is missing.']);
        exit;
    }

    // Retrieve form data
    $photo_id = ($_POST['photo_id']);
    $category = $this->func->escapeString($_POST['category']);
    $description = $this->func->escapeString($_POST['description']);

    // Initialize image name
    $imageName = '';

    // Check if a new image file was uploaded
    if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload
        $image = $_FILES['gallery_image'];
        $imageName = basename($image['name']);
        $imageTmpName = $image['tmp_name'];
        $imagePath = __DIR__ . '/../../assets/images/gallery/' . $imageName; // Updated path to use __DIR__

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit;
        }
    }

    // Update query with or without new image
    if ($imageName) {
        $updateQuery = "UPDATE gallery_images SET category=$category, description=$description, image_name=$imageName WHERE id=$photo_id";
    } else {
        $updateQuery = "UPDATE gallery_images SET category=$category, description=$description WHERE id=$photo_id";
    }

    // Execute the query
    $result = $this->func->executeQuery($updateQuery);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Gallery photo updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update gallery photo.']);
    }
}




}
$controller = admin::getInstance();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['action'])) {
        $data = $_GET;
        switch ($_GET['action']) {
            case 'fetch_all_profile':
                $controller->fetchAllProfile();
                break;
            case 'fetch_recent_profile':
                $controller->fetchRecentProfile();
                break;
                case 'fetch_services':
                    $controller->fetchServices();
                    break;
                    case 'fetch_review':
                        $controller->fetchReview();
                        break;
                        case 'fetch_recent_couples':
                            $controller->fetchRecentCouples();
                            break;
                            case 'fetch_photo_galary':
                                $controller->fetchPhotoGalary();
                                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action parameter is missing']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if action is set in JSON payload or form data
    $action = isset($data['action']) ? $data['action'] : (isset($_POST['action']) ? $_POST['action'] : null);

    if ($action) {
        switch ($action) {
            case 'login':
                $controller->login($data);
                break;
            case 'add_new_user':
                $controller->addNewUser($data);
                break;
                case 'delete_users':
                    $controller->deleteUsers($data);
                    break;
                    case 'delete_sevices':
                        $controller->deleteSevices($data);
                        break;
                        case 'delete_reviews':
                            $controller->deleteReviews($data);
                            break;
                            case 'delete_recent_couple':
                                $controller->deleteRecentCouple($data);
                                break;
                                case 'delete_gallery_photo':
                                    $controller->deleteGalleryPhoto($data);
                                    break;
                                    case 'add_review':
                                        $controller->addReview();
                                        break;
                                        case 'add_couple':
                                            $controller->addCouple();
                                            break;
                                            case 'add_gallery_photo':
                                                $controller->addGalleryPhoto();
                                                break;
                                                case 'update_service':
                                                    $controller->updateService();
                                                    break;
                                                    case 'update_review':
                                                        $controller->updateReview();
                                                        break;
                                                        case 'update_couple':
                                                            $controller->updateCouple();
                                                            break;
                                                            case 'update_gallery_photo':
                                                                $controller->updateGalleryPhoto();
                                                                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action parameter is missing']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
